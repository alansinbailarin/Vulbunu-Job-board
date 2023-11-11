<template>
    <div>
        <Head :title="`${count} available talents`">
            <meta
                name="description"
                content="Explore our list of available talent and find qualified candidates for your hiring needs. Find professionals in various areas ready to contribute to your team."
            />
        </Head>
    </div>

    <div class="container mx-auto my-4 px-4">
        <div class="bg-gradient-to-r to-gray-800 from-blue-950 p-6 rounded-md">
            <div class="md:grid grid-cols-3 gap-4 items-center">
                <div class="col-span-2">
                    <h1
                        class="text-white text-2xl md:text-4xl lg:text-5xl font-bold"
                    >
                        We have a broad community of professionals to join your
                        company
                    </h1>
                    <p
                        class="text-sm md:text-base lg:text-lg text-gray-200 mt-4"
                    >
                        In this section, you will find the newly top-rated
                        professionals for the job position you are promoting,
                        just a few clicks away
                    </p>
                </div>
                <div class="col-span-1 hidden md:block">
                    <img
                        class="w-56 mx-auto"
                        src="../../../img/rightscene.png"
                        alt=""
                    />
                </div>
            </div>
        </div>
        <Filter
            :talents="talents"
            :filters="filters"
            :jobModalities="jobModalities"
        />
        <div class="md:grid grid-cols-3 gap-4">
            <div class="col-span-3">
                <div class="md:grid grid-cols-3 gap-3">
                    <div
                        v-if="talents && talents.data.length"
                        class="bg-white p-4 rounded-md mb-2 md:mb-0"
                        v-for="talent in talents.data"
                        :key="talent.id"
                    >
                        <div class="flex items-center">
                            <Link
                                :href="`/talents/${talent.slug}`"
                                class="flex items-center gap-3 w-full"
                            >
                                <div>
                                    <img
                                        v-if="talent.avatar"
                                        :src="`${talent.avatar}`"
                                        alt=""
                                        class="w-12 h-11 rounded-full object-cover"
                                    />
                                    <img
                                        v-else
                                        src="../../../img/no-image.jpeg"
                                        alt=""
                                        class="w-12 h-11 rounded-full object-cover"
                                    />
                                </div>
                                <div>
                                    <h1
                                        class="text-base font-semibold text-blue-600"
                                    >
                                        {{ talent.job_title }}
                                    </h1>
                                    <p class="text-sm text-gray-500">
                                        {{ talent.name }}
                                        {{ talent.last_name }}
                                    </p>
                                </div>
                            </Link>
                        </div>
                        <div class="mt-2">
                            <p class="text-gray-500 text-sm capitalize">
                                {{ talent.city?.name }}
                                {{ talent.state.name }},
                                {{ talent.country.name }}
                            </p>
                            <a
                                :href="`mailto:${talent.email}`"
                                class="text-blue-500 text-xs underline mb-2"
                                >{{ talent.email }}</a
                            >
                            <p class="text-gray-500 font-medium text-xs mb-2">
                                Joined on
                                {{
                                    moment(talent.created_at).format(
                                        "MMMM Do YYYY"
                                    )
                                }}
                            </p>
                            <p
                                v-if="talent.about_me"
                                class="text-gray-500 text-xs"
                            >
                                {{ talent.shortDescription }}...
                            </p>
                            <p v-else class="text-gray-500 text-xs">
                                This person does not have a description
                                available at the moment
                            </p>
                        </div>
                    </div>
                    <div v-else class="col-span-3 text-center my-12">
                        <h1 class="text-2xl font-bold">We sorry</h1>
                        <p class="text-gray-500">
                            We couldn't find any results for your search
                        </p>
                    </div>
                </div>
                <div
                    v-if="talents.data.length"
                    class="w-full flex justify-center my-8"
                >
                    <Pagination :links="talents.links" />
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import Filter from "./Components/Filter.vue";
import { Link } from "@inertiajs/vue3";
import moment from "moment";
import "moment/dist/locale/es";
import Pagination from "@/UI/Pagination.vue";
import { Head } from "@inertiajs/vue3";

moment.locale("en");

const props = defineProps({
    talents: { type: [Array, Object] },
    count: {
        type: Number,
    },
    filters: {
        type: Object,
    },
    jobModalities: {
        type: Array,
    },
});
</script>
<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
