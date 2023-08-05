<template>
    <Head title="Configuración del perfil"></Head>
    <div class="container mx-auto my-4 px-4">
        <div class="bg-white p-4 rounded-md">
            <!-- Update user profile settings -->
            <form>
                <div class="flex items-center justify-between mb-3">
                    <h1 class="text-xl font-semibold">Mi perfil</h1>
                </div>
                <div class="border border-gray-200 p-4 rounded-md"></div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { usePage, useForm } from "@inertiajs/vue3";
import { Head } from "@inertiajs/vue3";

const form = useForm({
    user: {
        name: "",
        avatar: "",
        email: "",
        password: "",
        password_confirmation: "",
    },
});

const page = usePage();

console.log(page.props.user);
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
