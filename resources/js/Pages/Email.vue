<script setup>

defineProps({
    mail: Array
});
</script>

<template>
    <div>
        <h1>{{mail.asunto}}</h1>
        <hr/>
        <p>{{mail.cuerpo}}</p>
    </div>
</template>