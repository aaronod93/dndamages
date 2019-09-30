<template>
    <div class="row jumbotron hoverable">
        <div class="col-12">
            <div class="row">
                <div class="col-8 offset-2">
                    <h2>Recent {{title}}</h2>
                </div>
            </div>
        </div>
        <div class="row w-100 px-0">
            <span v-if="loading" class="spinner-border txt-theme"></span>
            <span v-else-if="entities.length == 0">No {{title}} found.</span>
            <div v-else class="col-12 d-flex align-items-center mh-50">
                <div class="row px-0">
                    <div class="session-tile col-4 col-sm-12" :key="entity.id" v-for="entity in entities">
                        <div class="row">
                            <div class="col-12">
                                <img :src="entity.imageUrl ? entity.imageUrl : defaultImageUrl" class="entity-img bg-theme" />
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-12 text-center">
                                <span class="font-italic txt-theme text-truncate w-100">{{entity.name}}</span>
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
        name:'tile-component',
        props: ['url', "request_type", "title", "defaultImageUrl"],
        created()
        {
            this.initialiseEntities();
        },
        data()
        {
            return {
                entities: [],
                loading: true
            };
        },
        methods:{
            initialiseEntities: function()
            {
                var vm = this;
                if(this.request_type == null || this.request_type == 'get')
                {
                    axios.get(vm.url).then(function (response) {
                            vm.entities = response.data;
                            vm.loading = false;
                        }).catch(function (error) {
                            console.log('Error - could not retrieve characters for user');
                            vm.loading = false;
                    });
                }
                else
                {
                    axios.post(vm.url).then(function (response) {
                            vm.entities = response.data;
                            vm.loading = false;
                        }).catch(function (error) {
                            vm.loading = false;
                    });
                }
            }
        },
    }
</script>