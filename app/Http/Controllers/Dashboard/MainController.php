<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        return view('pages.index');
    }

    public function contactUs(Request $request)
    {
        if (!admin()) {
            abort(
                403,
                __("messages.you don't have permission to access this page")
            );
        }
        $models = \App\Models\ContactUs::where(function ($q) use ($request) {
            if ($request->status) {
                if ($request->status == "read") {
                    $q->where('status', 1);} elseif ($request->status == "unread") {
                    $q->where('status', 0);}
            }
        })->get();
        return view('pages.general.contact-us', compact('models'));
    }
    public function toggleReadContactUs($id)
    {
        $model = \App\Models\ContactUs::find($id);
        $model->status = !$model->status;
        $model->save();
        flash()->success(__("messages.switch success"));
        return redirect()->back();
    }

    public function toggleStatusUser($id)
    {
        $user = \App\Models\User::find($id);
        if ($user->status == 'active') {
            $user->status = 'inactive';
        } else {
            $user->status = 'active';
        }
        $user->save();
        flash()->success(trans('messages.update'));
        return redirect()->back();
    }
    public function users(Request $request)
    {
        if (!admin()) {
            abort(
                403,
                __("messages.you don't have permission to access this page")
            );
        }
        $models = \App\Models\User::where(function ($q) use ($request) {
            $q->where("type", "!=", 'admin');

        })->orderBy("updated_at", "DESC")->get();
        return view('pages.general.users', compact('models'));
    }

}
