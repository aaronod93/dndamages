<template>
<datatables-component @addClicked="handleAddClicked" :config="characterConfig"></datatables-component>
</template>
<script>
import DatatablesComponent from "../utilities/DatatablesComponent";
    export default {
        mounted() {
            
        },
        data()
        {
            return {
                characterConfig: {
                    name: 'Character',
                    request_type: 'get',
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
                            name: 'Classes',
                            prop: 'classes'
                        },
                        {
                            name: 'Race',
                            prop: 'race'
                        },
                        {
                            name: 'Armour Class',
                            prop: 'ac'
                        },
                        {
                            name: 'Actions',
                            prop: 'actions',
                            render: function(data, type, row, meta)
                            {
                                return "<a href='/characters/" + row.id + "/edit' class='btn btn-sm txt-theme'>Edit<i class='fa fa-pencil-alt ml-2'></i></a>";
                            }
                        }
                        /*{
                            name: 'Theme Color',
                            prop: 'theme_color'
                        }*/
                    ]

                },
            };
        },
        components: {
            DatatablesComponent
        },
        methods: {
            handleAddClicked()
            {
                window.location.href='/characters/create';
            }
        }
    }
</script>