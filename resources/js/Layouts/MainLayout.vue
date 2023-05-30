<template>
    <div>
        <header class="bg-white shadow-sm sticky w-full top-0 z-10">
            <div class="container mx-auto">
                <nav class="flex items-center justify-between p-4">
                    <div class="text-lg font-bold">
                        <Link href="/">Logo</Link>
                    </div>
                    <div class="flex flex-row gap-8 text-sm font-medium">
                        <Link href="/">Inicio</Link>
                        <Link href="#">Crear CV</Link>
                        <Link href="#">Salarios</Link>
                        <Link href="#">Para jovenes</Link>
                        <Link href="#">Para adultos mayores</Link>
                    </div>
                    <div
                        class="flex flex-row gap-4 text-sm items-center font-medium"
                    >
                        <Link
                            class="bg-blue-600 shadow-lg text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200 ease-in-out"
                            href="#"
                            >Para empresas</Link
                        >
                        <Link
                            class="bg-gray-100 shadow-md px-4 py-2 rounded-md hover:bg-gray-200 transition-all duration-300 ease-in-out"
                            href="#"
                            >Registrate</Link
                        >
                    </div>
                </nav>
            </div>
        </header>
        <main class="container mx-auto p-4">
            <slot>Default</slot>
        </main>
        <footer>Adios</footer>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const bannerOpen = ref(true);
</script>
