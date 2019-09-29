@extends('layouts.app')
@section('title')
@lang('general.homeTitle')
@endsection
@section('content')
<div class=" profile-component container-fluid mb-3 mt-2">
    <profile-component></profile-component>
</div>
@endsection
@section('js-scripts')
<script src="{{ asset('js/profile.js') }}"></script>
@endsection
@section('head-content')
<style>
    .fa-h-fix
    {
        background-color: rgba(0,0,0,0);
    }
    .mh-50
    {
        min-height:50%!important;
    }
    .h-50px
    {
        height:50px;
    }
</style>
@endsection