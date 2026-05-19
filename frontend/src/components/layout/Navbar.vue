<script setup>

import { useAuthStore } from '@/stores/auth'

const authStore = useAuthStore()

</script>

<template>

<header class="bg-slate-800 p-5 flex justify-between">

    <h1 class="text-2xl font-bold">

        Dashboard

    </h1>

    <div class="flex items-center gap-4">

        <span>

            {{ authStore.usuario?.nombre_de_usuario }}

        </span>

        <img
            :src="authStore.usuario?.foto || 'https://placehold.co/100'"
            class="w-12 h-12 rounded-full object-cover"
        />

    </div>

</header>

</template>