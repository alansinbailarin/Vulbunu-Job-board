<template>
    <header
        :class="{
            'bg-white': !isTransparent,
            'bg-white bg-opacity-80 backdrop-filter backdrop-blur transition-all duration-300 ease-in-out':
                isTransparent,
        }"
        class="bg-white shadow-sm sticky top-0 z-10 w-full"
    >
        <div class="container mx-auto">
            <nav class="md:flex md:items-center md:justify-between p-4">
                <div
                    class="max-w-screen-xl md:hidden flex flex-wrap items-center justify-between mx-auto"
                >
                    <Link href="/" class=""
                        ><span
                            class="font-bold text-transparent text-xl bg-clip-text bg-gradient-to-r from-indigo-400 to-blue-600"
                        >
                            midiauno.com
                        </span></Link
                    >
                    <button
                        @click="toggleMenu"
                        type="button"
                        class="inline-flex items-center p-2 ml-3 text-sm text-gray-700 md:hidden"
                    >
                        <svg
                            class="w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                    <div
                        :class="{ hidden: !isMenuOpen }"
                        class="w-full md:block md:w-auto transition-all duration-500 ease-in-out"
                    >
                        <ul class="flex flex-col md:p-0 mt-2 md:flex-row p-2">
                            <li>
                                <Link
                                    href="/"
                                    class="text-base py-3 px-4 flex"
                                    :class="{
                                        'text-indigo-500': $page.url === '/',
                                    }"
                                    >Inicio</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/trabajos"
                                    class="text-base py-3 px-4 flex"
                                    :class="{
                                        'text-indigo-500':
                                            $page.url === '/trabajos',
                                    }"
                                    >Trabajos</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/talentos"
                                    class="text-base py-2 px-4 flex"
                                    :class="{
                                        'text-indigo-500':
                                            $page.url === '/talentos',
                                    }"
                                    >Talentos</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/alertas"
                                    class="text-base py-2 px-4 flex"
                                    :class="{
                                        'text-indigo-500':
                                            $page.url === '/alertas',
                                    }"
                                    >Alertas</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/salarios"
                                    class="text-base py-2 px-4 flex"
                                    :class="{
                                        'text-indigo-500':
                                            $page.url === '/salarios',
                                    }"
                                    >Salarios</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/salarios"
                                    class="text-base py-2 px-4 flex"
                                    :class="{
                                        'text-indigo-500':
                                            $page.url === '/salarios',
                                    }"
                                    >Inicia sesión</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/salarios"
                                    class="text-base py-2 px-4 flex"
                                    :class="{
                                        'text-indigo-500':
                                            $page.url === '/salarios',
                                    }"
                                    >Registrate</Link
                                >
                            </li>
                        </ul>
                        <div class="w-full px-6 py-3 text-center">
                            <Link
                                class="block bg-gray-100 w-full py-3 px-4 rounded-md text-gray-700 hover:bg-gray-200 transition duration-200 ease-in-out font-semibold"
                                href="#"
                            >
                                Contrata talento
                            </Link>
                        </div>
                    </div>
                </div>
                <div class="text-xl font-bold hidden md:block">
                    <Link href="/" class="">
                        <span
                            class="font-bold text-transparent text-xl bg-clip-text bg-gradient-to-r from-indigo-400 to-blue-600"
                        >
                            midiauno.com
                        </span>
                    </Link>
                </div>
                <div class="flex-row gap-8 text-sm font-medium hidden md:flex">
                    <Link
                        href="/"
                        :class="{ 'text-indigo-500': $page.url === '/' }"
                        >Inicio</Link
                    >
                    <Link
                        href="/trabajos"
                        :class="{
                            'text-indigo-500': $page.url === '/trabajos',
                        }"
                        >Trabajos</Link
                    >
                    <Link href="#">Talentos</Link>
                    <Link href="#">Alertas</Link>
                    <Link href="#">Salarios</Link>
                </div>
                <div
                    class="hidden md:flex flex-row gap-4 text-sm items-center font-medium"
                >
                    <Link
                        class="bg-gray-100 rounded-md text-gray-700 px-4 py-2 hover:bg-gray-200 transition duration-200 ease-in-out font-semibold"
                        href="#"
                        >Contrata talento</Link
                    >
                    <Link
                        class="bg-indigo-600 rounded-md text-white px-4 py-2 hover:bg-indigo-700 transition duration-200 ease-in-out font-semibold"
                        href="#"
                        >Inicia sesión</Link
                    >
                    <Link
                        class="px-4 py-2 rounded-md text-gray-700 hover:text-gray-500 transition-all duration-300 ease-in-out font-semibold"
                        href="#"
                        >Registrate</Link
                    >
                </div>
            </nav>
        </div>
    </header>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

const isMenuOpen = ref(false);
const isTransparent = ref(false);

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
});

const handleScroll = () => {
    const scrollPosition =
        window.pageYOffset || document.documentElement.scrollTop;
    const threshold = 100; // Ajusta este valor según tus necesidades

    isTransparent.value = scrollPosition > threshold;
};
</script>

<style scoped>
header {
    /* backdrop-filter: none;  Para desactivar el desenfoque en navegadores que no lo admiten */
    transition: background-color 0.5s ease-in-out,
        backdrop-filter 0.3s ease-in-out;
}
</style>
