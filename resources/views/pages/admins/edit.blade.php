@extends('layouts.master')

@section('head_scripts')


@endsection
@section('titlePage')
<a href="{{ route('admins.index') }}">{{ __("words.admins") }}</a>
/ {{ __('words.edit') }}
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card">
            <div class="card-body">

                <div class="card card-primary">
                    <div class="card-body">
                        {!! Form::model($model,["route" => ["admins.update",$model->id] , 'method' => "put", "enctype"=>"multipart/form-data"]) !!}
                        @include('pages.admins.form')
                        {!! Form::submit(__("words.save"),["class" => "btn btn-success btn-md"]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
        @endsection
