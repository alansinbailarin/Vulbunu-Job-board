<template>
    <Head title="Entrevista"></Head>
    <div class="container my-1 p-4 mx-auto">
        <h1 class="font-medium text-gray-700 text-xl">
            Edit Interview Information
        </h1>
        <p
            v-if="
                props.applicant.status === 'rejected' ||
                props.applicant.status === 'cancelled' ||
                props.applicant.status === 'approved'
            "
            class="mb-3 text-gray-500"
        >
            You cannot change interview information because the application is
            in rejected or cancelled status.
        </p>
        <p v-else class="mb-3 text-gray-500">
            You can change the interview information by filling out the form
        </p>
        <div class="bg-white p-4 rounded-md">
            <form
                @submit.prevent="update()"
                class="grid grid-cols-1 md:grid-cols-2 gap-4"
            >
                <div class="col-span-2 md:col-span-1">
                    <label
                        for="interview_link"
                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                        >Interviewer name
                    </label>
                    <input
                        id="interviewer_name"
                        :disabled="
                            props.applicant.status === 'rejected' ||
                            props.applicant.status === 'cancelled' ||
                            props.applicant.status === 'approved'
                        "
                        v-model="form.interviewer_name"
                        type="text"
                        autocomplete="name"
                        placeholder="Martin Gimenez"
                        :class="{
                            'cursor-not-allowed ':
                                props.applicant.status === 'rejected' ||
                                props.applicant.status === 'cancelled' ||
                                props.applicant.status === 'approved',
                        }"
                        class="w-full text-sm px-5 bg-gray-50 placeholder:text-gray-300 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                    />
                    <div
                        v-if="form.errors.interviewer_name"
                        class="px-2 py-2 rounded-md"
                    >
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.interviewer_name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <label
                        for="interview_type"
                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                        >Interview type</label
                    >
                    <select
                        id="interview_type"
                        v-model="form.interview_type"
                        :disabled="
                            props.applicant.status === 'rejected' ||
                            props.applicant.status === 'cancelled' ||
                            props.applicant.status === 'approved'
                        "
                        :class="{
                            'cursor-not-allowed ':
                                props.applicant.status === 'rejected' ||
                                props.applicant.status === 'cancelled' ||
                                props.applicant.status === 'approved',
                        }"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
                    >
                        <option value="presential">Presential</option>
                        <option value="virtual">Virtual</option>
                    </select>
                    <div
                        v-if="form.errors.interview_type"
                        class="px-2 py-2 rounded-md"
                    >
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.interview_type }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <label
                        for="interview_link"
                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                        >Interview link
                    </label>
                    <input
                        id="interview_link"
                        v-model="form.interview_link"
                        type="text"
                        autocomplete="link"
                        :placeholder="
                            form.interview_type === 'virtual'
                                ? 'https://meet.google.com/...'
                                : 'https://maps.google.com/...'
                        "
                        :disabled="
                            props.applicant.status === 'rejected' ||
                            props.applicant.status === 'cancelled' ||
                            props.applicant.status === 'approved'
                        "
                        :class="{
                            'cursor-not-allowed ':
                                props.applicant.status === 'rejected' ||
                                props.applicant.status === 'cancelled' ||
                                props.applicant.status === 'approved',
                        }"
                        class="w-full text-sm px-5 bg-gray-50 placeholder:text-gray-300 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                    />
                    <div
                        v-if="form.errors.interview_link"
                        class="px-2 py-2 rounded-md"
                    >
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.interview_link }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <label
                        for="interview_date"
                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                        >Date and time for the interview</label
                    >
                    <input
                        id="interview_date"
                        v-model="form.interview_date"
                        type="datetime-local"
                        :disabled="
                            props.applicant.status === 'rejected' ||
                            props.applicant.status === 'cancelled' ||
                            props.applicant.status === 'approved'
                        "
                        :class="{
                            'cursor-not-allowed ':
                                props.applicant.status === 'rejected' ||
                                props.applicant.status === 'cancelled' ||
                                props.applicant.status === 'approved',
                        }"
                        class="w-full text-sm px-5 bg-gray-50 py-2.5 placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                    />
                    <div
                        v-if="form.errors.interview_date"
                        class="px-2 py-2 rounded-md"
                    >
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.interview_date }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <label
                        for="interview_duration"
                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                        >Interview duration</label
                    >
                    <select
                        id="interview_duration"
                        v-model="form.interview_duration"
                        :disabled="
                            props.applicant.status === 'rejected' ||
                            props.applicant.status === 'cancelled' ||
                            props.applicant.status === 'approved'
                        "
                        :class="{
                            'cursor-not-allowed ':
                                props.applicant.status === 'rejected' ||
                                props.applicant.status === 'cancelled' ||
                                props.applicant.status === 'approved',
                        }"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
                    >
                        <option value="00:30:00">30 minutes</option>
                        <option value="01:00:00">1 hour</option>
                        <option value="01:30:00">1 hour 30 minutes</option>
                        <option value="02:00:00">2 hour</option>
                    </select>
                    <div
                        v-if="form.errors.interview_duration"
                        class="px-2 py-2 rounded-md"
                    >
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.interview_duration }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <label
                        for="status"
                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                        >Interview status</label
                    >
                    <select
                        id="status"
                        v-model="form.status"
                        :disabled="
                            props.applicant.status === 'rejected' ||
                            props.applicant.status === 'cancelled' ||
                            props.applicant.status === 'approved'
                        "
                        :class="{
                            'cursor-not-allowed ':
                                props.applicant.status === 'rejected' ||
                                props.applicant.status === 'cancelled' ||
                                props.applicant.status === 'approved',
                        }"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
                    >
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                    <div v-if="form.errors.status" class="px-2 py-2 rounded-md">
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.status }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <label
                        for="interview_observation"
                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                        >Interview observations</label
                    >
                    <textarea
                        name="interview_observation"
                        id="interview_observation"
                        v-model="form.interview_observation"
                        cols="30"
                        rows="7"
                        :disabled="
                            props.applicant.status === 'rejected' ||
                            props.applicant.status === 'cancelled' ||
                            props.applicant.status === 'approved'
                        "
                        :class="{
                            'cursor-not-allowed ':
                                props.applicant.status === 'rejected' ||
                                props.applicant.status === 'cancelled' ||
                                props.applicant.status === 'approved',
                        }"
                        class="w-full text-sm placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600 bg-gray-50"
                        placeholder="Please arrive 30 minutes before the interview to be able to complete the registration process...."
                    ></textarea>
                    <div
                        v-if="form.errors.interview_observation"
                        class="px-2 py-2 rounded-md"
                    >
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.interview_observation }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2" :class="compareDates">
                    <label
                        for="interview_feedback"
                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                        >Comments about the interview</label
                    >
                    <textarea
                        name="interview_feedback"
                        id="interview_feedback"
                        v-model="form.interview_feedback"
                        cols="30"
                        rows="7"
                        class="w-full text-sm placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600 bg-gray-50"
                        placeholder="The applicant did not show up for the interview..."
                    ></textarea>
                    <div
                        v-if="form.errors.interview_feedback"
                        class="px-2 py-2 rounded-md"
                    >
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.interview_feedback }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2">
                    <Button
                        type="submit"
                        :class="{
                            'opacity-25': form.processing || !form.isDirty,
                        }"
                        :disabled="form.processing || !form.isDirty"
                        class="w-full bg-blue-600 text-white py-1.5 rounded-md font-semibold"
                        >Edit information</Button
                    >
                </div>
            </form>
        </div>
    </div>
</template>
<script setup>
import { useForm, Head, router } from "@inertiajs/vue3";
import { computed, watch } from "vue";

const form = useForm({
    interviewer_name: props.interview.interviewer_name,
    interview_type: props.interview.interview_type,
    interview_link: props.interview.interview_link,
    interview_date: props.interview.interview_date,
    interview_duration: props.interview.interview_duration,
    interview_observation: props.interview.interview_observation,
    interview_feedback: props.interview.interview_feedback,
    status: props.interview.status,
});
const props = defineProps({
    applicant: { Object },
    interview: { Object },
});

const currentDate = new Date();
const interviewDate = new Date(props.interview.interview_date);

const compareDates = computed(() => {
    if (currentDate > interviewDate || props.interview.status === "rejected") {
        return "visible";
    } else {
        return "hidden";
    }
});

const update = () => {
    form.put(route("update-interview", { interview: props.interview.id }), {
        preserveScroll: true,
    });
};
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
