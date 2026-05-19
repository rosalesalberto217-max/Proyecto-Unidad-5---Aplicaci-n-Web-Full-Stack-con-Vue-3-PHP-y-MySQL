<script setup>

import { onMounted, ref } from 'vue'

import MainLayout from '@/layouts/MainLayout.vue'

import ContactCard from '@/components/contactos/ContactCard.vue'

import { obtenerContactos } from '@/services/contactService'

const contactos = ref([])

async function cargarContactos() {

    const response = await obtenerContactos()

    if (response.success) {

        contactos.value = response.contactos
    }
}

onMounted(() => {

    cargarContactos()
})

</script>

<template>

<MainLayout>

    <div class="flex justify-between items-center mb-10">

        <h1 class="text-5xl font-bold">

            Mis Contactos

        </h1>

        <RouterLink
            to="/agenda/crear"
            class="bg-blue-500 px-6 py-3 rounded-xl"
        >
            Nuevo Contacto
        </RouterLink>

    </div>

    <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
    >

        <ContactCard
            v-for="contacto in contactos"
            :key="contacto.id"
            :contacto="contacto"
        />

    </div>

</MainLayout>

</template>