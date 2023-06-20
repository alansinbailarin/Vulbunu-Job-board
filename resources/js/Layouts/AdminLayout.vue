<template>
    <AdminNavbar :user="user" />

    <Sidebar />

    <div class="p-4 sm:ml-64">
        <slot>Default</slot>
    </div>
</template>

<script setup>
import Sidebar from "@/Components/Sidebar.vue";
import AdminNavbar from "@/Components/AdminNavbar.vue";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();

const user = computed(() => {
    return page.props.user;
});
</script>
