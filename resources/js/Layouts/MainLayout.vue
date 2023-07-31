<template>
    <div class="">
        <Navbar :user="user" />
        <main class="">
            <slot>Default</slot>
        </main>
        <Footer />
    </div>
</template>

<script setup>
import Navbar from "@/Components/Navbar.vue";
import Footer from "../Components/Footer.vue";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();

const user = computed(() => {
    return page.props.user;
});
</script>
