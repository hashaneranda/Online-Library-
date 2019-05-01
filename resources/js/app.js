

require('./bootstrap');

import Api from './api.js';
import Auth from './auth.js';
import VueRouter from 'vue-router'
import router from './config/routes.js';
import App from './pages/App.vue';

import Vuelidate from 'vuelidate'



window.api = new Api();
window.auth = new Auth();
window.Vue = require('vue');
window.Event = new Vue;
Vue.use(Vuelidate);

Vue.use(VueRouter)

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.middlewareAuth)) {
        if (!auth.check()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            });

            return;
        }
    }

    next();
})



const app = new Vue({
    el: '#app',
    components: { App },
    router
});

