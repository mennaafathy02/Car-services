@extends('layouts.master')

@section('head_scripts')


@endsection
@section('titlePage')

{{ __('words.profile') }}
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card">
            <div class="card-body">

                <div class="card card-primary">
                    <div class="card-body">
                        {!! Form::model(auth()->user(),["route" => ["post.profile"] , "method" => "post"]) !!}
                        <div class="form-group">
                            {!! Form::label('name', __("words.name"), ['class' => 'awesome']) !!}
                            {{ Form::text('name', null, ['class' => 'form-control '.($errors->has('name') ? 'is-invalid':'is-valid')]) }}
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>




                        <div class="form-group">
                            {!! Form::label('email', __("words.email"), ['class' => 'awesome']) !!}
                            {{ Form::text('email', null, ['class' => 'form-control '.($errors->has('email') ? 'is-invalid':'is-valid')]) }}
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group">
                            {!! Form::label('phone', __("words.phone"), ['class' => 'awesome']) !!}
                            {{ Form::text('phone', null, ['class' => 'form-control '.($errors->has('phone') ? 'is-invalid':'is-valid')]) }}
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            {!! Form::label('password', __("words.password"), ['class' => 'awesome']) !!}
                            {{ Form::password('password', ['class' => 'form-control '.($errors->has('password') ? 'is-invalid':'is-valid')]) }}
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', __("words.password confirmation"), ['class' => 'awesome']) !!}
                            {{ Form::password('password_confirmation', ['class' => 'form-control '.($errors->has('password_confirmation') ? 'is-invalid':'is-valid')]) }}
                            @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {!! Form::submit(__("words.save"),["class" => "btn btn-success btn-md"]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
        @endsection
