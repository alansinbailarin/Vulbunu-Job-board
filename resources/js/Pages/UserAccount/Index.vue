<template>
    <Head title="Configuración del perfil"></Head>
    <div class="container mx-auto my-4 px-4">
        <div class="bg-white p-4 rounded-md">
            <UpdateProfileInformationForm
                :user="page.props.user"
                :jobModalities="props.jobModalities"
                :genders="props.genders"
                :skills="props.skills"
            />
            <UpdateUserLocation :user="page.props.user" />
        </div>
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import UpdateProfileInformationForm from "@/Pages/UserAccount/partials/UpdateProfileInformation.vue";
import UpdateUserLocation from "./partials/UpdateUserLocation.vue";

const props = defineProps({
    jobModalities: Array,
    genders: Array,
    skills: Array,
});

const page = usePage();
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
