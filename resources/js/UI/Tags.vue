<template>
    <div class="flex flex-wrap gap-2 items-center mt-3">
        <p
            class="bg-gray-100 py-0.5 px-2 text-xs text-gray-600 rounded-md"
            v-for="tag in job.tag"
            :key="tag.id"
        >
            {{ tag.name }}
        </p>
    </div>
</template>

<script setup>
defineProps({
    job: { type: [Array, Object] },
});
</script>
