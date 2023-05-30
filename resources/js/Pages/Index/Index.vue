<template>
    <div v-for="job in jobs" :key="job.id">
        <Link :href="`/jobs/${job.slug}`"> <JobInfo :job="job" /></Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import JobInfo from "../../Components/JobInfo.vue";
defineProps({
    jobs: { type: Array },
});
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
