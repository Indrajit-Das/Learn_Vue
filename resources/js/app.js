/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/*
Vue.component('first-nav',require('./components/First.vue').default);
Vue.component('btn-count',require('./components/CountComponent.vue').default);
Vue.component('test-2',require('./components/Test2.vue').default);*/
import router from './router'
//Vue.component('b-count',require('./components/CountComponent.vue').default);
Vue.component('master-body-component',require('./components/master/TheBody.vue').default);
Vue.component('comment-component',require('../js/components/comment/Comment.vue').default);
Vue.component('nav-component',require('../js/components/nav/TheNavigation.vue').default);

//for pagination
//Vue.component('pagination', require('../js/components/pages/Pagination.vue').default);

Vue.component('pagination', require('../js/components/pages/Pagination2.vue').default);
//Vue.component('pagination-2',require('../js/components/pages/Pagination2.vue').default);

new Vue({
   el:'#bd',
   router
});

//Vue.component('my-first',require('./components/pages/MyFirstVue.vue').default);

/*
new Vue({
    el:'#d',
    router
});*/

/*
Vue.component('test-3',{
    data:function(){
        return{
            title:'Final Card Title',
            content:'Final Card body Content '
        }
    },
    template:'<div class="card"><div class="card"><div class="card-header">{{ content }}</div><div class="card-body"><h5 class="card-title">{{title}}</h5> <p class="card-text">{{content}}</p></div></div></div>'
});

Vue.component('button-counter',{
    data: function () {
      return {
        count: 0
      }
    },
    template: '<button v-on:click="count++">You clicked me {{ count }} times.</button>'
  });*/



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/*
new Vue({ el: '#components-demo' });
new Vue({el:'#btn-count'});

const app=new Vue({
    el: '#nav',
});

new Vue({
    el:'#cbody',
});

new Vue({
  el:'#demo',
});

new Vue({
    el:'#demo1',
});
new Vue({
    el:'#demo3',
    data:function(){
        return{
            titel:'Final Card Title',
            content:'Final Card body Content '
        }
    }
});*/

//a.lp.push({text:'new Element'});



