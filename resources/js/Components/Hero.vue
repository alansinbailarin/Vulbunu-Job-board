<template>
    <div class="container p-4 mx-auto">
        <div
            class="grid md:grid-cols-2 my-4 items-center text-center md:text-left md:p-0 mx-auto"
        >
            <div class="block md:hidden mx-auto p-3 text-center">
                <img src="../../img/heroimg.png" alt="" class="" />
            </div>
            <div>
                <span
                    class="bg-indigo-100 py-1.5 px-3 text-sm text-indigo-600 rounded-md"
                    >The right offer for you is here</span
                >
                <h1
                    class="font-bold text-gray-900 text-3xl md:text-4xl mt-3 lg:text-6xl md:mt-3"
                >
                    Job
                    <span
                        class="font-bold text-transparent text-3xl md:text-4xl lg:text-6xl bg-clip-text bg-gradient-to-r from-indigo-400 to-blue-600"
                    >
                        offers
                    </span>
                    for recent graduates, interns, and people seeking their
                    first job
                </h1>

                <p class="text-gray-500 mt-2 mb-8">
                    Find your first job, part-time job, internship, or any other
                    job in general. Here, you'll find the best offers that fit
                    your needs.
                </p>
                <div class="hidden md:flex gap-4">
                    <Link
                        href="/publish-job"
                        class="bg-gray-950 rounded-md text-xs lg:text-base font-medium text-white py-3 px-5 shadow-lg transition-all duration-300 ease-in-out hover:bg-gray-800"
                        >Post a job for free
                    </Link>
                    <Link
                        href="/talents"
                        class="font-medium text-xs rounded-md lg:text-base text-gray-700 py-3 px-5 border-2 border-gray-600 transition-all duration-300 ease-in-out"
                        >Hire talent</Link
                    >
                </div>
                <div class="block md:hidden">
                    <div class="mb-8">
                        <Link
                            href="/publish-job"
                            class="bg-gray-950 rounded-md text-sm lg:text-base font-medium text-white py-3 px-8 shadow-lg transition-all duration-300 ease-in-out hover:bg-gray-800"
                            >Post a job for free
                        </Link>
                    </div>
                    <div>
                        <Link
                            href="/talents"
                            class="font-medium text-sm w-full rounded-md lg:text-base text-gray-700 py-3 px-8 border-2 border-gray-600 transition-all duration-300 ease-in-out"
                            >Hire talent</Link
                        >
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto">
                <img src="../../img/heroimg.png" alt="" class="" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
