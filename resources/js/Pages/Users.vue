<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import UsersTable from '../Components/UsersTable.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { defineComponent,computed, ref } from 'vue';
import { NDataTable } from 'naive-ui'

defineProps({
    users: Array
});


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
                            <tr v-for="user in users" scope="" class="py-6 text-xs" >
                                <td>{{ user.nombre}}</td>
                                <td>{{ user.email}}</td>
                                <td>{{ user.cedula}}</td>
                                <td>{{ user.numerodecelular}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>