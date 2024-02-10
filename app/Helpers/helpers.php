<?php

function uploadImage($model, $file)
{
    $ext = $file->getClientOriginalExtension();
    $model->addMedia($file)->usingFileName(md5(uniqid()) . ".$ext")->toMediaCollection('media');
}

/**
 * @param message which return with of response json
 * @param  data  $object
 * @param response_status like 200,500,400
 * @param  pagination  $pagination have default value null
 * @return response json
 */
function responseJson($response_status, $massage, $object = null, $pagination = null)
{
    return response()->json([
        'message' => $massage,
        'data' => $object,
        'pagination' => $pagination,
    ], $response_status);
}

/**
 * @param collection of data resource
 * @return array of properties for pagination
 */
function getPaginates($collection)
{
    return [
        'per_page' => $collection->perPage(),
        'path' => $collection->path(),
        'total' => $collection->total(),
        'current_page' => $collection->currentPage(),
        'next_page_url' => $collection->nextPageUrl(),
        'previous_page_url' => $collection->previousPageUrl(),
        'last_page' => $collection->lastPage(),
        'has_more_pages' => $collection->hasMorePages(),
        'from' => $collection->firstItem(),
        'to' => $collection->lastItem(),
    ];
}

function uploadApiImage($id, array $value)
{
    \Spatie\MediaLibrary\MediaCollections\Models\Media::where('id', $id)->update($value);
}

function admin()
{
    return auth()->user()->type->value == 'admin';
}
