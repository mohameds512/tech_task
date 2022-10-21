import {createRouter , createWebHistory } from 'vue-router'

import login from '../vue/login.vue'
import showContent from '../vue/showContent.vue'
const routes = [
    {
        path:'/',
        name:'index',
        component:login
    },
    {
        path:'/fileContent',
        name:'content',
        component:showContent,
    }
]


const router = createRouter({
    history:createWebHistory(import.meta.env.BASE_URL),
    routes
})

export default router
