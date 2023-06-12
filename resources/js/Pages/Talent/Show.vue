<template>
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-md">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <div class="md:flex items-center gap-4">
                        <img
                            :src="`${talent.avatar}`"
                            alt=""
                            class="rounded-lg w-40 h-40 object-cover"
                        />
                        <div>
                            <div
                                class="md:flex mt-3 md:mt-0 items-center gap-2 mb-1"
                            >
                                <h1 class="font-semibold">{{ talent.name }}</h1>
                                <span
                                    class="text-gray-500 text-xs rounded-md font-medium"
                                    >Miembro desde el
                                    {{
                                        dayjs(talent.created_at).format(
                                            "dddd D [de] MMMM [del] YYYY"
                                        )
                                    }}
                                </span>
                            </div>
                            <div class="md:flex items-center gap-3 mb-3">
                                <span
                                    class="flex items-center gap-2 text-gray-500 text-sm"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="12"
                                        height="12"
                                        fill="currentColor"
                                        class="bi bi-briefcase-fill"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"
                                        />
                                        <path
                                            d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"
                                        />
                                    </svg>
                                    {{ talent.job_title }}
                                </span>
                                <span
                                    class="flex items-center gap-2 text-gray-500 text-sm"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="13"
                                        height="13"
                                        fill="currentColor"
                                        class="bi bi-geo-alt-fill"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"
                                        />
                                    </svg>
                                    {{ talent.country.name }},
                                    {{ talent.state.name }}
                                    {{ talent.city.name }}
                                </span>
                                <span
                                    class="flex items-center gap-2 text-gray-500 text-sm"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="13"
                                        height="13"
                                        fill="currentColor"
                                        class="bi bi-envelope-at-fill"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z"
                                        />
                                        <path
                                            d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"
                                        />
                                    </svg>
                                    <a
                                        :href="`mailto:${talent.email}`"
                                        class="text-blue-400 underline"
                                        >{{ talent.email }}</a
                                    >
                                </span>
                                <span
                                    class="flex items-center gap-2 text-gray-500 text-sm"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="12"
                                        height="12"
                                        fill="currentColor"
                                        class="bi bi-linkedin"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"
                                        />
                                    </svg>
                                    <a
                                        :href="`${talent.linkedin}`"
                                        class="text-blue-400 underline"
                                        >Linkedin</a
                                    >
                                </span>
                                <div class="text-gray-500 text-xs">
                                    <p
                                        v-if="talent.gender.name == 'Otro'"
                                        class="flex items-center text-sm gap-1 text-purple-500"
                                    >
                                        <span class="text-purple-500"
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-gender-ambiguous"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1H11.5zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z"
                                                />
                                            </svg>
                                        </span>
                                        Otro
                                    </p>
                                    <p
                                        v-else-if="
                                            talent.gender.name == 'Masculino'
                                        "
                                        class="flex items-center text-sm gap-1 text-blue-500"
                                    >
                                        <span class="text-blue-500"
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-gender-male"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"
                                                />
                                            </svg>
                                        </span>
                                        Masculino
                                    </p>
                                    <p
                                        v-else-if="
                                            talent.gender.name == 'Femenino'
                                        "
                                        class="flex items-center text-sm gap-1 text-pink-500"
                                    >
                                        <span class="text-pink-500"
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-gender-female"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"
                                                />
                                            </svg>
                                        </span>
                                        Femenino
                                    </p>
                                    <p
                                        v-else-if="
                                            talent.gender.name == 'Trans'
                                        "
                                        class="flex items-center text-indigo-500 text-sm gap-1"
                                    >
                                        <span class="text-indigo-500"
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-gender-trans"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1.707L3.5 2.793l.646-.647a.5.5 0 1 1 .708.708l-.647.646.822.822A3.99 3.99 0 0 1 8 3c1.18 0 2.239.51 2.971 1.322L14.293 1H11.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 0 1-3.05-5.814l-.95-.949-.646.647a.5.5 0 1 1-.708-.708l.647-.646L1 1.707V3.5a.5.5 0 0 1-1 0v-3zm5.49 4.856a3 3 0 1 0 5.02 3.288 3 3 0 0 0-5.02-3.288z"
                                                />
                                            </svg>
                                        </span>
                                        Trans
                                    </p>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">
                                    {{ talent.about_me }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import * as dayjs from "dayjs";
import { es } from "dayjs/locale/es";

dayjs.locale("es");

defineProps({
    talent: Object,
});
</script>
<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
