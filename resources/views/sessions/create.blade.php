@extends('layouts.app')
@section('title')
@lang('general.createSessionTitle')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-6">
            <div class="card">
                <div class="card-header txt-theme">@lang('general.createSessionTitle')</div>
                <div class="card-body">
                <form method="POST" id="create_session" action="/sessions/store">
                        @csrf
                        <div class="form-group row txt-theme">
                            <div class="col-12">
                                <div class="row">
                                        <label for="name" class="col-2 col-form-label text-md-right"><i class="fa fa-book fa-2x"></i></label>
                                        <div class="col-6 offset-2">
                                            <input id="name" type="name" placeholder="@lang('labels.sessionName')" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-6 offset-4 text-right">
                                                <button type="submit" id="load_submit" class="btn bg-theme"><span style="display:none;" class="spinner-border spinner-border-sm"></span><span class="pl-2 pr-3">@lang('general.createSessionTitle')&nbsp;<i class="fa fa-scroll"></i></span></button>
                                            </div>
                                        </div>
                                </div>
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
    $(document).ready(function(ev)
    {
        $('#create_session').submit(function(e)
        {
            $('#load_submit').attr('style', 'display:block;');
            $('#create_session').attr('disabled', true);
        });
    });
    </script>
@endsection