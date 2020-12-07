import Vue from 'vue'
import Router from 'vue-router'
import BootstrapVue from 'bootstrap-vue'

//notification
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";
Vue.use(Toast, {
    transition: "Vue-Toastification__bounce",
    maxToasts: 20,
    newestOnTop: true
  });

//import BootstrapVue from '../../node_modules/bootstrap-vue/dist/bootstrap-vue'
//import Bootstrap from '../../node_modules/bootstrap/dist/css/bootstrap.min.css'

//Vue.config.productionTip = false;

//import firstvue from './components/pages/MyFirstVue'
//import second from './components/pages/Second'
//import third from './components/pages/Third'
//import comment from './components/pages/Comment'
//import showComment from './components/comment/Comment.vue'
//import student from './components/pages/Student.vue'

Vue.use(Router)
// Install BootstrapVue

Vue.use(BootstrapVue)
//Vue.use(Bootstrap)


const routes=[
    {
        path:'/my',
        component: ()=>import('./components/pages/MyFirstVue')
    },
    {
        path:'/second',
        component: ()=>import('./components/pages/Second')
    },
    {
        path:'/third',
        component:()=>import('./components/pages/Third')
    },
    {
        path:'/add',
        component: ()=>import('./components/pages/Comment')
    },
    {
        path:'/comment',
        component: ()=>import('./components/comment/Comment.vue')
    },
    {
        path:'/student',
        component:()=>import('./components/pages/Student.vue')
    }
]

export default new Router({
    mode: 'history',
    routes
})
