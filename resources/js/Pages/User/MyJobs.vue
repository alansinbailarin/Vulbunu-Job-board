<template>
    <div>
        <Head title="Mis empleos publicados"> </Head>
    </div>
    <div class="container my-1 p-4 mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 md:gap-4 gap-2 my-4">
            <div
                class="rounded-md bg-gradient-to-r from-green-500 to-green-700 text-white p-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-semibold">Total</h1>
                    </div>
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            fill="currentColor"
                            class="bi bi-globe2"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-green-100 text-sm">
                    Total count of your published jobs
                </p>
                <div class="mt-2 flex items-center gap-4">
                    <div>
                        <p class="text-3xl">{{ totalJobsCount }}</p>
                    </div>
                    <!-- <div v-if="percentajeTotal > 0.0">
                        <p class="text-2xl font-extralight text-green-400">
                            {{ percentajeTotal.toFixed(1) }} %
                        </p>
                    </div>
                    <div v-else-if="percentajeTotal < 0.0">
                        <p class="text-2xl font-extralight text-red-400">
                            {{ percentajeTotal.toFixed(1) }} %
                        </p>
                    </div> -->
                </div>
            </div>
            <div
                class="rounded-md bg-gradient-to-r from-gray-500 to-gray-700 text-white p-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-semibold">Draft</h1>
                    </div>
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            fill="currentColor"
                            class="bi bi-question-circle"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                            <path
                                d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-gray-100 text-sm">Count of your draft jobs</p>
                <div class="mt-2 flex items-center gap-4">
                    <div>
                        <p class="text-3xl">{{ draftJobsCount }}</p>
                    </div>
                    <div v-if="percentajeDraft > 0.0">
                        <p class="text-2xl font-extralight text-green-400">
                            {{ percentajeDraft.toFixed(1) }} %
                        </p>
                    </div>
                    <div v-else-if="percentajeDraft < 0.0">
                        <p class="text-2xl font-extralight text-red-400">
                            {{ percentajeDraft.toFixed(1) }} %
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="rounded-md bg-gradient-to-r from-blue-500 to-blue-700 text-white p-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-semibold">Published</h1>
                    </div>
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            fill="currentColor"
                            class="bi bi-check-circle"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                            <path
                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-blue-100 text-sm">
                    Count of your published jobs
                </p>
                <div class="mt-2 flex items-center gap-4">
                    <div>
                        <p class="text-3xl">{{ publishedJobsCount }}</p>
                    </div>
                    <div v-if="percentajePublished > 0.0">
                        <p class="text-2xl font-extralight text-green-400">
                            {{ percentajePublished.toFixed(1) }} %
                        </p>
                    </div>
                    <div v-else-if="percentajePublished < 0.0">
                        <p class="text-2xl font-extralight text-red-400">
                            {{ percentajePublished.toFixed(1) }} %
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="rounded-md bg-gradient-to-r from-orange-500 to-orange-700 text-white p-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-semibold">Archived</h1>
                    </div>
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            fill="currentColor"
                            class="bi bi-box-seam"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-orange-100 text-sm">
                    Count of your archived jobs
                </p>
                <div class="mt-2 flex items-center gap-4">
                    <div>
                        <p class="text-3xl">{{ archivedJobsCount }}</p>
                    </div>
                    <div v-if="percentajeArchived > 0.0">
                        <p class="text-2xl font-extralight text-green-400">
                            {{ percentajeArchived.toFixed(1) }} %
                        </p>
                    </div>
                    <div v-else-if="percentajeArchived < 0.0">
                        <p class="text-2xl font-extralight text-red-400">
                            {{ percentajeArchived.toFixed(1) }} %
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid md:grid-cols-3 grid-cols-1 md:gap-4">
            <Box v-for="job in jobs" :key="job.id">
                <div class="flex items-center justify-between text-sm">
                    <div>
                        <a
                            :href="`/my-published-jobs/${job.slug}`"
                            :style="jobTitleColorIfFeatured(job)"
                            class="font-medium"
                            >{{ job.title }}</a
                        >
                    </div>
                    <div>
                        <span :class="getStatusColor(job.status)">{{
                            changeStatusText(job.status)
                        }}</span>
                    </div>
                </div>
                <p class="text-xs mt-2 font-light text-gray-500">
                    {{
                        job.description.trim().length > 80
                            ? job.description.trim().slice(0, 80) + "..."
                            : job.description.trim()
                    }}
                </p>
                <div>
                    <p class="text-xs text-gray-500 mt-2">
                        Publicado el
                        {{
                            moment(job?.created_at).format(
                                "D [de] MMMM [del] YYYY"
                            )
                        }}
                    </p>
                </div>
            </Box>
        </div>
    </div>
</template>
<script setup>
import { Head } from "@inertiajs/vue3";
import Box from "@/UI/Box.vue";
import { ref } from "vue";
import moment from "moment";
import "moment/dist/locale/es";
import Chart from "./components/Chart.vue";

moment.locale("es");

const props = defineProps({
    jobs: Array,
    totalJobsCount: Number,
    draftJobsCount: Number,
    archivedJobsCount: Number,
    percentajeDraft: Number,
    publishedJobsCount: Number,
    percentajePublished: Number,
    percentajeArchived: Number,
});

const getStatusColor = (status) => {
    if (status === "draft") {
        return "bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded";
    } else if (status === "published") {
        return "bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded";
    } else if (status === "archived") {
        return "bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded";
    }
};

const changeStatusText = (status) => {
    if (status === "draft") {
        return "Draft";
    } else if (status === "published") {
        return "Published";
    } else if (status === "archived") {
        return "Archived";
    }
};

const jobTitleColorIfFeatured = (job) => {
    if (job.featured === 1) {
        return `color: ${job.color};`;
    }
};
</script>
<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
