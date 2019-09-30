<template>
    <div v-if="loading">
        <div class="preloader usercard pos-absolute pt-5">
            <div class="loader"></div>
        </div>
    </div>
    <div v-else id="user-profile" class="card-component col-12">
        <div class="jumbotron card-jumbotron hoverable txt-theme pb-3">
            <img class="card-img bg-dark bg-theme" src="/icons/person.svg" alt="">
            <ul class="list-group list-group-flush pt-2 nb-t nb-b text-center">
                <li class="list-group-item d-flex justify-content-center h-50px">
                    <span class="stat-info">
                        <i class="fa fa-user pr-3"></i>
                        {{user == null ? "" : user.name}}
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-center align-items-center h-50px">
                    <span class="stat-info">
                        <i class="fa fa-trophy pr-3"></i>
                        {{joinedDate}}
                    </span>
                </li>
            </ul>
            <ul class="list-group list-group-flush mt-2 nb-t nb-b">
                <li class="list-group-item d-flex justify-content-between align-items-center .h-pix-10">
                    <span class="w-100" style="height:1px; border-bottom:1px solid lightgrey;"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Owned Sessions
                <span class="badge bg-theme badge-pill">{{ownedSessions ? ownedSessions : 0}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                        Joined Sessions
                    <span class="badge bg-theme badge-pill">{{joinedSessions ? joinedSessions : 0}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center .h-pix-10">
                    <span class="w-100" style="height:1px; border-bottom:1px solid lightgrey;"></span>
                </li>
                <li class="d-flex justify-content-between">
                        <a href="/characters" type="button" class="btn bg-theme w-100 py-1 d-flex justify-content-between">
                        <img src="/icons/cement-shoes.svg" class="img-icon x1p5 d-inline-flex">
                        <span class="d-inline-flex">Characters</span>
                        <i style="font-size:1.2rem;" class="fa fa-arrow-right d-inline-flex justify-content-center fa-h-fix"></i>
                    </a>
                </li>
                <li class="d-flex justify-content-between">
                    <a href="/sessions" type="button" class="btn bg-theme w-100 py-1 d-flex justify-content-between">
                    <img class="img-icon x1p5 d-inline-flex" src="/icons/system/bookmarklet.svg">
                    <span class="d-inline-flex">Sessions</span>
                    <i style="font-size:1.2rem;" class="fa fa-arrow-right d-inline-flex justify-content-center fa-h-fix"></i>
                </a>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
import moment from "moment";
    export default {
        data()
        {
            return {
                user: null,
                ownedSessions: 0,
                joinedSessions: 0,
                loading: true,

            };
        },
        mounted() {
            this.populateData();
        },
        computed:
        {
            joinedDate: function()
            {
                return this.user == null ? "" : moment(this.user.created_at.substring(0, this.user.created_at.indexOf(' '))).format('DD/MM/Y');
            }
        },
        methods: {
            populateData: function()
            {
                var vm = this;
                axios.get('/user/profile').then(function(response)
                {
                    vm.ownedSessions = response.data.ownedSessions;
                    vm.joinedSessions = response.data.joinedSessions;
                    vm.user = response.data.user;
                    vm.loading = false;
                });
            },
        }

    }
</script>