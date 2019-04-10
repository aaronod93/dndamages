@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header txt-theme">@lang('general.signin')</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row txt-theme">
                            <label for="email" class="col-2 col-form-label text-md-right"><i class="fa fa-envelope fa-2x"></i></label>
                            <div class="col-md-8">
                                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row txt-theme">
                            <label for="password" class="col-2 col-form-label text-md-right"><i class="fa fa-key fa-2x"></i></label>
                            <div class="col-8">
                                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row txt-theme">
                            <div class="col-10 offset-2">
                            <label>
                                <input type="checkbox" title="Is actually remember me!" name="remember" value="remember" />
                                <span>{{ __('Keen Mind (Remember Me)') }}</span>
                            </label>
                            </div>
                            <div class="col-8 offset-2">
                                <button type="submit" class="btn txt-theme w-100">
                                @lang('general.signin')
                                </button>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-6">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-sm btn-link txt-theme" href="{{ route('password.request') }}">
                                    @lang('general.forgotPassword')
                                    </a>
                                @endif
                            </div>
                            <div class="col-6">
                                <a href="/register" class="btn btn-sm btn-link txt-theme">@lang('general.register')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
