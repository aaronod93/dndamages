<template>
<div class="container-fluid mainContent">
    <div class="row text-center h-100 justify-content-center">
        <div class="col-12 h-100">
            <div class="jumbotron card-jumbotron hoverable p-4">
                <h3 class="txt-theme pt-2">{{name}}s</h3>
                <div class="text-nowrap p-2">
                    <div @click="$emit('addClicked')" v-if="showAdd" style="position:absolute;right:0;border: 1px solid #ced4da;border-radius:5px;" class="mr-5 py-1 px-3 pointer"><i class="fa fa-plus mr-3" style="color:#212529"></i>
                    Add {{name}}</div>
                    <table :class="'table dtYour' + name">
                    <caption>List of {{name}}s</caption>
                        <thead>
                            <tr>
                            <th scope="col" :key="index" v-for="(col, index) in columns">
                            {{col.name}}
                            </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
    export default {
        name:'datatables-component',
        props: ['config'],
        data()
        {
            return {
                loading: false,
            };
        },
        mounted() {
            this.initialiseDT();
        },
        computed:
        {
            method: function()
            {
                return this.config ? this.config.method : "get";
            },
            url: function()
            {
                return this.config ? this.config.url : "";
            },
            name: function()
            {
                return this.config ? this.config.name : "";
            },
            parameters: function()
            {
                return this.config ? this.config.parameters : null;
            },
            columns: function()
            {
                return this.config ? this.config.columns : null;
            },
            showAdd: function()
            {
                return !this.config || this.config.show_add == null ? true : this.config.show_add; 
            }
        },
        methods:{
            initialiseDT: function()
            {
                var vm = this;
                $(document).ready(function () {
                    $('input[type=search]').addClass('form-control');
                    $('.dtYour' + vm.name).DataTable({
                        processing: true,
                        serverSide: true,
                        searchDelay: 1000,
                        dom: 'Bflrtip',
                        autoWidth: false,
                        responsive:true,
                        ajax: {
                            url: vm.url,
                            method: vm.method, 
                            data: vm.parameters
                        },
                        oLanguage: {sProcessing: '<div class="preloader dtLoader"><div style="width:50px;height:50px;" class="loader"></div></div>'},
                        columns: vm.columns.map(function(itm)
                        {
                            return {
                                data: itm.prop
                            };
                        }),
                    });
                });
            }
        }
    }
</script>
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