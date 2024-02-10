@extends('layouts.app')

@section('content')
<div class="login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1 text-primary"><b>{{ env("APP_NAME")  }}</b></a>
            </div>
            <div class="card-body">
                {{-- <p class="login-box-msg">Sign in to start your session</p> --}}

                @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __("words.email") }}" style="border: 1px solid #eee;height: 45px;box-shadow: rgb(0 0 0 / 10%) 0px 0px 2px;">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group mb-3">

                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __("words.password") }}" style="border: 1px solid #eee;height: 45px;box-shadow: rgb(0 0 0 / 10%) 0px 0px 2px;">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="row d-flex flex-column">
                        <div class="d-flex justify-content-around mt-2 mb-2">
                            <!-- Forget -->
                            {{-- <p class="mb-1">
                                <a href="{{ route('forget-password.index') }}">{{ __("words.i forgot my password") }}</a>
                            </p> --}}
                            <!-- Remember -->
                            {{-- <div class="">
                                <div class="icheck-primary">
                                    <label for="remember" style="font-weight: 500;">
                                        {{ __("words.remeber me") }}
                            </label>
                            <input type="checkbox" id="remember">
                        </div>
                    </div> --}}
            </div>
            <!-- /.col -->
            <div class="col-5 m-auto">
                <button type="submit" class="btn btn-primary btn-block">{{ __("words.sign in") }} </button>
            </div>
            <!-- /.col -->
        </div>
        </form>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.login-box -->
</div>
@endsection
