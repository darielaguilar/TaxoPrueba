<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import {Inertia} from '@inertiajs/inertia'
import {reactive} from 'vue'


let form = reactive({
    nombre:'',
    email:'',
    password:'',
    password_confirm:'',
    numerodecelular:'',
    cedula:'',
    fechaDeNacimiento:''

})
let submit = () =>{
    Inertia.post('/users/create',form);
}

//Url de la api de paises
const url = "https://restcountries.com/v3.1/all"
async function TraerPaises(){
    await fetch(url)
.then(data=>{
    return CogerNombre(data)})
.then(res=>{console.log(res)})
}
const paises = TraerPaises();
console.log(paises)
function CogerNombre(data){
    
    let nombre = data.json()
    return nombre
}
</script>

<template>
    <Head title="Crear usuarios"/>
    <AuthenticatedLayout>
        <template #header>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">Crear usuario</h1>
    </template> 
        <div class="py-12">
            <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit" action="/users/create" class="max-w-md mx-auto mt-8">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">Nombre</label>
                            <input v-model="form.nombre" class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" required/>

                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                            <input v-model="form.email" class="border border-gray-400 p-2 w-full" type="text" name="email" id="email" required/>

                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
                            <input v-model="form.password" class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required/>

                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="confirmation">Confirm Password</label>
                            <input v-model="form.password_confirm"  class="border border-gray-400 p-2 w-full" type="password" name="confirm" id="confirmation" required/>

                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="telefono">Numero de telefono</label>
                            <input v-model="form.numerodecelular" class="border border-gray-400 p-2 w-full" type="text" name="telefono" id="telefono" required/>

                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="cedula">CEDULA</label>
                            <input v-model="form.cedula" class="border border-gray-400 p-2 w-full" type="text" name="ID" id="id" required/>

                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="fechadenacimiento">Fecha de nacimiento</label>
                            <input v-model="form.fechaDeNacimiento" class="border border-gray-400 p-2 w-full" type="date" name="fechadenacimiento" id="fechadenacimiento" required/>
                            <button type="submit" class="bg-blue-400 text-white rounded py-2 my-2 px-4 hover:bg-blue-600">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

