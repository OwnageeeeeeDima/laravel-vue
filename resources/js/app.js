/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/* Роутинг */
import VueRouter from 'vue-router'

Vue.use(VueRouter)

let routes = [
    {path: '/lk/inbox', component: require('./components/Inbox/InboxComponent.vue').default},
    {path: '/lk/parcels', component: require('./components/Inbox/Parcels.vue').default},
    {path: '/lk/inbox/create', component: require('./components/Inbox/CreateInbox.vue').default},
    {path: '/lk/inbox/edit/:id', component: require('./components/Inbox/EditInbox.vue').default},
    {path: '/lk/profile', component: require('./components/Profile/Profile').default},
    {path: '/lk/profile/username', component: require('./components/Profile/Username').default},


]

const router = new VueRouter({
    routes,
    mode: 'history'
})


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('preload-page', require('./components/PreloadPage.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router

});
