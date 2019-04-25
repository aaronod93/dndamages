<template>
    <div class="row justify-content-center h-100">
        <span v-if="sessions.length == 0">No sessions found.</span>
        <div v-else class="d-flex col-12 px-4">
            <div class="session-tile" :key="session.id" v-for="session in sessions">
                <img src="/icons/system/bookmarklet.svg" class="session-img bg-theme" />
                <div class="session-label d-inline-flex flex-col align-items-end text-center">
                    <span class="session-name font-italic text-truncate w-100">{{session.name}}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const axios = require('axios');
    export default {
        name:'session-tile-component',
        props: ['userid', 'url'],
        created()
        {
            this.initialiseSessions();
        },
        data()
        {
            return {
                sessions: []
            };
        },
        mounted() {
            
        },
        methods:{
            initialiseSessions: function()
            {
                var vm = this;
                axios.post(vm.url, {
                user_id: vm.userid
                }).then(function (response) {
                    console.log(response.data);
                    vm.sessions = response.data;
                }).catch(function (error) {
                    console.log('Error - could not retrieve sessions for user')
                });
            }
        },
        data(){
            return {
               sessions: []
            };
        }
    }
</script>
<style scoped>
.session-tile
{
    height:100%;
    width:20%;
    padding:5px;
    border: 1px solid lightgrey;
}
.session-img
{
    height:70%;
    width:100%;
    background-color:lightgrey;
}
.session-label
{
    height:30%;
    width:100%;
}
.session-name
{
    font-style: italics;
}
</style>
