@extends('layouts.app')
@section('title')
@lang('general.homeTitle')
@endsection
@section('content')
<style>
.dataTables_filter
{
    text-align:left;
}
input[type=search]
{
    -webkit-appearance: searchfield!important;
    margin-left:5px;
}
.dtLoader
{
    position:absolute!important;
    height:calc(100% - 60px)!important;
    width:calc(100% - 30px)!important;
    top:80px;
}
#DataTables_Table_0_filter
{
    left:0;
}
.dataTables_length, .dataTables_paginate, .dataTables_info
{
    display:none;
}
</style>
<div class="container-fluid p-5 mainContent">
<div class="row text-center h-100 justify-content-center">
    <div class="col-12 h-100">
        <div class="jumbotron card-jumbotron hoverable">
            <h3 class="txt-theme pt-5">Your Characters</h3>
            <div class="text-nowrap p-5">
                <table class="table dtYourCharacters">
                <caption>List of your Characters</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Level</th>
                            <th scope="col">Class(es)</th>
                            <th scope="col">Race</th>
                            <!-- <th scope="col">Theme Color</th> -->
                            <th scope="col">Max HP</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js-scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('input[type=search]').addClass('form-control');
        $('.dtYourCharacters').DataTable({
            order: [[ 2, "desc" ]],
            processing: true,
            serverSide: true,
            searchDelay: 1000,
            dom: 'Bflrtip',
            autoWidth: false,
            responsive:true,
            ajax: {
                url: '/characters/datatable',
                method: 'POST', 
				headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            oLanguage: {sProcessing: '<div class="preloader dtLoader"><div style="width:50px;height:50px;" class="loader"></div></div>'},
            columns: [
                {
                    data: 'id',
                },
                {
                    data: 'name'
                },
                {
                    data: 'level'
                },
                {
                    data: 'classes'
                },
                {
                    data: 'race',
                },
                // {
                //     data: 'theme_color',
                // },
                {
                    data: 'maximum_hp',
                },
               // { data: 'actions' },
            ],
        });
    });
</script>
@endsection