/**
    @props links
    Componente encargado de la paginacion se le pasa el json users y el accede a la propiedad links
    el cual es un arreglo que contiene los objetos y las paginas en que esta dividida la consulta a la db
 */

<template>
     <Component :is="link.url ?'a':'span'" v-for="link in links" :href="link.url" v-html="link.label" class="px-2 py-7 my-5 justify-center " :class="link.url ?'': 'text-gray-300'"></Component>
</template>
<script>
    export default{
        props:{
            links: Array
        }
    }
</script>