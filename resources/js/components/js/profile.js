const $ = require('jquery');
const Vue = require('vue');

import ProfileComponent from '../profile/ProfileComponent.vue';
const profileApp = new Vue({
    el: '.profile-component',
    components: {
        ProfileComponent
    }
});