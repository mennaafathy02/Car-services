<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreContactUsRequest;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;

class MainController extends \Illuminate\Routing\Controller

{

    public function media(\App\Http\Requests\UploadMediaRequest$request)
    {

        if (is_array($request->media)) {
            $media = File::create();
            foreach ($request->media as $file) {
                $ext = $file->getClientOriginalExtension();
                $media->addMedia($file)->usingFileName(md5(uniqid()) . ".$ext")->toMediaCollection('media');
            }

            return responseJson(200, 'success', FileResource::collection($media->files));
        } else {
            if ($request->media) {
                $media = File::create();
                $file = $request->media;
                $ext = $file->getClientOriginalExtension();
                $media->addMedia($file)->usingFileName(md5(uniqid()) . ".$ext")->toMediaCollection('media');
                return responseJson(200, 'success', new FileResource($media->files[0]));
            }
        }

        if ($request->link && !$request->media) {
            $media = File::create();
            $media->addMediaFromUrl($request->link)->toMediaCollection('media');
            return responseJson(200, 'success', new FileResource($media->files[0]));
        }
        return responseJson(400, 'unsuccessful');
    }

    public function contactUs(StoreContactUsRequest $request)
    {
        $contact = \App\Models\ContactUs::create($request->validated());
        return responseJson(200, 'success');
    }

    public function testimonials(Request $request)
    {
        $testimonials = \App\Models\Testimonial::paginate($request->per_page);
        return responseJson(200, 'success', \App\Http\Resources\TestimonialResource::collection($testimonials), getPaginates($testimonials));
    }

    public function services()
    {
        $services = \App\Models\Service::inRandomOrder()->limit(10)->get();
        return responseJson(200, 'success', \App\Http\Resources\ServiceResource::collection($services));
    }
}
