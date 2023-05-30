<template>
    <JobInfo :job="job" />
</template>

<script setup>
import JobInfo from "../../Components/JobInfo.vue";
defineProps({
    job: { type: Object },
});
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
