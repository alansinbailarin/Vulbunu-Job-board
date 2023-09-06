<template>
    <div>{{ message }}</div>
</template>

<script setup>
const props = defineProps({
    message: String,
});
</script>
