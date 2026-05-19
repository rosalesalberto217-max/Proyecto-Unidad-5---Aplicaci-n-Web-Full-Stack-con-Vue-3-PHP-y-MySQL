<script setup>

import { reactive, ref } from 'vue'

import MainLayout from '@/layouts/MainLayout.vue'

const preview = ref(null)

const form = reactive({

    nombre: '',

    apellido: '',

    telefono: '',

    email: '',

    direccion: '',

    notas: '',

    foto: null
})

function cambiarImagen(event) {

    form.foto = event.target.files[0]

    preview.value = URL.createObjectURL(form.foto)
}

</script>

<template>

<MainLayout>

    <h1 class="text-5xl font-bold mb-10">

        Nuevo Contacto

    </h1>

    <div class="bg-slate-800 p-10 rounded-3xl max-w-3xl">

        <div class="grid md:grid-cols-2 gap-5">

            <input
                v-model="form.nombre"
                type="text"
                placeholder="Nombre"
                class="p-4 rounded-xl bg-slate-700"
            />

            <input
                v-model="form.apellido"
                type="text"
                placeholder="Apellido"
                class="p-4 rounded-xl bg-slate-700"
            />

            <input
                v-model="form.telefono"
                type="text"
                placeholder="Teléfono"
                class="p-4 rounded-xl bg-slate-700"
            />

            <input
                v-model="form.email"
                type="email"
                placeholder="Email"
                class="p-4 rounded-xl bg-slate-700"
            />

        </div>

        <input
            v-model="form.direccion"
            type="text"
            placeholder="Dirección"
            class="w-full p-4 rounded-xl bg-slate-700 mt-5"
        />

        <textarea
            v-model="form.notas"
            placeholder="Notas"
            class="w-full p-4 rounded-xl bg-slate-700 mt-5"
        ></textarea>

        <input
            type="file"
            @change="cambiarImagen"
            class="mt-5"
        />

        <img
            v-if="preview"
            :src="preview"
            class="w-40 h-40 rounded-2xl object-cover mt-5"
        />

        <button
            class="bg-blue-500 px-8 py-4 rounded-xl mt-5"
        >
            Guardar Contacto
        </button>

    </div>

</MainLayout>

</template>