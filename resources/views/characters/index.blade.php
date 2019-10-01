@extends('layouts.app')
@section('title')
@lang('general.homeTitle')
@endsection
@section('content')
<div class="characters-component container-fluid p-5 mainContent">
    <characters-component></characters-component>
</div>
@endsection
@section('js-scripts')
<script src="{{asset('js/character-table.js')}}"></script>
@endsection