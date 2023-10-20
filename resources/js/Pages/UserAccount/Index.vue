<template>
    <Head title="Configuración del perfil"></Head>
    <div class="container mx-auto my-4 px-4">
        <div class="p-4 gap-4 rounded-md">
            <UpdateProfileInformationForm
                :user="page.props.user"
                :jobModalities="props.jobModalities"
                :genders="props.genders"
            />
            <UpdateUserLocation :user="page.props.user" />
            <UpdateUserSkills
                :user="page.props.user"
                :skills="props.skills"
                :userSkills="props.userSkills"
            />
            <UpdateEducationInformation
                :user="page.props.user"
                :education="props.education"
            />
            <UpdateWorkInformation
                :user="page.props.user"
                :works="props.works"
            />
        </div>
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import UpdateProfileInformationForm from "@/Pages/UserAccount/partials/UpdateProfileInformation.vue";
import UpdateUserLocation from "./partials/UpdateUserLocation.vue";
import UpdateUserSkills from "./partials/UpdateUserSkills.vue";
import UpdateEducationInformation from "./partials/UpdateEducationInformation.vue";
import UpdateWorkInformation from "./partials/UpdateWorkInformation.vue";

const props = defineProps({
    jobModalities: Array,
    genders: Array,
    skills: Array,
    userSkills: Array,
    education: Array || Object,
    works: Array || Object,
});

console.log(props.userSkills.value);

const page = usePage();
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
