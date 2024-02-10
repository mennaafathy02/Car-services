@extends('layouts.master')

@section('titlePage')
{{ trans('words.contact us')  }}
@endsection

@section("filter")
<div class="dropdown">
    <button id="my-dropdown" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __("words.status filter") }}</button>
    <div class="dropdown-menu" aria-labelledby="my-dropdown">
        <a href="{{  route("contact-us.index") }}" class="p-2"> {{ __("words.all") }}</a>
        <a href="{{  route("contact-us.index") }}?status=read" class="p-2"> {{ __("words.readed") }}</a>
        <a href="{{  route("contact-us.index") }}?status=unread" class="p-2"> {{ __("words.unreaded") }}</a>

    </div>
</div>
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
                                    <th>{{ trans("words.email") }}</th>
                                    <th>{{ trans("words.message") }}</th>
                                    <th>{{ trans('words.status') }}</th>
                                    <th>{{ trans('words.processes') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $model->name }}</td>
                                    <td>{{ $model->email }}</td>
                                    <td>{{ $model->subject }}</td>
                                    {{-- read or not read and swtich bewteen them --}}


                                    <td>
                                        @if ($model->status == 0)
                                        <span class="badge  badge-success">{{ __("words.unread") }}</span>
                                        @else
                                        <span class="badge  badge-info">{{ __("words.read") }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-sm btn-secondary" href="{{ route("contact-us.toggle-read",$model->id) }}">{{ __("words.switch") }}</a>
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
