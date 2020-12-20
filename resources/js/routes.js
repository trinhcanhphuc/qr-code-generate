import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './pages/Home'
import Scanner from './pages/Scanner.vue'
import Profile from './pages/Profile.vue'

Vue.use(VueRouter)

export const router = new VueRouter({
  routes: [
    { path: '/', component: Home },
    { path: '/qr-scanner', component: Scanner },
    { path: '/profile', component: Profile },
  ]
})
