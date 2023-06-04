<template>
    <div class="bg-gray-200 my-8 py-6 px-4">
        <div
            class="md:grid grid-cols-3 items-center justify-between container mx-auto"
        >
            <div>
                <h1
                    class="text-center text-xl md:text-2xl lg:text-3xl md:text-left p-2 md:p-0 font-bold text-gray-800"
                >
                    Últimas ofertas de empleo publicadas
                </h1>
            </div>
            <div>
                <p
                    class="text-gray-600 text-center md:text-left mb-8 md:mb-0 text-sm md:text-sm"
                >
                    En esta seccion, se veran los ultimos empleos o los empleos
                    promocionados publicados en las ultimas horas.
                </p>
            </div>
            <div class="text-center">
                <Link
                    href=""
                    class="border-2 rounded-md border-gray-700 px-7 font-medium py-3 md:px-8 md:py-4 text-sm"
                    >Ver todo</Link
                >
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
