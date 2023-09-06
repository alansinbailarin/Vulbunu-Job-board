<template>
    <div class="text-center my-8 px-4">
        <h1 class="text-2xl md:text-5xl font-bold mb-3">
            Descubre el
            <span class="text-indigo-500">salario</span> del trabajo de tus
            sueños
        </h1>
        <span class="text-gray-500">
            Con unos pocos clicks, puedes obtener información del salario que
            ganan las diferentes profesiones.
        </span>

        <div>
            <img
                src="../../img/salaries.png"
                alt=""
                class="mx-auto w-96 md:w-[40rem] my-8"
            />
        </div>
        <div class="">
            <Link
                class="bg-indigo-500 text-white py-3 px-6 rounded-md font-medium"
                href="#"
            >
                Publica tu salario anónimamente
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
