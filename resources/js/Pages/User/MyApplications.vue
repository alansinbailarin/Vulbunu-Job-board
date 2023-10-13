<template>
    <div>
        <Head title="Mis aplicaciones"> </Head>
    </div>
    <div class="container my-1 p-4 mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 md:gap-4 gap-2 my-4">
            <div
                class="rounded-md bg-gradient-to-r from-blue-500 to-blue-700 text-white p-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-semibold">Total</h1>
                    </div>
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            fill="currentColor"
                            class="bi bi-globe2"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-blue-100 text-sm">
                    Total count of your applications
                </p>
                <div class="mt-2 flex items-center gap-4">
                    <div>
                        <p class="text-3xl">{{ totalAppsCount }}</p>
                    </div>
                    <!-- <div v-if="percentajeTotal > 0.0">
                        <p class="text-2xl font-extralight text-green-400">
                            {{ percentajeTotal.toFixed(1) }} %
                        </p>
                    </div>
                    <div v-else-if="percentajeTotal < 0.0">
                        <p class="text-2xl font-extralight text-red-400">
                            {{ percentajeTotal.toFixed(1) }} %
                        </p>
                    </div> -->
                </div>
            </div>
            <div
                class="rounded-md bg-gradient-to-r from-yellow-500 to-yellow-700 text-white p-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-semibold">Pending</h1>
                    </div>
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            fill="currentColor"
                            class="bi bi-question-circle"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                            <path
                                d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-yellow-100 text-sm">
                    Count of your pending applications
                </p>
                <div class="mt-2 flex items-center gap-4">
                    <div>
                        <p class="text-3xl">{{ pendingAppsCount }}</p>
                    </div>
                    <div v-if="percentajePending > 0.0">
                        <p class="text-2xl font-extralight text-green-400">
                            {{ percentajePending.toFixed(1) }} %
                        </p>
                    </div>
                    <div v-else-if="percentajePending < 0.0">
                        <p class="text-2xl font-extralight text-red-400">
                            {{ percentajePending.toFixed(1) }} %
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="rounded-md bg-gradient-to-r from-green-500 to-green-700 text-white p-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-semibold">Approved</h1>
                    </div>
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            fill="currentColor"
                            class="bi bi-check-circle"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                            <path
                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-green-100 text-sm">
                    Count of your approved applications
                </p>
                <div class="mt-2 flex items-center gap-4">
                    <div>
                        <p class="text-3xl">{{ approvedAppsCount }}</p>
                    </div>
                    <div v-if="percentajeApproved > 0.0">
                        <p class="text-2xl font-extralight text-green-400">
                            {{ percentajeApproved.toFixed(1) }} %
                        </p>
                    </div>
                    <div v-else-if="percentajeApproved < 0.0">
                        <p class="text-2xl font-extralight text-red-400">
                            {{ percentajeApproved.toFixed(1) }} %
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="rounded-md bg-gradient-to-r from-red-500 to-red-700 text-white p-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-semibold">Rejected</h1>
                    </div>
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            fill="currentColor"
                            class="bi bi-x-circle"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-red-100 text-sm">
                    Count of your rejected applications
                </p>
                <div class="mt-2 flex items-center gap-4">
                    <div>
                        <p class="text-3xl">{{ rejectedAppsCount }}</p>
                    </div>
                    <div v-if="percentajeRejected > 0.0">
                        <p class="text-2xl font-extralight text-green-400">
                            {{ percentajeRejected.toFixed(1) }} %
                        </p>
                    </div>
                    <div v-else-if="percentajeRejected < 0.0">
                        <p class="text-2xl font-extralight text-red-400">
                            {{ percentajeRejected.toFixed(1) }} %
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="grid grid-cols-2 gap-4 my-4">
            <div class="bg-white rounded-md p-4">
                <Chart
                    :type="'doughnut'"
                    :title="'Aplicaciones con relacion a la ultima semana'"
                    :percentajePending="percentajePendingLastWeek"
                    :percentajeApproved="percentajeApprovedLastWeek"
                    :percentajeRejected="percentajeRejectedLastWeek"
                ></Chart>
            </div>
            <div class="bg-white rounded-md p-4">
                <Chart
                    :type="'doughnut'"
                    :title="'Aplicaciones desde el principio'"
                    :percentajePending="pendingCount"
                    :percentajeApproved="approvedCount"
                    :percentajeRejected="rejectedCount"
                ></Chart>
            </div>
        </div> -->

        <div class="grid md:grid-cols-3 grid-cols-1 md:gap-4">
            <Box v-for="job in props.jobs" :key="job.id">
                <div v-for="applicant in job.applicant" :key="applicant.id">
                    <div class="flex items-center justify-between text-sm">
                        <div>
                            <a
                                :href="`/jobs/${job.slug}`"
                                :style="jobTitleColorIfFeatured(job)"
                                class="font-medium"
                                >{{ job.title }}</a
                            >
                        </div>
                        <div class="">
                            <span :class="getStatusColor(applicant.status)">{{
                                changeStatusText(applicant.status)
                            }}</span>
                            <div
                                v-if="
                                    applicant.status != 'rejected' &&
                                    applicant.status != 'approved' &&
                                    applicant.status != 'cancelled'
                                "
                                class="relative inline-block text-left pt-0.5 ml-1"
                            >
                                <div>
                                    <button
                                        @click="toggleDropdown(applicant)"
                                        type="button"
                                        class="inline-flex w-full justify-center gap-x-1.5 text-gray-900"
                                        id="menu-button"
                                        aria-expanded="true"
                                        aria-haspopup="true"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"
                                            />
                                        </svg>
                                    </button>
                                </div>
                                <div
                                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white border border-gray-200"
                                    v-show="applicant.dropdownOpen"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-labelledby="menu-button"
                                    tabindex="-1"
                                >
                                    <div class="" role="none">
                                        <button
                                            type="submit"
                                            @click="
                                                swalChangeToCancelStatus(
                                                    applicant
                                                )
                                            "
                                            :disabled="
                                                applicant.status != 'pending' &&
                                                applicant.status != 'approved'
                                            "
                                            class="w-full text-left text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 transition duration-200 ease-in-out"
                                            :class="{
                                                'bg-gray-50 ':
                                                    applicant.status !=
                                                        'pending' &&
                                                    applicant.status !=
                                                        'approved',
                                            }"
                                        >
                                            Cancel application
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="text-xs text-gray-700">
                        {{ job.user.name }} {{ job.user.last_name }}
                    </h1>
                    <p class="text-xs mt-2 font-light text-gray-500">
                        {{
                            job.description.trim().length > 80
                                ? job.description.trim().slice(0, 80) + "..."
                                : job.description.trim()
                        }}
                    </p>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 mt-2">
                                Applied on
                                {{
                                    moment(applicant?.created_at).format(
                                        "MMMM Do YYYY"
                                    )
                                }}
                            </p>
                        </div>
                        <div
                            v-for="interview in applicant.interviews"
                            :key="interview.id"
                        >
                            <div
                                v-if="
                                    interview && applicant.status != 'cancelled'
                                "
                            >
                                <span
                                    @click="toggleModal(interview)"
                                    class="text-xs underline hover:cursor-pointer text-blue-500"
                                    >Interview information</span
                                >
                            </div>

                            <div
                                v-show="interview.isOpen"
                                class="fixed inset-0 flex items-center justify-center z-50"
                            >
                                <!-- Fondo obscuro -->
                                <div
                                    @click="toggleModal(interview)"
                                    class="fixed inset-0 bg-black opacity-50"
                                ></div>

                                <!-- Contenido del modal -->
                                <div
                                    class="bg-white w-full md:w-1/2 p-4 mx-4 rounded-md relative"
                                >
                                    <!-- Botón para cerrar el modal -->
                                    <button
                                        @click="toggleModal(interview)"
                                        class="absolute text-lg cursor-pointer top-2 right-2 text-gray-600 hover:bg-gray-100 rounded-md"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            fill="currentColor"
                                            class="bi bi-x"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Contenido del modal -->
                                    <h2
                                        class="font-semibold text-gray-700 mb-2"
                                    >
                                        {{ interview?.interviewer_name }}
                                        <span class="capitalize"
                                            >({{
                                                interview?.interview_type ===
                                                "presential"
                                                    ? "presential"
                                                    : "virtual"
                                            }})</span
                                        >
                                    </h2>
                                    <div class="text-sm text-gray-500 gap-1">
                                        <p class="">
                                            Confirmation:
                                            {{
                                                moment(
                                                    interview?.created_at
                                                ).format("MMMM Do YYYY")
                                            }}.
                                        </p>
                                        <p>
                                            Interview on:
                                            {{
                                                moment(
                                                    interview?.interview_date
                                                ).format(
                                                    "MMMM Do YYYY hh:mm a"
                                                )
                                            }}.
                                        </p>
                                        <p>
                                            Duration:
                                            {{ interview?.interview_duration }}
                                            {{
                                                interview?.interview_duration <
                                                "01:00:00"
                                                    ? "Minute(s)"
                                                    : "Hour(s)"
                                            }}
                                        </p>
                                        <p>
                                            {{
                                                interview?.interview_type ===
                                                "presential"
                                                    ? "Location:"
                                                    : "Interview url:"
                                            }}
                                            <a
                                                :href="`${interview?.interview_link}`"
                                                target="_blank"
                                                class="text-blue-500 underline"
                                                >See</a
                                            >
                                        </p>
                                        <span
                                            >Interview status:
                                            {{ interview?.status }}</span
                                        >
                                        <div
                                            class="mt-2"
                                            v-if="
                                                interview?.interview_observation
                                            "
                                        >
                                            <h1 class="font-medium">
                                                Observations
                                            </h1>
                                            <div
                                                class="bg-gray-100 w-full p-2 rounded-sm mt-1"
                                            >
                                                <p>
                                                    {{
                                                        interview?.interview_observation
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            v-if="interview?.interview_feedback"
                                            class="mt-2"
                                        >
                                            <p>
                                                *
                                                {{
                                                    interview?.interview_feedback
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div v-if="applicant.status != 'cancelled'" class="mt-3">
                        <button
                            type="button"
                            class="w-full text-xs text-red-500 rounded-md border py-1.5 border-dashed border-red-500"
                        >
                            Cancelar aplicación
                        </button>
                    </div> -->
                </div>
            </Box>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import Box from "@/UI/Box.vue";
import { ref } from "vue";
import moment from "moment";
import "moment/dist/locale/es";
import Chart from "./components/Chart.vue";
import Swal from "sweetalert2";

moment.locale("en");

const props = defineProps({
    jobs: Array,
    pendingAppsCount: Number,
    totalAppsCount: Number,
    approvedAppsCount: Number,
    rejectedAppsCount: Number,
    percentajeTotalLastWeek: Number,
    percentajePendingLastWeek: Number,
    percentajeApprovedLastWeek: Number,
    percentajeRejectedLastWeek: Number,
    percentajeTotal: Number,
    percentajePending: Number,
    percentajeApproved: Number,
    percentajeRejected: Number,
    totalCount: Number,
    pendingCount: Number,
    approvedCount: Number,
    rejectedCount: Number,
});

const form = useForm({
    applicant_id: "",
});

const isOpen = ref(false);

const toggleDropdown = (applicant) => {
    form.applicant_id = applicant.id;

    applicant.dropdownOpen = !applicant.dropdownOpen;
};

const swalChangeToCancelStatus = (applicant) => {
    Swal.fire({
        title: "You want to cancel your application?",
        text: "You cannot revert this action!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "0E70FF",
        confirmButtonText: "Cancel application",
        cancelButtonText: "Close",
    }).then((result) => {
        if (result.isConfirmed) {
            updateApplicationStatus(applicant, "cancelled");
        }
    });
};

const updateApplicationStatus = (appplicant, status) => {
    form.put(
        route("update-application-status", {
            applicant: appplicant.id,
            status: status,
        }),
        { preserveScroll: true }
    );
};

const getStatusColor = (status) => {
    if (status === "pending") {
        return "bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded";
    } else if (status === "approved") {
        return "bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded";
    } else if (status === "rejected") {
        return "bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded";
    } else if (status === "cancelled") {
        return "bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded";
    }
};

const changeStatusText = (status) => {
    if (status === "pending") {
        return "Pending";
    } else if (status === "approved") {
        return "Approved";
    } else if (status === "rejected") {
        return "Rejected";
    } else if (status === "cancelled") {
        return "Cancelled";
    }
};

const jobTitleColorIfFeatured = (job) => {
    if (job.featured === 1) {
        return `color: ${job.color};`;
    }
};

const toggleModal = (interview) => {
    interview.isOpen = !interview.isOpen;
};
</script>
<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import Swal from "sweetalert2";
export default {
    layout: MainLayout,
};
</script>
<style scoped>
.bounce-enter-active {
    animation: bounce-in 1s;
}
.bounce-leave-active {
    animation: bounce-in 1s reverse;
}
@keyframes bounce-in {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1);
    }
    100% {
        transform: scale(1);
    }
}
</style>
