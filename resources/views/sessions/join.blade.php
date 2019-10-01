@extends('layouts.app')
@section('title')
@lang('general.createSessionTitle')
@endsection
@section('content')
<div class="container-fluid">
    <div class="jumbotron hoverable">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-8 offset-2 mb-2">
                        <h2>Recent Sessions</h2>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
@section('js-scripts')
<script src="{{ asset('js/character-table.js') }}"></script>
@endsection