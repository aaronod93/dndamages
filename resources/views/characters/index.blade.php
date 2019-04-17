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
    height:calc(100% - 90px)!important;
    width:calc(100% - 30px)!important;
    top:90px!important;
    display:inline!important;
}
.dataTables_length, .dataTables_paginate, .dataTables_info
{
    display:none;
}
</style>
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
            order: [[ 4, "desc" ]],
            processing: true,
            serverSide: true,
            searchDelay: 1000,
            responsive:true,
            ajax: {
                url: '/characters/datatable/user',
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
                /*{   
                    data: 'report_status',
                    name: 'vtwo.name',
                    render: function(data, type, row) {
                        if (type === "sort" || type === "type")
                            return data;
                        if (row.report_status_slug == "pending")
                            return "<span class='label label-warning'>"+row.report_status+"</span>";
                        if (row.report_status_slug == "open")
                            return "<span class='label label-danger'>"+row.report_status+"</span>";
                        if (row.report_status_slug == "closed")
                            return "<span class='label label-primary'>"+row.report_status+"</span>";
                    }
                },*/
               // { data: 'actions' },
            ],
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>
@endsection