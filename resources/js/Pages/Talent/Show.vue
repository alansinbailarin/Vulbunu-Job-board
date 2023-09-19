<template>
    <div>
        <Head :title="`${talent.name} ${talent.last_name}`"></Head>
    </div>
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-semibold mb-2">User Profile</h1>
        <div class="bg-white rounded-md mb-4">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <div class="md:flex gap-4">
                        <img
                            v-if="talent.avatar"
                            :src="`${talent.avatar}`"
                            alt=""
                            class="rounded-md w-96 h-72 md:w-40 md:h-40 object-cover"
                        />
                        <img
                            v-else
                            src="../../../img/no-image.jpeg"
                            alt=""
                            class="rounded-md w-full h-72 md:w-40 md:h-40 object-cover"
                        />
                        <div>
                            <div class="mt-3 md:mt-0 items-center gap-2 mb-1">
                                <h1 class="font-semibold">
                                    {{ talent.name }} {{ talent.last_name }}
                                </h1>
                                <span
                                    class="text-gray-500 text-xs rounded-md font-medium"
                                    >Member since
                                    {{
                                        moment(talent.created_at).format(
                                            "MMMM Do YYYY"
                                        )
                                    }}
                                </span>
                            </div>
                            <div class="md:flex items-center gap-3 flex-nowrap">
                                <span
                                    v-if="talent.job_title"
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
                                    v-if="
                                        talent.country?.name ||
                                        talent.state?.name ||
                                        talent.city?.name
                                    "
                                    class="flex items-center gap-2 text-gray-500 text-sm capitalize"
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
                                    {{ talent.city?.name }}
                                    {{ talent.state?.name }},
                                    {{ talent.country?.name }}
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
                                    v-if="talent.linkedin"
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
                                        target="_blank"
                                        class="text-blue-400 underline"
                                        >Linkedin</a
                                    >
                                </span>
                                <div class="text-gray-500 text-xs">
                                    <p
                                        v-if="talent.gender?.name == 'Otro'"
                                        class="flex items-center text-sm gap-1 text-gray-500"
                                    >
                                        <span class=""
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="13"
                                                height="13"
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
                                        Other
                                    </p>
                                    <p
                                        v-else-if="
                                            talent.gender?.name == 'Masculino'
                                        "
                                        class="flex items-center text-sm gap-1 text-gray-500"
                                    >
                                        <span class=""
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="13"
                                                height="13"
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
                                        Male
                                    </p>
                                    <p
                                        v-else-if="
                                            talent.gender?.name == 'Femenino'
                                        "
                                        class="flex items-center text-sm gap-1 text-gray-500"
                                    >
                                        <span class=""
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="13"
                                                height="13"
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
                                        Female
                                    </p>
                                    <p
                                        v-else-if="
                                            talent.gender?.name == 'Trans'
                                        "
                                        class="flex items-center text-gray-500 text-sm gap-1"
                                    >
                                        <span class=""
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="13"
                                                height="13"
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
                                <div>
                                    <span
                                        v-if="
                                            talent.jobmodality?.title == 'Mixto'
                                        "
                                        class="flex items-center gap-1 text-sm text-gray-500"
                                        ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="12"
                                            height="12"
                                            fill="currentColor"
                                            class="bi bi-check-circle-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                            />
                                        </svg>
                                        {{ talent.jobmodality?.title }}</span
                                    >
                                    <span
                                        v-if="
                                            talent.jobmodality?.title ==
                                            'Remoto'
                                        "
                                        class="flex items-center gap-1 text-sm text-gray-500"
                                        ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="12"
                                            height="12"
                                            fill="currentColor"
                                            class="bi bi-house-check-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"
                                            />
                                            <path
                                                d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"
                                            />
                                            <path
                                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514Z"
                                            />
                                        </svg>
                                        {{ talent.jobmodality?.title }}</span
                                    >
                                    <span
                                        v-if="
                                            talent.jobmodality?.title ==
                                            'Presencial'
                                        "
                                        class="flex items-center gap-1 text-sm text-gray-500"
                                        ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="12"
                                            height="12"
                                            fill="currentColor"
                                            class="bi bi-building-fill-check"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514Z"
                                            />
                                            <path
                                                d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7.256A4.493 4.493 0 0 0 12.5 8a4.493 4.493 0 0 0-3.59 1.787A.498.498 0 0 0 9 9.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .39-.187A4.476 4.476 0 0 0 8.027 12H6.5a.5.5 0 0 0-.5.5V16H3a1 1 0 0 1-1-1V1Zm2 1.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3 0v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"
                                            />
                                        </svg>
                                        {{ talent.jobmodality?.title }}</span
                                    >
                                </div>
                                <div v-for="language in talent.language">
                                    <span
                                        class="text-gray-600 bg-gray-100 px-2 py-1 text-xs rounded-md"
                                        >{{ language.name }}</span
                                    >
                                </div>
                            </div>
                            <div
                                class="flex items-center gap-1 text-xs my-2 flex-wrap"
                            >
                                <span
                                    v-for="skill in talent.skill"
                                    class="text-gray-600 bg-gray-100 px-2 py-1 rounded-md"
                                    >{{ skill.name }}</span
                                >
                            </div>

                            <div>
                                <p class="text-gray-400 text-sm">
                                    {{ talent.about_me }}
                                </p>

                                <div class="items-center gap-2 flex">
                                    <button
                                        v-if="talent.cv != null"
                                        @click.prevent="downloadCV(talent.cv)"
                                        class="hover:bg-gray-100 border border-dashed mt-2 border-gray-300 text-gray-600 font-medium py-2 px-4 rounded-md inline-flex items-center text-sm transition-all ease-in-out duration-300"
                                    >
                                        <svg
                                            class="fill-current w-3 h-3 mr-2"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"
                                            />
                                        </svg>
                                        <span>Download cv</span>
                                    </button>
                                    <Link
                                        v-if="talent.looking_for_job"
                                        class="hover:bg-blue-600 mt-2 bg-blue-500 text-white font-medium py-2 px-4 rounded-md inline-flex items-center text-sm transition-all ease-in-out duration-300"
                                        href="#"
                                        >Connect</Link
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="talent.education && talent.education.length > 0">
            <h1 class="text-xl font-semibold mb-2">Education</h1>
            <div class="bg-white rounded-md">
                <div class="p-4">
                    <ul
                        v-for="education in talent.education"
                        :key="education.id"
                    >
                        <li class="mb-3">
                            <time class="text-xs text-gray-400">
                                {{
                                    moment(education.start_date).format(
                                        "MMMM Do YYYY"
                                    )
                                }}
                                -
                                {{
                                    moment(education.end_date).format(
                                        "MMMM Do YYYY"
                                    )
                                }}
                            </time>
                            <p class="font-semibold text-gray-700">
                                {{ education.name }}
                            </p>
                            <p class="text-sm text-gray-500">
                                {{ education.description }}
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div v-if="talent.experience && talent.experience.length > 0">
            <h1 class="text-xl font-semibold my-2">Work History</h1>
            <div class="bg-white rounded-md">
                <div class="p-4">
                    <ul v-for="job in talent.experience" :key="job.id">
                        <li class="mb-3">
                            <time class="text-xs text-gray-400"
                                >{{
                                    moment(job.start_date).format(
                                        "MMMM Do YYYY"
                                    )
                                }}
                                -
                                {{
                                    moment(job.end_date).format("MMMM Do YYYY")
                                }}</time
                            >
                            <p class="font-semibold text-gray-700">
                                {{ job.name }}
                            </p>
                            <p class="text-sm text-gray-500">
                                {{ job.description }}
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, Head } from "@inertiajs/vue3";
import moment from "moment";
import "moment/dist/locale/es";

moment.locale("en");

defineProps({
    talent: Object,
});

const downloadCV = (url) => {
    fetch(url)
        .then((response) => response.blob())
        .then((blob) => {
            const blobUrl = window.URL.createObjectURL(new Blob([blob]));
            const fileName = url.split("/").pop();
            const link = document.createElement("a");
            link.href = blobUrl;
            link.setAttribute("download", fileName);
            document.body.appendChild(link);
            link.click();
            link.remove();
        });
};
</script>
<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
