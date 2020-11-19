import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './pages/Home'
import Login from './pages/Login.vue'
import SignUp from "./pages/SignUp";
import Scanner from './pages/Scanner.vue'
import About from './pages/About.vue'

Vue.use(VueRouter)

export const router = new VueRouter({
  routes: [
    { path: '/', component: Home },
    { path: '/login', component: Login },
    { path: '/signup', component: SignUp },
    { path: '/qr-scanner', component: Scanner },
    { path: '/about', component: About }
  ]
})
