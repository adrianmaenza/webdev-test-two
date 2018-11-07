import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
    {path: '/', component: require("./components/dash/Users")},
    {path: '/attributes', component: require("./components/dash/Attributes")}
]

export default new VueRouter({
    routes
})