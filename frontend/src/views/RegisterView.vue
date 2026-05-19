<script setup>

import { reactive } from 'vue'

const form = reactive({

    nombre_de_usuario: '',

    password: '',

    confirmar: ''
})

</script>

<template>

<div class="min-h-screen flex items-center justify-center">

    <div class="bg-slate-800 p-10 rounded-3xl w-full max-w-md">

        <h1 class="text-4xl font-bold mb-8 text-center">

            Registro

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

            <input
                v-model="form.confirmar"
                type="password"
                placeholder="Confirmar contraseña"
                class="w-full p-4 rounded-xl bg-slate-700"
            />

            <button
                class="w-full bg-green-500 p-4 rounded-xl"
            >
                Registrarse
            </button>

        </div>

    </div>

</div>

</template>