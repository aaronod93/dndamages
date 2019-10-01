<template>
<datatables-component :config="sessionConfig"></datatables-component>
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
                    name: 'Sessions',
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
                    ]
                },
            };
        },
        components: {
            DatatablesComponent
        }
    }
</script>