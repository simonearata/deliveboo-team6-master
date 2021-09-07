import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Payment from './pages/Payment.vue'
import Home from './pages/Home.vue';
import RestaurantShow from './pages/RestaurantShow.vue';
import Order from './pages/Order.vue';
import Error404 from './pages/Error404.vue';


const router = new VueRouter({
  mode: 'hash',
  linkExactActiveClass: 'active',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/restaurant/:slug',
      name: 'restaurantshow',
      component: RestaurantShow
    },
    {
      path: '/payment',
      name: 'payment',
      component: Payment
    },
    {
      path: '/order',
      name: 'order',
      component: Order
    },
    {
      path: '/*',
      name: 'error404',
      component: Error404
    },
  ]
});

export default router;