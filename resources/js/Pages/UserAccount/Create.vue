<template>
    <div class="min-h-screen bg-gray-200 grid md:grid-cols-5">
        <div
            class="hidden md:flex col-span-3 bg-blue-600 items-center justify-center shadow-inner"
        >
            <div class="container mx-auto p-4 text-white">
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
            <div class="container mx-auto p-8 md:p-16 text-center">
                <div class="mb-12">
                    <h2 class="text-2xl font-bold mb-2">Registrate</h2>
                    <p class="text-gray-400">
                        Ya tienes una cuenta?
                        <Link href="/login" class="text-blue-400 font-semibold"
                            >Inicia sesión</Link
                        >
                    </p>
                </div>
                <div class="mb-7 flex text-sm font-semibold text-gray-600">
                    <a
                        class="bg-white flex items-center gap-2 rounded-md border border-gray-300 px-4 py-2 mb-3"
                        href="/auth/google/redirect"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="14"
                            height="14"
                            fill="currentColor"
                            class="bi bi-google text-blue-500"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"
                            />
                        </svg>
                        Crear cuenta con google</a
                    >
                </div>
                <form
                    @submit.prevent="register"
                    class="md:grid grid-cols-2 gap-3"
                >
                    <div class="mb-4">
                        <label
                            for="email"
                            class="block mb-2 text-sm font-medium text-left"
                            >Nombre</label
                        >
                        <input
                            type="text"
                            id="name"
                            name="name"
                            v-model="form.name"
                            class="w-full px-5 py-2.5 bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-indigo-500 text-gray-600"
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
                            for="email"
                            class="block mb-2 text-sm font-medium text-left"
                            >Apellido</label
                        >
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            v-model="form.last_name"
                            class="w-full px-5 py-2.5 bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-indigo-500 text-gray-600"
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
                            >Correo Electrónico</label
                        >
                        <input
                            type="email"
                            id="email"
                            name="email"
                            v-model="form.email"
                            class="w-full px-5 py-2.5 bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-indigo-500 text-gray-600"
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
                            >Contraseña</label
                        >
                        <input
                            type="password"
                            id="password"
                            name="password"
                            v-model="form.password"
                            class="w-full px-5 py-2.5 bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-indigo-500 text-gray-600"
                        />
                    </div>
                    <div class="mb-4 md:mb-0">
                        <label
                            for="password"
                            class="block mb-2 text-sm font-medium text-left"
                            >Confirma tu contraseña</label
                        >
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            v-model="form.password_confirmation"
                            class="w-full px-5 py-2.5 bg-gray-100 rounded-lg border-none focus:ring-2 focus:ring-indigo-500 text-gray-600"
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
                            class="w-full px-4 py-3 bg-blue-400 text-white font-semibold rounded-lg hover:bg-blue-500 transition-all duration-300 ease-in-out"
                        >
                            Crear cuenta
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
