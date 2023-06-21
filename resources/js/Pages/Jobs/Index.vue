<template>
    <div class="container mx-auto px-4 mt-4">
        <div
            class="bg-gradient-to-r to-gray-800 from-indigo-950 p-6 rounded-md"
        >
            <div class="md:grid grid-cols-3 gap-4 items-center">
                <div class="col-span-2">
                    <h1
                        class="text-white text-2xl md:text-4xl lg:text-5xl font-bold"
                    >
                        Encuentra tu primer empleo
                    </h1>
                    <p
                        class="text-sm md:text-base lg:text-lg text-gray-200 mt-4"
                    >
                        Busca en nuestra basta lista de empleos publicados
                        diariamente, encuentra el que mejor se adapte a ti.
                    </p>
                </div>
                <div class="col-span-1 hidden md:block">
                    <img
                        class="w-56 mx-auto"
                        src="../../../img/jobmen.png"
                        alt=""
                    />
                </div>
            </div>
        </div>
        <Filters
            :jobs="jobs"
            :categories="categories"
            :jobModalities="jobModalities"
            :workdays="workdays"
            :filters="filters"
        />
        <div class="md:grid grid-cols-3 gap-4 mt-4">
            <div class="col-span-3">
                <div class="md:grid grid-cols-3 gap-3">
                    <Box
                        v-if="jobs && jobs.length"
                        class="mb-4"
                        v-for="job in jobs"
                        :key="job.id"
                    >
                        <Link :href="`/jobs/${job.slug}`">
                            <JobPublishedBy :job="job" /><JobAditionals
                                :job="job" />
                            <JobInfo :job="job" />
                            <Salary :job="job" />
                            <Tags :job="job"
                        /></Link>
                    </Box>
                    <div v-else class="col-span-3 text-center my-12">
                        <h1 class="text-2xl font-bold">En serio lo sentimos</h1>
                        <p class="text-gray-500">
                            No se encontro ningun resultado con los parametros
                            deseados.
                        </p>
                    </div>
                </div>
                <!-- <div
                    v-if="jobs.data.length"
                    class="w-full flex justify-center my-8"
                >
                    <Pagination :links="jobs.links" />
                </div> -->
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import JobInfo from "../../Components/JobInfo.vue";
import Box from "@/UI/Box.vue";
import JobPublishedBy from "@/UI/JobPublishedBy.vue";
import Tags from "@/UI/Tags.vue";
import JobAditionals from "@/Components/JobAditionals.vue";
import Salary from "@/Components/Salary.vue";
import Filters from "./Components/Filters.vue";
import Pagination from "../../UI/Pagination.vue";

const props = defineProps({
    jobs: { type: [Array, Object] },
    categories: { type: Array },
    jobModalities: { type: Array },
    workdays: { type: Array },
    filters: { type: Object },
});
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
