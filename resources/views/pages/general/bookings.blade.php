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

                                </tr>

                                @endforeach
                            </tbody>
                        </table>

































                    </div>
                </div>
            </div>

        </div>
        @endsection
