<template>
<div class="row text-center h-100">
        <div class="col-12 col-md-4 col-lg-3 h-100">
            <div class="d-flex flex-column h-100">
                <div class="row text-center justify-content-center flex-grow-1 h-100">
                   <user-card-component></user-card-component>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9 col-md-8 h-100 mb-3 top-jumbo">
            <div class="d-flex flex-column h-100">
                <div class="row text-center h-100">
                    <div class="col-12">
                        <div class="d-flex align-items-start flex-column h-100 w-100">
                            <div class="d-inline-flex w-100 text-center px-5">
                                <div class="row w-100 px-0">
                                    <datatables-component :config="sessionConfig"></datatables-component>
                                </div>
                            </div>
                            <div class="d-inline-flex w-100 text-center px-5">
                                <div class="row w-100 px-0">
                                    <datatables-component :config="characterConfig"></datatables-component>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--
'method', 'url', 'name', 'getParameters', 'columns'

        -->
    </div>
</template>
<script>
import UserCardComponent from "./UserCardComponent";
import DatatablesComponent from "../utilities/DatatablesComponent";
    export default {
        mounted() {
            
        },
        data()
        {
            return {
                sessionConfig: {
                    name: 'Sessions',
                    method: 'get',
                    url: '/sessions/datatable',
                    parameters: null,
                    columns: [
                        {
                            name: 'Name',
                            prop: 'name'
                        },
                        {
                            name: 'Round Number',
                            prop: 'round_number'
                        },
                    ],

                },
                characterConfig: 
                {
                    name: 'Characters',
                    method: 'get',
                    url: '/characters/datatable',
                    parameters: null,
                    columns: [
                        {
                            name: 'Name',
                            prop: 'name'
                        },
                        {
                            name: 'Level',
                            prop: 'level'
                        },
                        {
                            name: 'Race',
                            prop: 'race'
                        },
                        {
                            name: 'Classes',
                            prop: 'classes'
                        },
                        {
                            name: 'Maximum HP',
                            prop: 'maximum_hp'
                        }
                    ]
                }
            };
        },
        methods: 
        {
            getData: function()
            {

            }
        },
        components: {
            UserCardComponent,
            DatatablesComponent
        }
    }
</script>