<template>
    <Head title="Vulbunu - Find the best job offers">
        <meta
            name="description"
            content="Welcome to Vulbunu, your comprehensive platform for discovering the perfect job opportunities. With Vulbunu, you can effortlessly explore a vast array of job listings updated daily, connecting talented individuals with exciting career prospects. Whether you're seeking full-time employment, freelance gigs, or remote positions, our user-friendly interface makes job hunting a breeze. Browse through diverse industries, from tech and finance to creative fields and beyond, and discover your ideal job match today with Vulbunu."
        />
        <meta
            property="og:title"
            content="Vulbunu - Find the best job offers"
        />
        <meta
            property="og:description"
            content="Welcome to Vulbunu, your comprehensive platform for discovering the perfect job opportunities. With Vulbunu, you can effortlessly explore a vast array of job listings updated daily, connecting talented individuals with exciting career prospects. Whether you're seeking full-time employment, freelance gigs, or remote positions, our user-friendly interface makes job hunting a breeze. Browse through diverse industries, from tech and finance to creative fields and beyond, and discover your ideal job match today with Vulbunu."
        />
        <meta
            property="og:image"
            content="https://i.postimg.cc/nrkkj9HX/imgprom.jpg"
        />
        <meta
            name="twitter:title"
            content="Vulbunu - Find the best job offers "
        />
        <meta
            name="twitter:description"
            content="Welcome to Vulbunu, your comprehensive platform for discovering the perfect job opportunities. With Vulbunu, you can effortlessly explore a vast array of job listings updated daily, connecting talented individuals with exciting career prospects. Whether you're seeking full-time employment, freelance gigs, or remote positions, our user-friendly interface makes job hunting a breeze. Browse through diverse industries, from tech and finance to creative fields and beyond, and discover your ideal job match today with Vulbunu."
        />
        <meta
            name="twitter:image"
            content="https://i.postimg.cc/nrkkj9HX/imgprom.jpg"
        />
    </Head>
    <Hero />
    <LatesFeaturedJobs />
    <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1 md:gap-4 container mx-auto"
    >
        <Box
            :style="isJobFeatured(featuredJob)"
            class="mx-4"
            v-for="featuredJob in featuredJobs"
            :key="featuredJob.id"
        >
            <Link :href="`/jobs/${featuredJob.slug}`">
                <JobPublishedBy :job="featuredJob" /><JobAditionals
                    :job="featuredJob" />
                <JobInfo :job="featuredJob" />
                <Salary :job="featuredJob" />
                <Tags :job="featuredJob"
            /></Link>
        </Box>
    </div>

    <FindCandidates />

    <LastestJobsOffers />

    <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1 md:gap-4 container mx-auto"
    >
        <Box
            :style="isJobFeatured(job)"
            class="mx-4"
            v-for="job in jobs"
            :key="job.id"
        >
            <Link :href="`/jobs/${job.slug}`">
                <JobPublishedBy :job="job" /><JobAditionals :job="job" />
                <JobInfo :job="job" />
                <Salary :job="job" />
                <Tags :job="job"
            /></Link>
        </Box>
    </div>

    <SalaryInfo />

    <MoreViewedJobs />

    <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1 md:gap-4 container mx-auto"
    >
        <Box
            :style="isJobFeatured(popularJob)"
            class="mx-4"
            v-for="popularJob in popularJobs"
            :key="popularJob.id"
        >
            <Link :href="`/jobs/${popularJob.slug}`">
                <JobPublishedBy :job="popularJob" />
                <JobAditionals :job="popularJob" />
                <JobInfo :job="popularJob" />
                <Salary :job="popularJob" />
                <Tags :job="popularJob"
            /></Link>
        </Box>
    </div>

    <AlertsInfo />
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import JobInfo from "../../Components/JobInfo.vue";
import Box from "@/UI/Box.vue";
import JobPublishedBy from "@/UI/JobPublishedBy.vue";
import Tags from "@/UI/Tags.vue";
import Hero from "@/Components/Hero.vue";
import LastestJobsOffers from "@/Components/LastestJobsOffers.vue";
import JobAditionals from "@/Components/JobAditionals.vue";
import Salary from "@/Components/Salary.vue";
import LatesFeaturedJobs from "@/Components/LatestFeaturedJobs.vue";
import FindCandidates from "@/Components/FindCandidates.vue";
import SalaryInfo from "@/Components/SalaryInfo.vue";
import MoreViewedJobs from "@/Components/MoreViewedJobs.vue";
import AlertsInfo from "@/Components/AlertsInfo.vue";
import { Head } from "@inertiajs/vue3";
import { computed } from "vue";

defineProps({
    jobs: { type: Array },
    featuredJobs: { type: Array },
    popularJobs: { type: Array },
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
