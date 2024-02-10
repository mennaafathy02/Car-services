@extends('layouts.master')
@section('titlePage')
<a href="{{ route('services.index') }}">{{ __("words.services") }}</a>
/ {{ __('words.add') }}
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card">
            <div class="card-body">

                <div class="card card-primary">

                    <div class="card-body">
                        {!! Form::open(["route" => "services.store" , 'method' => "post", "enctype"=>"multipart/form-data"]) !!}
                        @include('pages.services.form')
                        {!! Form::submit(__("words.add"),["class" => "btn btn-success btn-md"]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
        @endsection
