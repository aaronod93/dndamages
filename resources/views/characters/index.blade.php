@extends('layouts.app')
@section('title')
@lang('general.homeTitle')
@endsection
@section('content')
<div class="characters-component container-fluid p-5 mainContent">
        @if (\Session::has('success'))
        <div class="alert alert-success my-4 pb-0 text-center">
            <ul class="no-dec">
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
    <characters-component></characters-component>
</div>
@endsection
@section('js-scripts')
<script src="{{asset('js/character-table.js')}}"></script>
@endsection