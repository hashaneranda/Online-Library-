import Dashboard from '../pages/Dashboard.vue'
import Login from '../pages/Login.vue'
import Register from '../pages/Register.vue'
import Addbooks from '../pages/Addbooks.vue'
import SingleBook from '../pages/SingleBook.vue'


import VueRouter from 'vue-router'


const routes = [
    {
        path: '/',
        name: 'dashboard',
        meta: { middlewareAuth: true },
        component: Dashboard
    },
    {
        path: '/addBooks',
        name: 'addBooks',
        meta: { middlewareAuth: true },
        component: Addbooks
    },
    {
        path: '/editBook/:id',
        name: 'editBook',
        meta: { middlewareAuth: true },
        component: Addbooks,
        props: true
    },
    {
        path: '/book',
        name: 'book',
        meta: { middlewareAuth: true },
        component: SingleBook,
        props: true
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: '*',
        redirect: '/'
    }
  ]


  export default new VueRouter({
    mode: 'history',
    routes
});
