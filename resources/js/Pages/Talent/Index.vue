<template>
    <div class="container mx-auto my-8 px-4">
        <div
            class="bg-gradient-to-r to-gray-800 from-indigo-950 p-6 rounded-md"
        >
            <div class="grid grid-cols-3 gap-4 items-center">
                <div class="col-span-2">
                    <h1 class="text-white text-5xl font-bold">
                        Contamos con una comunidad de {{ count }} profesionales
                        para que formen parte de tu empresa
                    </h1>
                    <p class="text-lg text-gray-200 mt-4">
                        En esta sección, encontraras a los nuevos profesionales
                        mejor calificados para ocupar el puesto de trabajo que
                        estas promocionando, a unos pocos clicks.
                    </p>
                </div>
                <div class="col-span-1">
                    <img
                        class="w-56 mx-auto"
                        src="../../../img/rightscene.png"
                        alt=""
                    />
                </div>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 mt-6">
            <div class="col-span-1 bg-white rounded-md p-4 max-h-[30rem]">
                Aqui iran los filtros
            </div>
            <div class="col-span-3">
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-white col-span-2 rounded-md p-4">
                        Aqui ira la busqueda
                    </div>
                    <div
                        class="bg-white p-4 rounded-md"
                        v-for="talent in talents"
                        :key="talent.id"
                    >
                        <div class="flex items-center">
                            <Link
                                :href="`/talents/${talent.slug}`"
                                class="flex items-center gap-3 w-full"
                            >
                                <div>
                                    <img
                                        class="w-10 h-10 rounded-full object-cover"
                                        :src="`${talent.avatar}`"
                                        alt=""
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
                            <p class="text-gray-500 text-sm">
                                {{ talent.country.name }},
                                {{ talent.state.name }} {{ talent.city.name }}
                            </p>
                            <!-- <div
                                v-for="jobmodality in talent.jobmodality"
                                :key="jobmodality.id"
                            >
                                {{ jobmodality.title }}-
                            </div> -->
                            <a
                                :href="`mailto:${talent.email}`"
                                class="text-blue-500 text-xs underline mb-2"
                                >{{ talent.email }}</a
                            >
                            <p class="text-gray-500 font-medium text-xs mb-2">
                                Se unió el
                                {{
                                    dayjs(talent.created_at).format(
                                        "dddd D [de] MMMM [del] YYYY"
                                    )
                                }}
                            </p>
                            <p
                                v-if="talent.about_me"
                                class="text-gray-500 text-xs"
                            >
                                {{ talent.about_me }}
                            </p>
                            <p v-else class="text-gray-500 text-xs">
                                Esta persona no cuenta con una descripción
                                disponible en estos momentos.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import * as dayjs from "dayjs";
import { es } from "dayjs/locale/es";

dayjs.locale("es");

defineProps({
    talents: {
        type: Array,
    },
    count: {
        type: Number,
    },
});
</script>
<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
