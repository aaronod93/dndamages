<template>
<div class="row text-center h-100">
        <div class="col-12 col-md-4 col-lg-3 h-100">
            <div class="d-flex flex-column h-100">
                <div class="row text-center justify-content-center flex-grow-1 h-100">
                   <user-card-component></user-card-component>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9 col-md-8 h-100 mb-3 top-jumbo">
            <tile-component :title="sessionConfig.title" :request_type="sessionConfig.request_type" :url="sessionConfig.url" :default_image_url="sessionConfig.default_image_url" ></tile-component>
            <tile-component :title="characterConfig.title" :request_type="characterConfig.request_type" :url="characterConfig.url" :default_image_url="characterConfig.default_image_url"></tile-component>
        </div>
    </div>
</template>
<script>
import UserCardComponent from "./UserCardComponent";
import TileComponent from "../utilities/TileComponent";
    export default {
        mounted() {
            
        },
        data()
        {
            return {
                characterConfig: {
                    title: 'Characters',
                    request_type: 'get',
                    url: '/characters/data?take=3',
                    default_image_url: '/icons/cement-shoes.svg'

                },
                sessionConfig: 
                {
                    title: 'Sessions',
                    request_type: 'get',
                    url: '/sessions/data?take=3',
                    parameters: null,
                    default_image_url: '/icons/system/bookmarklet.svg'
                }
            };
        },
        methods: 
        {
            getData: function()
            {

            }
        },
        components: {
            UserCardComponent,
            TileComponent
        }
    }
</script>