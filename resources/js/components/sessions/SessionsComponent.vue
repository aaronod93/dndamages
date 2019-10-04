<template>
<datatables-component @addClicked="handleAddClicked" :config="sessionConfig"></datatables-component>
</template>
<script>
import DatatablesComponent from "../utilities/DatatablesComponent";
    export default {
        mounted() {
            
        },
        data()
        {
            return {
                sessionConfig: {
                    name: 'Session',
                    request_type: 'get',
                    url: '/sessions/datatable',
                    parameters: null,
                    columns: [
                        {
                            name: 'Name',
                            prop: 'name'
                        },
                        {
                            name: 'Created Date',
                            prop: 'created_at',
                        }
                    ],
                    show_add: true
                },
            };
        },
        methods: {
            handleAddClicked: function()
            {
                
            }
        },
        components: {
            DatatablesComponent
        }
    }
</script>