<template>
    <div>
        <Navbar />
        <main class="">
            <slot>Default</slot>
        </main>
        <Footer />
    </div>
</template>

<script setup>
import Navbar from "@/Components/Navbar.vue";
import Footer from "../Components/Footer.vue";
</script>
