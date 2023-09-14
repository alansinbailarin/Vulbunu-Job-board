<template>
    <Head title="Entrevista"></Head>
    <div class="container my-1 p-4 mx-auto">
        <h1 class="mb-3 font-medium text-gray-700 text-xl">
            Editar información de la entrevista
        </h1>
        <div class="bg-white p-4 rounded-md">
            <form
                @submit.prevent="update()"
                class="grid grid-cols-1 md:grid-cols-2 gap-4"
            >
                <div class="col-span-2 md:col-span-1">
                    <label
                        for="interview_link"
                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                        >Nombre del entrevistador
                    </label>
                    <input
                        id="interviewer_name"
                        v-model="form.interviewer_name"
                        type="text"
                        autocomplete="name"
                        placeholder="Martin Gimenez"
                        class="w-full text-sm px-5 bg-gray-50 placeholder:text-gray-300 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
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
                        >Tipo de entrevista</label
                    >
                    <select
                        id="interview_type"
                        v-model="form.interview_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                    >
                        <option value="presential">Presencial</option>
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
                        >Enlace para la entrevista
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
                        class="w-full text-sm px-5 bg-gray-50 placeholder:text-gray-300 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
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
                        >Fecha y hora de la entrevista</label
                    >
                    <input
                        id="interview_date"
                        v-model="form.interview_date"
                        type="datetime-local"
                        class="w-full text-sm px-5 bg-gray-50 py-2.5 placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
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
                        >Duración de la entrevista</label
                    >
                    <select
                        id="interview_duration"
                        v-model="form.interview_duration"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                    >
                        <option value="00:30:00">30 minutos</option>
                        <option value="01:00:00">1 hora</option>
                        <option value="01:30:00">1 hora 30 minutos</option>
                        <option value="02:00:00">2 horas</option>
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
                        >Estatus de la entrevista</label
                    >
                    <select
                        id="status"
                        v-model="form.status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                    >
                        <option value="approved">Aprobado</option>
                        <option value="pending">Pendiente</option>
                        <option value="rejected">Rechazado</option>
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
                        >Observaciones para la entrevista</label
                    >
                    <textarea
                        name="interview_observation"
                        id="interview_observation"
                        v-model="form.interview_observation"
                        cols="30"
                        rows="7"
                        class="w-full text-sm placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600 bg-gray-50"
                        placeholder="Por favor, llegar 30 minutos antes a la entrevista para poder realizar el proceso de registro..."
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
                        >Comentarios acerca de la entrevista</label
                    >
                    <textarea
                        name="interview_feedback"
                        id="interview_feedback"
                        v-model="form.interview_feedback"
                        cols="30"
                        rows="7"
                        class="w-full text-sm placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600 bg-gray-50"
                        placeholder="El aplicante no se presentó a la entrevista..."
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
                        class="w-full bg-indigo-600 text-white py-1.5 rounded-md font-semibold"
                        >Editar información</Button
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
    interview: { Object },
});

const currentDate = new Date();
const interviewDate = new Date(props.interview.interview_date);

const compareDates = computed(() => {
    if (currentDate > interviewDate) {
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
