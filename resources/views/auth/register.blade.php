@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body txt-theme">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-2 col-form-label text-md-right"><i class="fa fa-user fa-2x"></i></label>

                            <div class="col-8">
                                <input id="name" placeholder="Name" data-toggle="tooltip" title="Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-2 col-form-label text-md-right"><i class="fa fa-envelope fa-2x"></i></label>
                            <div class="col-8">
                                <input id="email" placeholder="{{ __('Email Address') }}" data-toggle="tooltip" title="Email Address" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-2 col-form-label text-md-right"><i class="fa fa-user-secret fa-2x"></i></label>
                            <div class="col-8">
                                <input id="username" placeholder="{{ __('Username') }}" data-toggle="tooltip" title="Username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-2 col-form-label text-md-right"><i class="fa fa-key fa-2x"></i></label>

                            <div class="col-8">
                                <input oninput="onPasswordInput()" id="password" placeholder="{{ __('Password') }}" data-toggle="tooltip" title="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-2 col-form-label text-md-right confirm-field"><i class="fa fa-key fa-2x"></i></label>

                            <div class="col-8">
                                <input oninput="onPasswordInput()" placeholder="{{ __('Confirm Password') }}" data-toggle="tooltip" title="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn bg-theme">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-scripts')
<script>
    function onPasswordInput()
    {
        var $passwordField = $('#password');
        var $passwordConfirmField = $('#password-confirm');
        var $confirmFieldLbl = $('.confirm-field');
        $confirmFieldLbl.attr('style', 'color:' + ($passwordField.val() != $passwordConfirmField.val() ? 'red' : 'green') + ';!important;');
    }
    $(document).ready(function()
    {
        $(':text[title]').tooltip({
            placement: "right",
            trigger: "focus"
        });
    });
</script>
@endsection
