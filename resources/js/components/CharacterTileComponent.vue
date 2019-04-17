<template>
    <div class="row justify-content-center">
        This is some content that will be displayed for user id: {{this.userid}}
    </div>
</template>

<script>
    export default {
        name:'character-tile-component',
        props: ['userid'],
        created()
        {

        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            initialiseCharacters: function()
            {

            }
        },
        data(){
            return {
               characters: null
            };
        }
    }
</script>
