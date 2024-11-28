@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8 .bg-dark.bg-gradient">
            <div class="card text-white bg-dark bg-gradient bg-opacity-10 border-0">
                <i class="fa fa-solid fa-key fa-8x ty justify-content-center text-center" ></i>
                <br>
                <br>
                <h2 class="tw justify-content-center text-center">Login:</h2>

                <div class="card-body ">
                    <form class="tw" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end fs-5">{{ __('Email Address: ') }}</label>

                            <div class="col-md-6 ">
                                <input id="email" type="email" class="form-control inputBox tw  @error('email') is-invalid @enderror" name="email" placeholder="Email"value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end fs-5" >{{ __('Password: ') }}</label>

                            <div class="col-md-6">
                                <input id="password" placeholder="Password" type="password" class="form-control inputBox tw @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn b1">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn  my-git" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
