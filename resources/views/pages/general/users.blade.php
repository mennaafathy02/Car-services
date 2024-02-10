@extends('layouts.master')

@section('titlePage')
{{ trans('words.contact us')  }}
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card">
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-body">
                        <table id="gradeTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('words.name') }}</th>
                                    <th>{{ trans("words.phone") }}</th>
                                    <th>{{ trans("words.email") }}</th>
                                    <th>{{ trans("words.skills") }}</th>

                                    <th>{{ trans("words.his booking") }}</th>
                                    <th>{{ trans("words.type") }}</th>
                                    <th>{{ trans("words.status") }}</th>

                                    <th>{{ trans("words.processes") }}</th>




                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $model->name }} </td>
                                    <td>{{ $model->phone }}</td>
                                    <td>{{ $model->email }}</td>
                                    <td>{{ $model->skills }}</td>
                                    <td><a href="{{ route('bookings.index') }}?user_id={{ $model->id }}">{{ trans("words.click") }}</a></td>
                                    <td>{{ $model->type }}</td>
                                    <td>{{ trans("words.$model->status") }}</td>

                                    <td>
                                        <a class="btn btn-sm btn-secondary" href="{{ route("users.toggle-status",$model->id) }}">{{ __("words.switch") }}</a>
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
