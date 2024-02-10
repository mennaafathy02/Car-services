<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{

    public function __construct(private Service $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $models = $this->model->where(function ($q) {
            if (!admin()) {
                $q->where('user_id', auth()->id());
            }

        })->with('media')->orderBy("updated_at", "DESC")->get();
        return view('pages.services.index', compact('models'));
    }

    public function create()
    {
        $services = $this->model->pluck('name', 'id')->toArray();
        return view('pages.services.create', compact('services'));
    }

    public function store(StoreServiceRequest $request)
    {
        DB::transaction(function () use ($request) {
            $model = $this->model->create([
                'title' => ['ar' => $request->title_ar, 'en' => $request->title_en],
                'description' => ['ar' => $request->description_ar, 'en' => $request->description_en],

            ]);
            uploadImage($model, $request->media);
        });
        flash()->success(trans('messages.success'));

        return redirect()->route('services.index');
    }

    public function show(Service $model)
    {

        return view('pages.services.show', compact('model'));
    }

    public function edit($id)
    {
        $model = $this->model->find($id);

        return view('pages.services.edit', compact('model'));
    }

    public function update(UpdateServiceRequest $request, $id)
    {

        DB::transaction(function () use ($request, $id) {
            $model = $this->model->find($id);
            $model->update([
                'title' => ['ar' => $request->title_ar, 'en' => $request->title_en],
                'description' => ['ar' => $request->description_ar, 'en' => $request->description_en],
            ]);
            if ($request->media) {
                $model->clearMediaCollection('media');

                uploadImage($model, $request->media);
            }
        });
        flash()->success(trans('messages.update'));

        return redirect()->route('services.index');
    }

    public function destroy(Request $request, Service $model)
    {
        $model = $this->model->find($request->id);
        $model->delete();
        flash()->success(trans('messages.delete'));
        return redirect()->route('services.index');
    }
}
