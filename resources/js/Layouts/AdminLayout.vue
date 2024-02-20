<template>
    <AdminNavbar :user="user" />

    <!-- <Sidebar :user="user" :isOpen="sidebarOpen" />
 -->
    <div class="p-4">
        <slot>Default</slot>
    </div>
</template>

<script setup>
import Sidebar from "@/Components/Sidebar.vue";
import AdminNavbar from "@/Components/AdminNavbar.vue";
import { computed, ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();

const user = computed(() => {
    return page.props.user;
});

const sidebarOpen = ref(false);

const toggleSidebar = () => {
    sidebarOpen.value = !sidebarOpen.value;
};
</script>
