<template>
    <div class="mt-4">
        <p class="text-gray-600 text-sm">{{ job.shortDescription }}...</p>
        <!-- <p>{{ job.location }}</p>
        <p>{{ job.clicks }}</p>
        <p>{{ job.status }}</p>
        <p>{{ job.category.title }}</p> -->
    </div>
</template>

<script setup>
defineProps({
    job: { type: [Array, Object] },
});
</script>
