const $ = require('jquery');
const Vue = require('vue');

import SessionTileComponent from '../SessionTileComponent.vue';
const charTileApp = new Vue({
    el: '.session-app',
    components: {
        SessionTileComponent
    }
});