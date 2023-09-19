<template>
    <div class="flex gap-1">
        <Link
            v-for="(link, index) in links"
            :key="index"
            :href="link.url"
            class="py-2 px-4 rounded-md text-sm"
            :class="{ 'bg-blue-500 text-white': link.active }"
            v-html="link.label"
        >
        </Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    links: {
        type: Array,
    },
});
</script>
