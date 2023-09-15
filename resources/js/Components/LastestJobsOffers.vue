<template>
    <div class="bg-indigo-500 my-8 py-6 px-4">
        <div
            class="md:grid grid-cols-3 items-center justify-between container mx-auto"
        >
            <div>
                <h1
                    class="text-center text-white text-xl md:text-2xl lg:text-3xl md:text-left p-2 md:p-0 font-bold"
                >
                    Latest job offers posted
                </h1>
            </div>
            <div>
                <p
                    class="text-gray-100 text-center md:text-left mb-8 md:mb-0 text-sm md:text-sm"
                >
                    In this section, you'll find the most recent or highlighted
                    job listings posted within the last few hours.
                </p>
            </div>
            <div class="text-center">
                <Link
                    href="/jobs"
                    class="border-2 rounded-md border-gray-200 text-gray-200 px-7 font-medium py-3 md:px-8 md:py-4 text-sm"
                    >See all</Link
                >
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
