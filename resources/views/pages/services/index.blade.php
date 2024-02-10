@extends('layouts.master')

@section('titlePage')
{{ trans('words.services')  }}
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route("services.create") }}" class="btn btn-info btn-md mb-2"><i class="fas fa-plus"></i>
                        {{ trans('words.add') }}
                    </a>
                </div>
                <div class="card card-primary">

                    <div class="card-body">

                        <table id="gradeTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('words.title') }}</th>
                                    <th>{{ trans('words.description') }}</th>
                                    <th>{{ trans('words.user') }}</th>
                                    <th>{{ trans('words.image') }}</th>

                                    <th>{{ trans('words.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $model->title }}</td>
                                    {{-- limit descripiton --}}
                                    <td>{{ Str::limit($model->description, 50) }}</td>
                                    <td>{{ $model->user->name }}</td>
                                    <td style="width:100px; height:100px;text-align:center; vertical-align:middle">
                                        <img src="{{ $model->file_url }}" style="width:100px; height:100;" />
                                    </td>

                                    <td>
                                        <a href=" {{ route("services.edit",$model->id) }}" class="btn btn-outline-info btn-sm">{{ trans('words.edit') }}</a>
                                        <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $model->id }}">{{ trans('words.delete') }}</a>
                                    </td>
                                </tr>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $model->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    {{ trans('words.deleteSection') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('services.destroy', $model->id) }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('words.are your sure you want to delete this item') }}
                                                    <input id="id" type="hidden" name="id" class="form-control" value="{{ $model->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("words.close")}}</button>
                                                        <button type="submit" class="btn btn-danger">{{ trans('words.submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>

































                    </div>
                </div>
            </div>

        </div>
        @endsection
