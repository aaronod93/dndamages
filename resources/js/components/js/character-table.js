const $ = require('jquery');
const Vue = require('vue');

import CharactersComponent from '../characters/CharactersComponent.vue';
const charactersApp = new Vue({
    el: '.characters-component',
    components: {
        CharactersComponent
    }
});