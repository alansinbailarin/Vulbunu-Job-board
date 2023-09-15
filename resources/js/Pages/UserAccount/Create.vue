<template>
    <Head title="Vulbunu - Registro">
        <meta
            name="description"
            content="Únete a la comunidad de Premlat y comienza a explorar oportunidades laborales. Regístrate para acceder a una amplia gama de trabajos y conectarte con empresas en búsqueda de talento como tú."
        />
    </Head>

    <div class="min-h-screen bg-white grid md:grid-cols-5">
        <div class="hidden m-5 md:flex col-span-3">
            <div class="w-full bg-gray-100 rounded-lg">
                <div class="ml-6 mt-4">
                    <Link
                        href="/"
                        class="tracking-widest text-blue-500 font-bold"
                    >
                        Vulbunu
                    </Link>
                </div>

                <div class="p-6">
                    <div class="mt-16 mb-6">
                        <h1
                            class="text-5xl text-gray-700 font-semibold tracking-wider"
                        >
                            You are just a few steps away from starting your new
                            job search, don't miss out!
                        </h1>
                    </div>
                    <div class="mb-8">
                        <p class="text-lg text-gray-600 font-light">
                            Obstacles are those frightful things you see when
                            you take your eyes off your goals.
                        </p>
                        <p class="mt-3 text-sm">- Henry Ford</p>
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
                                class="bg-gray-200 hover:cursor-pointer p-5 rounded-md"
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
                                        <h1 class="text-gray-700 font-bold">
                                            {{ opinion.user }}
                                        </h1>
                                        <p class="text-gray-500 text-sm">
                                            {{ opinion.username }}
                                        </p>
                                        <p>{{ opinion.comment }}</p>
                                    </div>
                                </div>
                            </swiper-slide>
                        </swiper>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="md:col-span-2 flex mt-5 md:mt-0 md:items-center justify-center bg-white"
        >
            <div class="container mx-auto p-6 text-center">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold mb-4 text-gray-800">
                        Sign Up
                    </h2>

                    <p class="text-gray-400 text-sm">With your social media</p>
                </div>
                <div class="mb-7 gap-2">
                    <a
                        href="/auth/google/redirect"
                        class="flex items-center justify-center hover:bg-blue-600 transition-all md:text-sm duration-300 ease-in-out font-semibold bg-blue-500 flex-none px-3 py-3 md:px-4 rounded-md text-white border-gray-300 relative"
                    >
                        <span class="absolute left-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="15"
                                height="15"
                                fill="currentColor"
                                class="bi bi-google"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"
                                />
                            </svg>
                        </span>
                        <span>Log In with Google</span>
                    </a>
                </div>
                <div class="mb-4">
                    <p class="text-gray-400 text-sm">Or with your email</p>
                </div>
                <form @submit.prevent="register" class="grid grid-cols-2 gap-3">
                    <div class="mb-4">
                        <label
                            for="name"
                            class="block mb-2 text-sm font-medium text-left"
                            >Name</label
                        >
                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Miguel"
                            v-model="form.name"
                            class="w-full px-5 py-2.5 placeholder:text-gray-400 bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-indigo-500 text-gray-600"
                        />
                        <div
                            v-if="form.errors.name"
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
                                    <p class="text-sm text-red-700 text-left">
                                        {{ form.errors.name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label
                            for="last_name"
                            class="block mb-2 text-sm font-medium text-left"
                            >Last name</label
                        >
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            placeholder="Martinez"
                            v-model="form.last_name"
                            class="w-full px-5 py-2.5 placeholder:text-gray-400 bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-indigo-500 text-gray-600"
                        />
                        <div
                            v-if="form.errors.last_name"
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
                                    <p class="text-sm text-red-700 text-left">
                                        {{ form.errors.last_name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 col-span-2">
                        <label
                            for="email"
                            class="block mb-2 text-sm font-medium text-left"
                            >Email</label
                        >
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="example@example.com"
                            v-model="form.email"
                            class="w-full px-5 py-2.5 placeholder:text-gray-400 bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-indigo-500 text-gray-600"
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
                                    <p class="text-sm text-red-700 text-left">
                                        {{ form.errors.email }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 md:mb-0">
                        <label
                            for="password"
                            class="block mb-2 text-sm font-medium text-left"
                            >Password</label
                        >
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••••••"
                            v-model="form.password"
                            class="w-full px-5 py-2.5 placeholder:text-gray-400 bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-indigo-500 text-gray-600"
                        />
                    </div>
                    <div class="mb-4 md:mb-0">
                        <label
                            for="password"
                            class="block mb-2 text-sm font-medium text-left"
                            >Confirm password</label
                        >
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="••••••••••••"
                            v-model="form.password_confirmation"
                            class="w-full px-5 py-2.5 placeholder:text-gray-400 bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-indigo-500 text-gray-600"
                        />
                    </div>
                    <div
                        v-if="form.errors.password"
                        class="bg-red-100 px-4 py-2 rounded-md col-span-2"
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
                    <div
                        v-if="form.errors.sessionError"
                        class="bg-yellow-100 px-4 py-2 rounded-md my-2 col-span-2"
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
                    <div class="col-span-2 mt-4">
                        <button
                            type="submit"
                            class="w-full px-4 py-3 bg-indigo-500 text-white font-semibold rounded-lg hover:bg-indigo-600 transition-all duration-300 ease-in-out"
                        >
                            Create account
                        </button>
                    </div>
                </form>
                <div class="mt-6">
                    <p class="text-gray-400 text-sm">
                        Already have an account?
                        <Link href="/login" class="text-indigo-400 font-medium"
                            >Log In</Link
                        >
                    </p>
                </div>
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
import { Head } from "@inertiajs/vue3";

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
    name: null,
    last_name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const register = () => {
    form.post(route("user-account.store"));
};
</script>
