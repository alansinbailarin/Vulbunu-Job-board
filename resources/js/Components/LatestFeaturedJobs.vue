<template>
    <div class="text-center my-8 px-4">
        <h1 class="text-2xl md:text-5xl font-bold mb-3">
            <span class="text-blue-500">Highlighted</span> job offers
        </h1>
        <span class="text-gray-500">
            Would you like your job listing to appear in this section?
            <Link href="/publish-job" class="underline text-blue-500"
                >Post it</Link
            >
        </span>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
