<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import {reactive} from 'vue'
import {Inertia} from '@inertiajs/inertia'
import { Session } from 'inspector';


//En este objeto se van a guardar los datos del correo
let mail=reactive({
    asunto:'',
    destinatario:'',
    cuerpo:'',
    pendiente: true,
    email: ''

})


let submit = () =>{
    console.log(Session())
    console.log(mail)
    Inertia.post('/dashboard',mail);
}
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
                        <form @submit.prevent="submit" action="/users/create" class="max-w-md mx-auto mt-8">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="asunto">Asunto</label>
                            <input v-model="mail.asunto" class="border rounded border-gray-400 p-2 w-full" type="text" name="asunto" id="asunto" required/>
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="asunto">Destinatario</label>
                            <input v-model="mail.destinatario" class="border rounded border-gray-400 p-2 w-full" type="text" name="asunto" id="asunto" required/>
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="asunto">Mensaje</label>
                            <textarea v-model="mail.cuerpo" class="border rounded border-gray-400 p-2 w-full" rows="5" name="asunto" id="asunto" required/>
                            <button class="bg-blue-600 mx-2 my-2 py-2 px-2 rounded text-white" value="Enviar correo" type="submit">Enviar</button>
                        </form>       
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
