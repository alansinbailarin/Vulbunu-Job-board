<template>
    <Hero />
    <LatesFeaturedJobs />
    <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1 md:gap-4 container mx-auto"
    >
        <Box v-for="featuredJob in featuredJobs" :key="featuredJob.id">
            <Link :href="`/jobs/${featuredJob.slug}`">
                <JobPublishedBy :job="featuredJob" /><JobAditionals
                    :job="featuredJob" />
                <JobInfo :job="featuredJob" />
                <Salary :job="featuredJob" />
                <Tags :job="featuredJob"
            /></Link>
        </Box>
    </div>

    <LastestJobsOffers />

    <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1 md:gap-4 container mx-auto"
    >
        <Box v-for="job in jobs" :key="job.id">
            <Link :href="`/jobs/${job.slug}`">
                <JobPublishedBy :job="job" /><JobAditionals :job="job" />
                <JobInfo :job="job" />
                <Salary :job="job" />
                <Tags :job="job"
            /></Link>
        </Box>
    </div>
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
import Salary from "../../Components/Salary.vue";
import LatesFeaturedJobs from "@/Components/LatestFeaturedJobs.vue";

defineProps({
    jobs: { type: Array },
    featuredJobs: { type: Array },
});
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
