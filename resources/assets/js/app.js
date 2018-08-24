
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 /*
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('painting-component', require('./components/PaintingComponent.vue'));
*/

import examplecomponent from './components/Home.vue';
import createpainting from './components/painting/CreatePainting.vue';
import createcollection from './components/collection/CreateCollection.vue';
import showpainting from './components/painting/ShowPainting.vue';
import paintinglist from './components/painting/ListPainting.vue';
import searchcomponent from './components/SearchComponent.vue';

const app = new Vue({
    el: '#app',
    components: {
        examplecomponent,
        createpainting,
        createcollection,
        showpainting,
        paintinglist
    }
});
