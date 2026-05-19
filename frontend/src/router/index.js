import { createRouter, createWebHistory } from 'vue-router'

import HomeView from '@/views/HomeView.vue'
import LoginView from '@/views/LoginView.vue'
import RegisterView from '@/views/RegisterView.vue'
import AgendaView from '@/views/AgendaView.vue'
import CreateContactView from '@/views/CreateContactView.vue'
import EditContactView from '@/views/EditContactView.vue'
import ProfileView from '@/views/ProfileView.vue'

import { useAuthStore } from '@/stores/auth'

const routes = [

    {
        path: '/',
        component: HomeView
    },

    {
        path: '/login',
        component: LoginView
    },

    {
        path: '/registro',
        component: RegisterView
    },

    {
        path: '/agenda',
        component: AgendaView,
        meta: {
            requiresAuth: true
        }
    },

    {
        path: '/agenda/crear',
        component: CreateContactView,
        meta: {
            requiresAuth: true
        }
    },

    {
        path: '/agenda/:id',
        component: EditContactView,
        meta: {
            requiresAuth: true
        }
    },

    {
        path: '/perfil',
        component: ProfileView,
        meta: {
            requiresAuth: true
        }
    }

]

const router = createRouter({

    history: createWebHistory(),

    routes

})

router.beforeEach((to, from, next) => {

    const authStore = useAuthStore()

    if (
        to.meta.requiresAuth &&
        !authStore.token
    ) {

        next('/login')

    } else {

        next()
    }
})

export default router