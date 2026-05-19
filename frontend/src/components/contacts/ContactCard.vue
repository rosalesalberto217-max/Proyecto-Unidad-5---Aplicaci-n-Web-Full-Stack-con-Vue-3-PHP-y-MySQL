<script setup>

defineProps({

    contacto: Object
})

</script>

<template>

<div class="bg-slate-800 p-6 rounded-3xl">

    <img
        :src="contacto.foto"
        class="w-full h-60 object-cover rounded-2xl"
    />

    <div class="mt-5">

        <h2 class="text-2xl font-bold">

            {{ contacto.nombre }}

        </h2>

        <p class="text-slate-400 mt-2">

            {{ contacto.telefono }}

        </p>

        <p class="text-slate-400">

            {{ contacto.email }}

        </p>

        <RouterLink
            :to="`/agenda/${contacto.id}`"
            class="inline-block mt-5 bg-blue-500 px-5 py-3 rounded-xl"
        >
            Editar
        </RouterLink>

    </div>

</div>

</template>