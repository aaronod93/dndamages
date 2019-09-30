<template>
    <div class="jumbotron hoverable">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-8 offset-2 mb-2">
                        <h2>Recent {{title}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-0">
            <div v-if="loading" class="col-8 offset-2 text-center">
                <span class="spinner-border txt-theme"></span>
            </div>
            <div class="col-8 offset-2 text-center" v-else-if="entities.length == 0">No {{title}} found.</div>
            <div v-else class="col-12 col-md-6 offset-md-3">
                <div class="d-flex align-content-center">
                    <div class="entity-item border hoverable p-3 pointer" :key="entity.id" v-for="entity in entities">
                        <a href="#">
                        <div class="row">
                            <div class="col-12">
                                <img :src="entity.imageUrl ? entity.imageUrl : default_image_url" class="entity-img bg-theme w-100" />
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="text-center text-wrap w-100 font-italic txt-theme">{{entity.name}}</div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name:'tile-component',
        props: ['url', "request_type", "title", "default_image_url"],
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
        computed: {
            entityStyle: function()
            {
                if(entities.length == 1)
                {
                    return 'margin-left:40%;'
                }
            }
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
<style>
.entity-img
{
    max-height:100px;
    max-width:100px;
}
</style>