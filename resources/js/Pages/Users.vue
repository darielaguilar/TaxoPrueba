<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import UsersTable from '../Components/UsersTable.vue'
import { Head } from '@inertiajs/inertia-vue3';
import {Inertia} from '@inertiajs/inertia'
import {reactive,ref} from 'vue'

import Pagination from '../Components/Pagination.vue'
defineProps({
    users: Array
});
const form = reactive({
    search:null,
})
function submit(){
    Inertia.post('/users',form)
}

let search = ref('');

watch(search, value => {
    Inertia.get('/users', {search:value})
})
</script>

<template>

    <Head title="Usuarios" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tabla de usuarios
            </h2>

        </template>

        <div class="py-12">
            <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                                <input name="search" type="search" id="search" placeholder="Search" v-model="search" />
                            </form>
                        <table class="min-w-full divide-y divide-gray-200">
                            
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray uppercase tracking-wider">Nombre</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray uppercase tracking-wider">Cedula</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray uppercase tracking-wider">Numero de telefono</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray uppercase tracking-wider">Fecha de nacimiento</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray uppercase tracking-wider">Edad</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray uppercase tracking-wider">Pais</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray uppercase tracking-wider">Ciudad</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray uppercase tracking-wider">Estado</th>
                            </tr>
                            <tr v-for="user in users.data" scope="" class="py-6 text-xs" >
                                <td class="text-center justify-center">{{ user.nombre}}</td>
                                <td class="text-center justify-center">{{ user.email}}</td>
                                <td class="text-center justify-center">{{ user.cedula}}</td>
                                <td class="text-center justify-center">{{ user.numerodecelular}}</td>
                                <td class="text-center justify-center">{{ user.fechaDeNacimiento}}</td>
                                <td class="text-center justify-center">{{ user.fechaDeNacimiento}}</td>
                                <td class="text-center justify-center">{{ user.Pais}}</td>
                                <td class="text-center justify-center">{{ user.Ciudad}}</td>
                                <td class="text-center justify-center">{{ user.Estado}}</td>
                            </tr>
                            
                        </table>
                       <Pagination :links="users.links"/>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>