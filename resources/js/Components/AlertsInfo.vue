<template>
    <div class="mx-auto px-4 md:px-12 my-12 flex justify-center items-center">
        <div
            class="container p-4 md:p-7 lg:p-12 rounded-xl bg-gray-900 grid grid-cols-1"
        >
            <div class="col-span-2 text-center md:text-left">
                <span
                    class="text-indigo-400 font-medium uppercase text-sm md:text-base"
                >
                    We know that your time matters
                </span>
                <h1
                    class="text-white font-semibold mt-1 text-2xl md:text-4xl lg:text-6xl"
                >
                    Stay informed about new jobs posted daily
                </h1>
                <p class="text-gray-400 mt-2 text-sm md:text-lg mb-6">
                    <a href="/" class="text-gray-200">Vulbunu</a>
                    offers you the best jobs published daily just a click away,
                    stay informed by signing up for our database of candidates
                    who want to receive daily alerts.
                </p>
                <form name="subscribeToAlerts" @submit.prevent="publish">
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-5 h-5 text-gray-500"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                ></path>
                            </svg>
                        </div>
                        <input
                            type="email"
                            id="email"
                            v-model="form.email"
                            class="block w-full p-4 pl-10 text-sm text-gray-300 rounded-lg bg-gray-700 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="example@example.com"
                            required
                        />
                        <button
                            type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2"
                        >
                            Subscribe
                        </button>
                    </div>
                    <div v-if="form.errors.email" class="mt-2">
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-500 text-left">
                                    {{ form.errors.email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const form = useForm({
    email: "",
});

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

const publish = () => {
    form.post(route("index.store"), {
        preserveScroll: true,
        onSuccess: () => {
            Toast.fire({
                icon: "success",
                title: "¡Te has suscrito a las alertas de empleo!",
            });
            form.reset();
        },
    });
};
</script>
