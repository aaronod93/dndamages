const $ = require('jquery');
const Vue = require('vue');

import SessionsComponent from '../sessions/SessionsComponent.vue';
const sessionsApp = new Vue({
    el: '.sessions-component',
    components: {
        SessionsComponent
    }
});