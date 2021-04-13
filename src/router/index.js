import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/home',
    name: 'Home',
    component: () => import(/* webpackChunkName: "home" */ '../views/Home.vue')
  },
  {
    path: '/currencyConverter',
    name: 'CurrencyConverter',
    component: () => import(/* webpackChunkName: "CurrencyConverter" */ '../views/CurrencyConverter.vue')
  },
  {
    path: '/currencyHistory',
    name: 'CurrencyHistory',
    component: () => import(/* webpackChunkName: "currencyHistory" */ '../views/CurrencyHistory.vue')
  },
  {
    path: '/modalDefault',
    name: 'ModalDefault',
    component: () => import(/* webpackChunkName: "modalDefault" */ '../components/ModalDefault.vue')
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  }
]

const router = new VueRouter({
  routes
})

export default router
