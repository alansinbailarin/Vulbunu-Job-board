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
                            primer empleo latam
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
                    <Transition
                        ><div
                            v-show="isMenuOpen"
                            class="w-full md:block md:w-auto transition-all duration-500 ease-in-out"
                        >
                            <ul
                                class="flex flex-col md:p-0 mt-2 md:flex-row p-2"
                            >
                                <li>
                                    <Link
                                        href="/"
                                        class="text-base py-3 px-4 flex"
                                        :class="{
                                            'text-indigo-500':
                                                $page.url === '/',
                                        }"
                                        @click="isMenuOpen = false"
                                        >Inicio</Link
                                    >
                                </li>
                                <li>
                                    <Link
                                        href="/jobs"
                                        class="text-base py-3 px-4 flex"
                                        :class="{
                                            'text-indigo-500':
                                                $page.url.includes('/jobs'),
                                        }"
                                        @click="isMenuOpen = false"
                                        >Trabajos</Link
                                    >
                                </li>
                                <li>
                                    <Link
                                        href="/talents"
                                        class="text-base py-2 px-4 flex"
                                        :class="{
                                            'text-indigo-500':
                                                $page.url.includes('/talents'),
                                        }"
                                        @click="isMenuOpen = false"
                                        >Talentos</Link
                                    >
                                </li>
                                <li>
                                    <Link
                                        href="#"
                                        class="text-base py-2 px-4 flex"
                                        :class="{
                                            'text-indigo-500':
                                                $page.url === '/alertas',
                                        }"
                                        @click="isMenuOpen = false"
                                        >Alertas</Link
                                    >
                                </li>
                                <li>
                                    <Link
                                        href="#"
                                        class="text-base py-2 px-4 flex border-b border-gray-100"
                                        :class="{
                                            'text-indigo-500':
                                                $page.url === '/salarios',
                                        }"
                                        @click="isMenuOpen = false"
                                        >Salarios</Link
                                    >
                                </li>
                                <div v-if="user" class="py-2 px-4 text-base">
                                    <p class="text-gray-400 text-sm">
                                        Información del usuario
                                    </p>
                                    <Link
                                        :href="`/talents/${user.slug}`"
                                        class="text-gray-700 font-medium text-sm mt-2"
                                    >
                                        {{ user.name }} {{ user.last_name }}
                                    </Link>
                                    <p
                                        class="text-gray-500 font-medium text-sm mt-2"
                                    >
                                        {{ user.email }}
                                    </p>
                                    <!-- <Link
                                        href="/dashboard"
                                        class="text-gray-700 font-medium text-sm mt-2"
                                        >Administración</Link
                                    > -->
                                    <div class="mt-4 font-normal">
                                        <Link
                                            class="text-sm"
                                            href="/logout"
                                            method="DELETE"
                                            as="button"
                                            >Cerrar sesión</Link
                                        >
                                    </div>
                                </div>
                                <div v-else>
                                    <li>
                                        <Link
                                            href="/login"
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
                                            href="/user-account/create"
                                            class="text-base py-2 px-4 flex"
                                            :class="{
                                                'text-indigo-500':
                                                    $page.url ===
                                                    '/user-account/create',
                                            }"
                                            >Registrate</Link
                                        >
                                    </li>
                                </div>
                            </ul>
                            <div class="w-full px-6 py-3 text-center">
                                <Link
                                    class="block bg-gray-100 w-full py-3 px-4 rounded-md text-gray-700 hover:bg-gray-200 transition duration-200 ease-in-out font-semibold"
                                    href="#"
                                >
                                    Contrata talento
                                </Link>
                            </div>
                        </div></Transition
                    >
                </div>
                <div class="text-xl font-bold hidden md:block">
                    <Link href="/" class="">
                        <span
                            class="font-bold text-transparent text-xl bg-clip-text bg-gradient-to-r from-indigo-400 to-blue-600"
                        >
                            Primer empleo latam
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
                        href="/jobs"
                        :class="{
                            'text-indigo-500': $page.url.includes('/jobs'),
                        }"
                        >Trabajos</Link
                    >
                    <Link
                        href="/talents"
                        :class="{
                            'text-indigo-500': $page.url.includes('/talents'),
                        }"
                        >Talentos</Link
                    >
                    <Link href="#">Alertas</Link>
                    <Link href="#">Salarios</Link>
                </div>
                <div
                    class="hidden md:flex flex-row gap-4 text-sm items-center font-medium"
                >
                    <div v-if="user" class="mr-2">
                        <button
                            @click="showUserMenu = !showUserMenu"
                            class="text-gray-700 flex items-center gap-2 hover:text-gray-600 transition-all ease-in-out duration-500"
                        >
                            {{ user.name }}
                            {{ user.last_name }}
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="13"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-down"
                                :class="{
                                    'transform rotate-180': showUserMenu,
                                }"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
                                />
                            </svg>
                        </button>
                        <Transition v-on-click-outside="closeMenu"
                            ><div
                                v-show="showUserMenu"
                                :class="{
                                    'bg-white': !isTransparent,
                                    'bg-white bg-opacity-80 backdrop-filter backdrop-blur transition-all duration-300 ease-in-out':
                                        isTransparent,
                                }"
                                class="absolute transition-all ease-in-out duration-300 bg-white w-[11rem] py-3 rounded-md shadow-md p-2 mt-2"
                            >
                                <p class="text-gray-400 text-xs mb-1">
                                    Información del usuario
                                </p>
                                <!-- <Link
                                    href="/dashboard"
                                    class="text-gray-700 text-xs"
                                    >Administración</Link
                                > -->
                                <div class="mt-2 font-normal">
                                    <Link
                                        class="text-xs"
                                        href="/logout"
                                        method="DELETE"
                                        as="button"
                                        >Cerrar sesión</Link
                                    >
                                </div>
                            </div></Transition
                        >
                    </div>
                    <Link
                        class="bg-gray-100 rounded-md text-gray-700 px-4 py-2 hover:bg-gray-200 transition duration-200 ease-in-out font-semibold"
                        href="/talents"
                        >Contrata talento</Link
                    >
                    <div v-if="!user">
                        <Link
                            class="bg-indigo-600 rounded-md text-white px-4 py-2 hover:bg-indigo-700 transition duration-200 ease-in-out font-semibold"
                            href="/login"
                            >Inicia sesión</Link
                        >
                        <Link
                            class="px-4 py-2 rounded-md text-gray-700 hover:text-gray-500 transition-all duration-300 ease-in-out font-semibold"
                            href="/user-account/create"
                            >Registrate</Link
                        >
                    </div>
                </div>
            </nav>
        </div>
    </header>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, onMounted, Transition } from "vue";
import { vOnClickOutside } from "@vueuse/components";

const isMenuOpen = ref(false);
const isTransparent = ref(false);
const showUserMenu = ref(false);

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const closeMenu = () => {
    showUserMenu.value = false;
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
});

const handleScroll = () => {
    const scrollPosition =
        window.pageYOffset || document.documentElement.scrollTop;
    const threshold = 50; // Ajusta este valor según tus necesidades

    isTransparent.value = scrollPosition > threshold;
};

const props = defineProps({
    user: Object,
});
</script>

<style scoped>
header {
    /* backdrop-filter: none;  Para desactivar el desenfoque en navegadores que no lo admiten */
    transition: background-color 0.5s ease-in-out,
        backdrop-filter 0.3s ease-in-out;
}

.v-enter-active,
.v-leave-active {
    transition: opacity 0.3s ease-in-out;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
