<template>
    <div class="min-h-screen bg-white grid md:grid-cols-5">
        <div class="hidden m-5 md:flex col-span-3">
            <div class="w-full bg-blue-500 rounded-lg">
                <div class="ml-6 mt-4">
                    <h1 class="tracking-widest text-gray-100 font-bold">
                        Primer empleo latam
                    </h1>
                </div>

                <div class="p-6">
                    <div class="mt-16 mb-6">
                        <h1
                            class="text-5xl text-white font-semibold tracking-wider"
                        >
                            Te ayudamos a encontrar el empleo de tus sueños, o
                            si estas buscando personal, a encontrarlo.
                        </h1>
                    </div>
                    <div class="mb-8">
                        <p class="text-xl text-gray-200 font-light">
                            Con nuestros algoritmos inteligentes, te ayudamos a
                            encontrar el empleo de tus sueños o el empleado
                            ideal para que forme parte de tu empresa.
                        </p>
                    </div>
                    <div class="mt-20">
                        <swiper
                            :spaceBetween="30"
                            :centeredSlides="true"
                            :autoplay="{
                                delay: 2500,
                                disableOnInteraction: false,
                            }"
                            :pagination="{
                                clickable: true,
                            }"
                            :navigation="true"
                            :modules="modules"
                            class="mySwiper"
                        >
                            <swiper-slide
                                v-for="(opinion, index) in opinions"
                                :key="index"
                                class="bg-blue-600 p-5 rounded-md"
                            >
                                <div class="flex items-center gap-3 mb-4">
                                    <figure>
                                        <img
                                            :src="opinion.avatar"
                                            :alt="opinion.user"
                                            class="w-14 rounded-full"
                                        />
                                    </figure>
                                    <div>
                                        <h1 class="text-white font-bold">
                                            {{ opinion.user }}
                                        </h1>
                                        <p class="text-gray-300 text-sm">
                                            {{ opinion.username }}
                                        </p>
                                    </div>
                                </div>
                                <div class="mb-4 text-gray-300">
                                    <p>{{ opinion.comment }}</p>
                                </div>
                            </swiper-slide>
                        </swiper>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-2 flex items-center justify-center bg-white">
            <div class="container mx-auto p-8 text-center">
                <div class="mb-12">
                    <h2 class="text-2xl font-bold mb-2">Inicia Sesión</h2>
                    <p class="text-gray-400">
                        Eres nuevo?
                        <Link
                            href="/user-account/create"
                            class="text-blue-400 font-semibold"
                            >Crea una cuenta</Link
                        >
                    </p>
                </div>
                <form @submit.prevent="login" class="text-left">
                    <div class="mb-4">
                        <label
                            for="email"
                            class="block mb-2 text-sm font-medium"
                            >Correo electrónico</label
                        >
                        <input
                            type="email"
                            id="email"
                            name="email"
                            v-model="form.email"
                            class="w-full px-5 py-2.5 bg-gray-100 rounded-lg border-none focus:ring-0 text-gray-600"
                        />
                        <div
                            v-if="form.errors.email"
                            class="bg-red-100 px-4 py-2 rounded-md mt-2"
                        >
                            <div class="flex items-center gap-2">
                                <div class="text-red-700">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-exclamation-circle-fill"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                                        />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-red-700">
                                        {{ form.errors.email }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 mt-8">
                        <div class="flex items-center justify-between mb-2">
                            <label
                                for="password"
                                class="block text-sm font-medium"
                                >Contraseña</label
                            >
                            <Link
                                href="#"
                                class="text-blue-400 font-semibold text-sm"
                                >Olvidaste tu contraseña?</Link
                            >
                        </div>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            v-model="form.password"
                            class="w-full px-5 py-2.5 bg-gray-100 rounded-lg border-none focus:ring-0 text-gray-600"
                        />
                        <div
                            v-if="form.errors.password"
                            class="bg-red-100 px-4 py-2 rounded-md mt-2"
                        >
                            <div class="flex items-center gap-2">
                                <div class="text-red-700">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-exclamation-circle-fill"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                                        />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-red-700">
                                        {{ form.errors.password }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        v-if="form.errors.sessionError"
                        class="bg-yellow-100 px-4 py-2 rounded-md my-2"
                    >
                        <div class="flex items-center gap-2">
                            <div class="text-yellow-700">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-exclamation-triangle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                    />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-yellow-700">
                                    {{ form.errors.sessionError }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        <button
                            type="submit"
                            class="w-full px-4 py-3 bg-blue-400 text-white font-semibold rounded-lg hover:bg-blue-500 transition-all duration-300 ease-in-out"
                        >
                            Iniciar Sesión
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Autoplay, Pagination, Navigation } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";

const opinions = [
    {
        avatar: "https://randomuser.me/api/portraits/men/1.jpg",
        user: "Juan Velez",
        username: "@jvelez",
        comment:
            "Me encanta la página, encontré muchas ofertas de trabajo interesantes. ¡Gracias!",
    },
    {
        avatar: "https://randomuser.me/api/portraits/women/2.jpg",
        user: "María Gómez",
        username: "@mariag23",
        comment:
            "La página es muy fácil de usar y me ayudó a conseguir mi primer empleo. ¡La recomiendo!",
    },
    {
        avatar: "https://randomuser.me/api/portraits/men/3.jpg",
        user: "Carlos Rodríguez",
        username: "@rodriguezc01",
        comment:
            "Excelente sitio para buscar empleo, las opciones son variadas y actualizadas.",
    },
    {
        avatar: "https://randomuser.me/api/portraits/women/4.jpg",
        user: "Laura Martínez",
        username: "@mtzlau94",
        comment:
            "La interfaz es muy amigable y me resultó útil para encontrar trabajo rápidamente.",
    },
];

const modules = [Autoplay, Pagination, Navigation];

const form = useForm({
    email: null,
    password: null,
});

const login = () => {
    form.post(route("login.store"));
};
</script>
