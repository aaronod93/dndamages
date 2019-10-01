<template>
<datatables-component :config="characterConfig"></datatables-component>
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
                    name: 'Characters',
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
                            prop: 'AC'
                        },
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
        }
    }
</script>