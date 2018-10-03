
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

import welcome from './components/Desc/Welcome.vue';
import markcomponent from './components/Desc/Mark.vue';
import artiste from './components/Desc/Artist.vue';
import createpainting from './components/painting/CreatePainting.vue';
import createcollection from './components/collection/CreateCollection.vue';
import showpainting from './components/painting/ShowPainting.vue';
import paintinglist from './components/painting/ListPainting.vue';
import listcollection from './components/collection/ListCollection.vue';
import modifypainting from './components/painting/ModifyPainting.vue';
import getcollection from './components/model/GetCollectionLink.vue';
import cart from './components/user/cart.vue';
import home from './components/user/Home.vue';
import loader from './components/model/loader.vue';

const app = new Vue({
    el: '#app',
    components: {
        welcome,
        createpainting,
        createcollection,
        showpainting,
        paintinglist,
        listcollection,
        modifypainting,
        getcollection,
        markcomponent,
        artiste,
        cart,
        loader,
        home
    }
});