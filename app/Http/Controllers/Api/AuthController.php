<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Resources\UserResource;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AuthController extends Controller
{

    public function __construct(private User $model, private Media $media)
    {
        $this->model = $model;
        $this->media = $media;
    }

    public function login(LoginUserRequest $request)
    {
        // login with phone and password
        $model = $this->model->where('phone', $request->phone)->first();
        if (!$model || !\Illuminate\Support\Facades\Hash::check($request->password, $model->password)) {
            return responseJson(401, __("auth.failed"));
        }
        if ($model->status == "inactive") {
            return responseJson(401, __("words.wattling for approved"));
        }
        $token = $model->createToken("user")->accessToken;
        \Illuminate\Support\Facades\Auth::loginUsingId($model->id);
        return responseJson(200, 'success', [
            'token' => $token,
            'user' => $model,
        ]);

    }

    public function register(RegisterUserRequest $request)
    {
        $status = 'active';
        if ($request->type == "machine") {
            $status = 'inactive';
        }
        $model = $this->model->create($request->validated() + ['status' => $status]);
        $token = $model->createToken("user")->accessToken;
        return responseJson(200, 'success', [
            'token' => $token,
            'user' => $model,
        ]);
    }

    public function sendEmailPassword($email)
    {
        $model = $this->model->where('email', $email)->first();
        if (!$model) {
            return responseJson(404, 'not found user');
        }
        $pin_code = rand(1111, 9999);
        $model->update(['pin_code' => $pin_code]);

        \Illuminate\Support\Facades\Mail::to($email)
            ->send(new ResetPassword($model));
        return responseJson(200, 'success');

    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $model = $this->model->where('pin_code', $request->pin_code)->first();
        $model->update([
            'password' => $request->password,
            'pin_code' => null,
        ]);

        return responseJson(200, 'success');

    }

    public function profile()
    {
        $model = auth()->user();
        return responseJson(200, 'success', new UserResource($model));
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return responseJson(200, 'success');
    }

    public function services(Request $request)
    {
        $models = auth()->user()->services()->paginate($request->per_page);
        return responseJson(200, 'success', \App\Http\Resources\ServiceResource::collection($models));
    }

    public function bookService($id)
    {
        $model = \App\Models\Service::find($id);
        if (!$model) {
            return responseJson(404, 'not found service');
        }
        \App\Models\Booking::where('user_id', auth()->user()->id)->where('service_id', $id)->delete();
        \App\Models\Booking::create([
            'user_id' => auth()->user()->id,
            'service_id' => $id,
        ]);
        return responseJson(200, 'success');
    }

    public function bookings(Request $request)
    {
        $models = \App\Models\Service::where("user_id", auth()->id())->paginate($request->per_page);
        return responseJson(200, 'success', \App\Http\Resources\ServiceResource::collection($models));
    }

}
