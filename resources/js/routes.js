import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './pages/Home'
import HelloWorld from './components/HelloWorld.vue'
import About from './components/About.vue'

Vue.use(VueRouter)

export const router = new VueRouter({
  routes: [
    { path: '/', component: Home },
    { path: '/hello', component: HelloWorld },
    { path: '/about', component: About }
  ]
})
