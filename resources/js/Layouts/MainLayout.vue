<template>
    <div class="">
        <Navbar :user="user" />
        <ToastList class="" />
        <main class="">
            <slot>Default</slot>
        </main>
        <Footer />
    </div>
</template>

<script setup>
import Navbar from "@/Components/Navbar.vue";
import Footer from "../Components/Footer.vue";
import ToastList from "../Components/ToastList.vue";
import { computed, ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import Banner from "@/Components/Banner.vue";

const page = usePage();

const user = computed(() => {
    return page.props.user;
});
</script>
