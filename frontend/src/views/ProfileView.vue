<script setup>

import MainLayout from '@/layouts/MainLayout.vue'

import { useAuthStore } from '@/stores/auth'

const authStore = useAuthStore()

</script>

<template>

<MainLayout>

    <div class="bg-slate-800 p-10 rounded-3xl max-w-xl">

        <div class="flex items-center gap-6">

            <img
                :src="authStore.usuario?.foto || 'https://placehold.co/200'"
                class="w-32 h-32 rounded-full object-cover"
            />

            <div>

                <h1 class="text-4xl font-bold">

                    {{ authStore.usuario?.nombre_de_usuario }}

                </h1>

                <p class="text-slate-400 mt-3">

                    Usuario autenticado

                </p>

            </div>

        </div>

    </div>

</MainLayout>

</template>