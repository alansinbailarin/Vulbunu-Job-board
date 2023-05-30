<template>
    <div>
        <h1>{{ job.title }}</h1>
        <p>{{ job.description }}</p>
        <p>{{ job.location }}</p>
        <p>{{ job.clicks }}</p>
        <p>{{ job.status }}</p>
        <p>{{ job.user.name }}</p>
        <p>{{ job.category.title }}</p>
    </div>
</template>

<script setup>
defineProps({
    job: { type: [Array, Object] },
});
</script>
