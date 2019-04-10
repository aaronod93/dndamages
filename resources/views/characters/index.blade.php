@extends('layouts.app')
@section('title')
@lang('general.homeTitle')
@endsection
@section('content')
<div class="container-fluid mainContent">
<div class="row text-center h-100 justify-content-center">
    <div class="col-12 h-100">
        <div class="jumbotron card-jumbotron hoverable split-jumbotron">
            <h5 class="txt-theme">Your Characters</h5>
            <div class="table-responsive text-nowrap p-1">
                <table class="table dtYourCharacters">
                <caption>List of your Characters</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Level</th>
                            <th scope="col">Classes</th>
                            <th scope="col">Race</th>
                            <th scope="col">Theme Color</th>
                            <th scope="col">Max HP</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    $('#dtYourCharacters').DataTable();
    $('.dataTables_length').addClass('bs-select');
});
</script>
@endsection