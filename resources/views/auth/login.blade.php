@extends('layouts.auth')
@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h1>{{__('Sign in')}}</h1>
            <p class="text-muted">{{__('Sign In to your account')}}</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <input id="email" placeholder="{{ __('E-Mail Address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" autocomplete="current-password">
                    @error('password')&acute;
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row justify-content-md-between">
                    <div class="col-md-5 col-6">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>
                    <div class="col-md-5 col-6 d-flex justify-content-end">
                        <button class="btn btn-primary px-4" type="submit">{{ __('Sign in') }}</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="text-center">
                {{__("Don't have an account?")}}
                <a class="btn btn-link px-0" href="{{route('register')}}" type="button">{{ __('Sign up here') }}</a>
            </div>
        </div>
    </div>
@endsection
