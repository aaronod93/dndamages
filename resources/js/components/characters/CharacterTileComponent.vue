<template>
    <div class="row justify-content-center text-center h-100">
        <span v-if="loading" class="spinner-border txt-theme"></span>
        <span v-else-if="characters.length == 0">No characters found.</span>
        <div v-else class="col-12 px-0">
            <div class="character-tile col-xl-1 col-lg-2 col-md-3 col-sm-4 pb-3" :key="character.id" v-for="character in characters">
                <img :src="character.imageUrl ? character.imageUrl : '/icons/cement-shoes.svg'" class="character-img bg-theme" />
                <div class="character-label d-inline-flex flex-col align-items-end text-center">
                    <span class="character-name font-italic txt-theme w-100">{{character.name}}</span>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name:'character-tile-component',
        props: ['userid', 'url', 'request_type'],
        created()
        {
            this.initialiseCharacters();
        },
        data()
        {
            return {
                characters: [],
                loading: true
            };
        },
        methods:{
            initialiseCharacters: function()
            {
                var vm = this;
                if(this.request_type == null || this.request_type == 'get')
                {
                    axios.get(vm.url, {
                            user_id: vm.userid
                        }).then(function (response) {
                            console.log(response.data);
                            vm.characters = response.data;
                            vm.loading = false;
                        }).catch(function (error) {
                            console.log('Error - could not retrieve characters for user');
                            vm.loading = false;
                    });
                }
                else
                {
                    axios.post(vm.url, {
                            user_id: vm.userid
                        }).then(function (response) {
                            console.log(response.data);
                            vm.characters = response.data;
                            vm.loading = false;
                        }).catch(function (error) {
                            console.log('Error - could not retrieve characters for user');
                            vm.loading = false;
                    });
                }
            }
        },
    }
</script>
<style scoped>
.character-img
{
    height:50%;
    width:100%;
}
.character-label
{
    height:50%;
    width:100%;
}
.character-name
{
    font-style: italics;
}
</style>
