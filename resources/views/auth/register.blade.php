@extends('layouts.auth')
@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h1>{{ __('Sign up') }}</h1>
            <p class="text-muted">{{__('Create your account')}}</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class=" mb-3">
                    <input id="name" type="text" placeholder="{{__('Name')}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                           required
                           autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class=" mb-3">
                    <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required
                           autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class=" mb-3">
                    <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                           required
                           autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class=" mb-4">
                    <input id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" class="form-control" name="password_confirmation" required
                           autocomplete="new-password">
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-5 col-7 d-flex justify-content-end">
                        <button type="submit" class="btn btn-block btn-success">
                            {{ __('Sign up') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="text-center">
                {{__('Have already an account?')}}
                <a class="btn btn-link px-0" href="{{route('login')}}" type="button">{{ __('Sign in') }}</a>
            </div>
        </div>
    </div>
@endsection
