<template>
    <div class="row jumbotron hoverable">
        <div class="col-12">
            <div class="row">
                <div class="col-8 offset-2">
                    <h2>Recent Sessions</h2>
                </div>
            </div>
        </div>
        <div class="row w-100 px-0">
            <span v-if="loading" class="spinner-border txt-theme"></span>
            <span v-else-if="sessions.length == 0">No sessions found.</span>
            <div v-else class="col-12 d-flex align-items-center mh-50">
                <div class="row px-0">
                    <div class="session-tile col-4 col-sm-12" :key="session.id" v-for="session in sessions">
                        <div class="row">
                            <div class="col-12">
                                <img src="/icons/system/bookmarklet.svg" class="session-img bg-theme" />
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-12 text-center">
                                <span class="font-italic txt-theme text-truncate w-100">{{session.name}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:'session-tile-component',
        props: ['url', "request_type"],
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