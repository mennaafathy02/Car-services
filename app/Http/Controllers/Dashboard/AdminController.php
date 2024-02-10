<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(private User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $models = $this->model->orderBy("updated_at", "DESC")->get();
        return view('pages.admins.index', compact("models"));
    }

    public function create()
    {
        $admin = $this->model->all();
        return view('pages.admins.create');
    }

    public function store(AdminRequest $request)
    {
        $model = $this->model->create($request->all());
        $model->syncRoles($request->role);

        flash()->success(trans('messages.success'));

        return redirect()->route('admins.index');
    }

    public function show(User $model)
    {
        return view('pages.admins.show', compact('model'));
    }

    public function edit($id)
    {
        $model = $this->model->find($id);

        return view('pages.admins.edit', compact('model'));
    }

    public function update(AdminRequest $request, $id)
    {
        $model = $this->model->find($id);
        $model->update($request->all());
        $model->syncRoles($request->role);

        flash()->success(trans('messages.update'));
        return redirect()->route('admins.index');
    }

    public function getProfile()
    {
        $model = $this->model->find(auth()->user()->id);
        return view('pages.admins.edit-profile', compact('model'));
    }

    public function postProfile(UpdateProfileRequest $request)
    {

        $model = $this->model->find(auth()->user()->id);
        $model->update($request->all());
        flash()->success(trans('messages.update'));
        return redirect()->route('get.profile');

    }

    public function destroy(Request $request, User $model)
    {
        $model = $this->model->find($request->id);
        if ($model->subscribes()->count() > 0) {
            flash()->error(trans('messages.admin has subscribe can not delete it'));
            return redirect()->route('admins.index');
        }
        $model->delete();

        flash()->error(trans('messages.delete'));
        return redirect()->route('admins.index');
    }

    public function booking(Request $request)
    {
        $models = \App\Models\Service::where(function ($q) use ($request) {
            $q->whereHas("bookings", function ($q) use ($request) {
                if ($request->user_id) {
                    $q->where("user_id", $request->user_id);
                }
                if (!admin()) {
                    $q->where('user_id', auth()->id());
                }
            });
        })->get();
        return view('pages.general.bookings', compact('models'));
    }
}
