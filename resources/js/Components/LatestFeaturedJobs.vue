<template>
    <div class="text-center my-8 px-4">
        <h1 class="text-2xl md:text-5xl font-bold mb-3">
            Ofertas de empleo <span class="text-indigo-500">patrocinadas</span>
        </h1>
        <span class="text-gray-500">
            Quieres que tu oferta de empleo aparezca en esta sección?
            <Link href="/publish-job" class="underline text-blue-500"
                >publicate</Link
            >
        </span>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
