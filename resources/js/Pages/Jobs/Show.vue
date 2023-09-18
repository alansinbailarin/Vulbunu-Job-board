<template>
    <div>
        <Head :title="`${job.title}`"> </Head>
    </div>
    <div class="container mx-auto">
        <div class="flex items-center justify-between px-4 pt-4">
            <div class="flex items-center">
                <img
                    v-if="job.img_path"
                    :src="`https://primerempleolat.s3.us-east-2.amazonaws.com/${job.img_path}`"
                    alt=""
                    class="w-20 lg:w-24 rounded-md h-14 lg:h-16 object-cover"
                />
                <img
                    v-else
                    src="../../../img/no-image.jpeg"
                    alt=""
                    class="w-20 lg:w-24 rounded-md h-14 lg:h-16 object-cover"
                />
                <div class="ml-4">
                    <div v-if="job.featured" class="items-center">
                        <div>
                            <span
                                :style="`color: ${job.color};`"
                                :class="[
                                    'font-medium text-lg md:text-2xl lg:text-3xl flex items-center gap-1',
                                ]"
                            >
                                {{ job.title }}
                            </span>
                        </div>
                        <div>
                            <Link
                                :href="`/talents/${job.user.slug}`"
                                class="text-gray-500 text-sm md:text-base lg:text-lg flex items-center gap-1"
                            >
                                {{ job.user.name }} {{ job.user.last_name }}
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="14"
                                    height="14"
                                    fill="currentColor"
                                    class="bi bi-patch-check-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"
                                    />
                                </svg>
                            </Link>
                        </div>
                    </div>
                    <div v-else>
                        <h1 class="font-medium text-lg md:text-2xl lg:text-3xl">
                            {{ job.title }}
                        </h1>
                        <Link
                            :href="`/talents/${job.user.slug}`"
                            class="text-gray-500 text-sm md:text-base lg:text-lg flex items-center gap-1"
                        >
                            {{ job.user.name }} {{ job.user.last_name }}
                        </Link>
                    </div>
                </div>
            </div>
            <div class="gap-2 hidden md:flex items-center">
                <div>
                    <a
                        :href="`${job.apply_on}`"
                        target="_blank"
                        class="border border-indigo-500 rounded-md text-indigo-500 transition-all duration-300 ease-in-out px-4 py-2"
                        >Apply in the page</a
                    >
                </div>
                <div>
                    <button
                        @click="shareProfile(props.job.id)"
                        target="_blank"
                        class="bg-indigo-500 text-white py-2 px-4 rounded-md transition-all duration-300 ease-in-out hover:bg-indigo-600"
                    >
                        Quick application
                    </button>
                </div>
            </div>
        </div>

        <div
            class="mt-4 text-xs flex items-center gap-2 px-4 overflow-x-scroll flex-wrap"
        >
            <span
                class="text-indigo-600 bg-indigo-100 px-1 py-0.5 rounded-md"
                >{{ job.category.title }}</span
            >

            <span class="text-blue-600 bg-blue-100 px-1 py-0.5 rounded-md">{{
                job.jobmodality.title
            }}</span>
            <span
                class="text-orange-600 bg-orange-100 px-1 py-0.5 rounded-md"
                >{{ job.workday.title }}</span
            >
            <span class="text-green-600 bg-green-100 px-1 py-0.5 rounded-md">
                {{ job.state.name }} {{ job.city?.name }},
                {{ job.country.name }}</span
            >
        </div>
        <div class="px-4 mt-2">
            <time class="text-gray-500 text-sm"
                >Published {{ moment(job.created_at).fromNow() }}</time
            >
        </div>
        <div class="mt-2 text-sm px-4">
            <div class="flex items-center gap-2">
                <div v-if="job.priority.title == 'Alta'">
                    <p class="text-red-500">
                        {{ job.priority.title }} priority
                    </p>
                </div>
                <div v-else-if="job.priority.title == 'Media'">
                    <p class="text-orange-500">
                        {{ job.priority.title }} priority
                    </p>
                </div>
                <div v-else-if="job.priority.title == 'Baja'">
                    <p class="text-green-500">
                        {{ job.priority.title }} priority
                    </p>
                </div>
                <p class="text-gray-500">-</p>
                <div class="text-gray-500">
                    Viewed by
                    <span class="font-medium text-gray-700">{{ visits }}</span>
                </div>
            </div>
        </div>
        <div class="mt-2 px-4">
            <div
                v-if="job.salary?.show"
                class="flex items-center gap-1 text-sm font-medium text-gray-500 lowercase"
            >
                <p>{{ job.salary?.currency.symbol }}{{ formattedMinSalary }}</p>
                <span> - </span>
                <p>{{ job.salary?.currency.symbol }}{{ formattedMaxSalary }}</p>

                <p>{{ job.salary?.periodicity.title }}</p>
            </div>
            <div v-else>
                <p class="text-gray-500 text-sm font-medium">
                    Salary not disclosed by the company
                </p>
            </div>
        </div>
        <div class="flex flex-wrap gap-2 items-center mt-3 px-4">
            <p
                class="bg-gray-200 py-0.5 px-2 text-xs text-gray-600 mr-2 rounded-md"
                v-for="tag in job.tag"
                :key="tag.id"
            >
                {{ tag.name }}
            </p>
        </div>

        <div class="mt-6 px-4">
            <h1 class="text-gray-900 text-sm md:text-base font-bold">
                About the company
            </h1>
            <p class="text-gray-600 text-sm md:text-base">
                {{ job.extra_info }}
            </p>
            <h1 class="text-gray-900 text-sm md:text-base font-bold mt-2">
                Job description
            </h1>
            <p class="text-gray-600 text-sm md:text-base">
                {{ job.description }}
            </p>
            <div v-if="job.requirement && job.requirement.length > 0">
                <h1 class="text-gray-900 text-sm md:text-base font-bold mt-4">
                    Requirements
                </h1>
                <ul class="">
                    <li
                        class="text-sm md:text-base mt-1"
                        v-for="requirement in job.requirement"
                    >
                        <div
                            class="text-gray-700"
                            v-html="requirement.description"
                        ></div>
                    </li>
                </ul>
            </div>
            <div v-if="job.responsability && job.responsability.length > 0">
                <h1 class="text-gray-900 text-sm md:text-base font-bold mt-4">
                    Responsabilities
                </h1>
                <ul class="">
                    <li
                        class="text-sm md:text-base mt-1"
                        v-for="responsability in job.responsability"
                    >
                        <div
                            class="text-gray-700"
                            v-html="responsability.description"
                        ></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex md:hidden items-center gap-3 mt-5 px-4">
            <button
                @click="shareProfile(props.job.id)"
                target="_blank"
                class="block bg-indigo-500 p-2 w-full rounded-md text-white text-center transition-all duration-300 ease-in-out hover:bg-indigo-600"
            >
                Quick apply
            </button>
        </div>
        <div class="flex md:hidden items-center text-center mx-4 mt-3">
            <a
                :href="`${job.apply_on}`"
                target="_blank"
                class="w-full border border-indigo-500 rounded-md py-2 text-indigo-500 transition-all duration-300 ease-in-out"
                >Apply in the page</a
            >
        </div>
        <div v-if="similares.length > 0" class="mt-6 px-4">
            <h1
                class="text-gray-800 text-lg font-semibold mb-4 text-center md:text-left"
            >
                You might be interested in
            </h1>
            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1 md:gap-4 container mx-auto"
            >
                <Box
                    :style="isJobFeatured(similar)"
                    v-for="similar in similares"
                    :key="similar.id"
                >
                    <Link :href="`/jobs/${similar.slug}`">
                        <JobPublishedBy :job="similar" />
                        <JobAditionals :job="similar" />
                        <JobInfo :job="similar" />
                        <Salary :job="similar" />
                        <Tags :job="similar"
                    /></Link>
                </Box>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, Head, router } from "@inertiajs/vue3";
import JobInfo from "../../Components/JobInfo.vue";
import Box from "@/UI/Box.vue";
import JobPublishedBy from "@/UI/JobPublishedBy.vue";
import Tags from "@/UI/Tags.vue";
import JobAditionals from "@/Components/JobAditionals.vue";
import Salary from "@/Components/Salary.vue";
import { computed } from "vue";
import moment from "moment";

moment.locale("en");

const props = defineProps({
    job: { type: Object },
    similares: { type: Array },
    authUser: { type: Object },
});

const visits = computed(() =>
    props.job.clicks.toLocaleString({
        style: "currency",
        currency: "USD",
        maximumFractionDigits: 2,
    })
);

const formattedMinSalary = computed(() =>
    (props.job.salary?.min).toLocaleString({
        style: "currency",
        currency: "USD",
        maximumFractionDigits: 2,
    })
);

const formattedMaxSalary = computed(() =>
    (props.job.salary?.max).toLocaleString({
        style: "currency",
        currency: "USD",
        maximumFractionDigits: 2,
    })
);

const isJobFeatured = computed(function () {
    return (job) => {
        return job.featured === 1 ? `border: 1px dashed ${job.color};` : "";
    };
});

const shareProfile = (job_id) => {
    router.post(route("share-profile", { job_id: job_id }), {
        preserveScroll: true,
    });
};
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
