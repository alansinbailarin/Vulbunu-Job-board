<template>
    <div class="min-h-screen bg-gray-200 grid md:grid-cols-5">
        <div
            class="hidden md:flex col-span-3 bg-blue-600 items-center justify-center shadow-inner"
        >
            <div class="container mx-auto p-16 text-white">
                <h1 class="text-2xl mb-3">miempleo.lat</h1>
                <h1 class="text-6xl font-bold mb-4">
                    Bienvenidos aplicantes y reclutadores
                </h1>
                <p class="text-blue-100">
                    La manera mas fácil de conseguir tu primer empleo es con una
                    plataforma totalmente personalizada para perfiles de
                    personas recien egresadas o perfiles "Jr", si te
                    caracterizas con esto, este lugar es el correcto para ti.
                </p>
            </div>
        </div>
        <div class="md:col-span-2 flex items-center justify-center bg-white">
            <div class="container mx-auto p-16 text-center">
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

const form = useForm({
    email: null,
    password: null,
});

const login = () => {
    form.post(route("login.store"));
};
</script>
