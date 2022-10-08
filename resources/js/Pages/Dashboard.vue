<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import {reactive} from 'vue'

//En este objeto se van a guardar los datos del correo
let mail=reactive({
    asunto:'',
    destinatario:'',
    cuerpo:''
})

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Estas conectado!
                        <form >
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="asunto">Asunto</label>
                            <input v-model="mail.asunto" class="border border-gray-400 p-2 w-full" type="text" name="asunto" id="asunto" required/>
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="asunto">Destinatario</label>
                            <input v-model="mail.destinatario" class="border border-gray-400 p-2 w-full" type="text" name="asunto" id="asunto" required/>
                            <button class="bg-blue-400" value="Enviar correo" type="submit">Enviar</button>
                        </form>       
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
