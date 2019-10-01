@extends('layouts.app')
@section('title')
@lang('general.homeTitle')
@endsection
@section('content')
<div class="sessions-component container-fluid p-5 mainContent">
    <sessions-component></sessions-component>
</div>
@endsection
@section('js-scripts')
<script src="{{asset('js/session-table.js')}}"></script>
@endsection