const $ = require('jquery');
const Vue = require('vue');

import CharacterTileComponent from '../CharacterTileComponent.vue';
const charTileApp = new Vue({
    el: '.char-app',
    components: {
        CharacterTileComponent
    }
});