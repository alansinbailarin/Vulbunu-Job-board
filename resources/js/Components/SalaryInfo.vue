<template>
    <div class="text-center my-8 px-4">
        <h1 class="text-2xl md:text-5xl font-bold mb-3">
            Discover the
            <span class="text-blue-500">salary</span> of your dream job
        </h1>
        <span class="text-gray-500">
            With just a few clicks, you can obtain salary information for
            various professions
        </span>

        <div>
            <img
                src="../../img/salaries.png"
                alt=""
                class="mx-auto w-96 md:w-[40rem] my-8"
            />
        </div>
        <div class="">
            <button 
                class="bg-blue-500 text-white py-3 px-6 rounded-md font-medium"
            >
                Post your salary anonymously
            </button>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
