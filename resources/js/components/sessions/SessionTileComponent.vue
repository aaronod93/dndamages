<template>
    <div class="row justify-content-center px-0">
        <span v-if="loading" class="spinner-border txt-theme"></span>
        <span v-else-if="sessions.length == 0">No sessions found.</span>
        <div v-else class="col-12">
            <div class="row px-0">
                <div class="session-tile col-lg-2 col-md-3 col-sm-4" :key="session.id" v-for="session in sessions">
                    <img src="/icons/system/bookmarklet.svg" class="session-img bg-theme" />
                    <div class="session-label d-inline-flex flex-col align-items-end text-center">
                        <span class="session-name font-italic txt-theme text-truncate w-100">{{session.name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:'session-tile-component',
        props: ['userid', 'url', 'request_id'],
        created()
        {
            this.initialiseSessions();
        },
        data()
        {
            return {
                sessions: [],
                loading: true,
            };
        },
        mounted() {
            
        },
        methods:{
            initialiseSessions: function()
            {
                var vm = this;
                if(this.request_type == null || this.request_type == 'get')
                {
                    axios.get(vm.url, {
                            user_id: vm.userid
                        }).then(function (response) {
                            console.log(response.data);
                            vm.sessions = response.data;
                            vm.loading = false;
                        }).catch(function (error) {
                            console.log('Error - could not retrieve sessions for user');
                            vm.loading = false;
                    });
                }
                else
                {
                    axios.post(vm.url, {
                            user_id: vm.userid
                        }).then(function (response) {
                            console.log(response.data);
                            vm.sessions = response.data;
                            vm.loading = false;
                        }).catch(function (error) {
                            console.log('Error - could not retrieve sessions for user');
                            vm.loading = false;
                    });
                }
            }
        },
    }
</script>
<style scoped>
.session-img
{
    height:70%;
    width:100%;
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
