<template>
    <div>
        <Head :title="`Vulbunu - Browse over ${count} job(s) for you`">
            <meta
                name="description"
                content="If you are looking for your first job, Vulbunu should be one of your first options, find the best job for you by searching our list of jobs."
            />
            <meta
                property="og:title"
                :content="`Vulbunu - Browse over ${count} job(s) for you`"
            />
            <meta
                property="og:description"
                content="If you are looking for your first job, Vulbunu should be one of your first options, find the best job for you by searching our list of jobs."
            />
            <meta
                property="og:image"
                content="https://i.postimg.cc/nrkkj9HX/imgprom.jpg"
            />
            <meta
                name="twitter:title"
                :content="`Vulbunu - Browse over ${count} job(s) for you`"
            />
            <meta
                name="twitter:description"
                content="If you are looking for your first job, Vulbunu should be one of your first options, find the best job for you by searching our list of jobs."
            />
            <meta
                name="twitter:image"
                content="https://i.postimg.cc/nrkkj9HX/imgprom.jpg"
            />
        </Head>
    </div>
    <div class="container mx-auto px-4 mt-4">
        <div class="bg-gradient-to-r to-gray-800 from-blue-950 p-6 rounded-md">
            <div class="md:grid grid-cols-3 gap-4 items-center">
                <div class="col-span-2">
                    <h1
                        class="text-white text-2xl md:text-4xl lg:text-5xl font-bold"
                    >
                        Find your first job
                    </h1>
                    <p
                        class="text-sm md:text-base lg:text-lg text-gray-200 mt-4"
                    >
                        Search through our list of job postings published daily,
                        and find the one that suits you best
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
            :jobs="jobs.data"
            :categories="categories"
            :jobModalities="jobModalities"
            :workdays="workdays"
            :filters="filters"
        />
        <div class="md:grid grid-cols-3 gap-4 mt-4">
            <div class="col-span-3">
                <div class="md:grid grid-cols-3 gap-3">
                    <Box
                        :style="isJobFeatured(job)"
                        v-if="jobs && jobs.data.length"
                        class="mb-4"
                        v-for="job in jobs.data"
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
                        <h1 class="text-2xl font-bold">We're sorry</h1>
                        <p class="text-gray-500">
                            No results found for your search
                        </p>
                    </div>
                </div>
                <div
                    v-if="jobs.data.length"
                    class="w-full flex justify-center my-8"
                >
                    <Pagination :links="jobs.links" />
                </div>
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
import { Head } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    jobs: { type: [Array, Object] },
    categories: { type: Array },
    jobModalities: { type: Array },
    workdays: { type: Array },
    filters: { type: Object },
    count: { type: Number },
});

const isJobFeatured = computed(function () {
    return (job) => {
        return job.featured === 1 ? `border: 1px dashed ${job.color};` : "";
    };
});
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
