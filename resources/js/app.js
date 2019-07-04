/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


require('./bootstrap');


import VueRouter from 'vue-router'

Vue.use(VueRouter);

import AddServices from './components/services/AddServices'
import MyServices from './components/services/MyServices'
import ServiceDetails from './components/services/ServiceDetails'
import IncomeOrders from './components/orders/IncomeOrders'
import SendOrders from './components/orders/SendOrders'
import User from './components/users/userServices'
import Order from './components/orders/OrderDetails'

const router = new VueRouter({

	routes:[

		{
			path:'/user/:id',
			component:User,
			name:'User'
		},
		{
			path:'/order/:id',
			component:Order,
			name:'Order'
		},
		{
			path:'/add-services',
			component:AddServices,
			name:'AddServices'
		},
		{
			path:'/my-services',
			component:MyServices,
			name:'MyServices'
		},
		{
			path:'/service-details/:id',
			component:ServiceDetails,
			name:'ServiceDetails',

		},
		{
			path:'/income-orders',
			component:IncomeOrders,
			name:'IncomeOrders'
		},
		{
			path:'/send-orders',
			component:SendOrders,
			name:'SendOrders'
		}
		


	],

});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:function () {
    	return {
    		message:'5555555555555555', 
    	};
    },
    router
});
