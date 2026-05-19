<script setup>

import { RouterLink } from 'vue-router'

</script>

<template>

<aside class="w-64 bg-slate-800 min-h-screen p-6">

    <h1 class="text-3xl font-bold text-blue-400 mb-10">

        Agenda App

    </h1>

    <nav class="flex flex-col gap-4">

        <RouterLink
            to="/"
            class="hover:text-blue-400"
        >
            Inicio
        </RouterLink>

        <RouterLink
            to="/agenda"
            class="hover:text-blue-400"
        >
            Agenda
        </RouterLink>

        <RouterLink
            to="/agenda/crear"
            class="hover:text-blue-400"
        >
            Nuevo Contacto
        </RouterLink>

        <RouterLink
            to="/perfil"
            class="hover:text-blue-400"
        >
            Perfil
        </RouterLink>

    </nav>

</aside>

</template>