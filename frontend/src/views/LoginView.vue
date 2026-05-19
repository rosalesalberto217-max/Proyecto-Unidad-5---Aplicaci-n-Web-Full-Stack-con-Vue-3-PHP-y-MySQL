<script setup>

import { reactive } from 'vue'

import { useRouter } from 'vue-router'

import { useToast } from 'vue-toastification'

import { apiFetch } from '@/composables/useApi'

import { useAuthStore } from '@/stores/auth'

const router = useRouter()

const toast = useToast()

const authStore = useAuthStore()

const form = reactive({

    nombre_de_usuario: '',

    password: ''
})

async function login() {

    const response = await apiFetch(
        '/auth/login.php',
        {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json'
            },

            body: JSON.stringify(form)
        }
    )

    if (!response.success) {

        toast.error(response.message)

        return
    }

    authStore.setAuth(
        response.token,
        response.usuario
    )

    toast.success('Bienvenido')

    router.push('/agenda')
}

</script>

<template>

<div class="min-h-screen flex items-center justify-center">

    <div class="bg-slate-800 p-10 rounded-3xl w-full max-w-md">

        <h1 class="text-4xl font-bold text-center mb-8">

            Login

        </h1>

        <div class="space-y-4">

            <input
                v-model="form.nombre_de_usuario"
                type="text"
                placeholder="Usuario"
                class="w-full p-4 rounded-xl bg-slate-700"
            />

            <input
                v-model="form.password"
                type="password"
                placeholder="Contraseña"
                class="w-full p-4 rounded-xl bg-slate-700"
            />

            <button
                @click="login"
                class="w-full bg-blue-500 p-4 rounded-xl"
            >
                Ingresar
            </button>

        </div>

    </div>

</div>

</template>