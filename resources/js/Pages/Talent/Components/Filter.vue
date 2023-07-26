<template>
    <form action="" @submit.prevent="filter">
        <div
            class="bg-white rounded-md p-4 my-4 grid grid-cols-2 md:grid-cols-8 items-center gap-2"
        >
            <div class="relative text-gray-400 col-span-2">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3"
                    ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="13"
                        height="13"
                        fill="currentColor"
                        class="bi bi-search"
                        viewBox="0 0 16 16"
                    >
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                        />
                    </svg>
                </span>
                <input
                    v-model="filterForm.job_title"
                    type="search"
                    placeholder="Palabra clave, titulo de trabajo..."
                    class="placeholder:text-gray-400 pl-8 text-gray-600 bg-gray-100 border border-gray-200 w-full rounded-md px-3 focus:ring-1 ring-indigo-300 text-sm"
                />
            </div>
            <div class="relative text-gray-400 col-span-2">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3"
                    ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="13"
                        height="13"
                        fill="currentColor"
                        class="bi bi-geo-alt"
                        viewBox="0 0 16 16"
                    >
                        <path
                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"
                        />
                        <path
                            d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"
                        />
                    </svg>
                </span>
                <input
                    v-model="filterForm.location"
                    type="search"
                    placeholder="Guadalajara, Buenos Aires..."
                    class="placeholder:text-gray-400 pl-8 text-gray-600 bg-gray-100 border border-gray-200 w-full rounded-md px-3 focus:ring-1 ring-indigo-300 text-sm"
                />
            </div>
            <select
                v-model="filterForm.jobModality"
                class="col-span-2 bg-gray-100 w-full md:w-auto rounded-md text-sm border border-gray-200 text-gray-500"
                name="jobModality"
                id="jobModality"
            >
                <option :value="null" disabled>Modalidad de trabajo</option>
                <option
                    v-for="modality in jobModalities"
                    :key="modality.id"
                    :value="modality.id"
                >
                    {{ modality.title }}
                </option>
            </select>

            <button
                type="submit"
                class="text-white rounded-md bg-indigo-500 px-4 py-2 text-sm font-medium"
            >
                Buscar
            </button>
            <button
                @click="clear"
                class="border border-red-400 py-2 px-4 rounded-md font-medium text-sm text-red-500"
                type="reset"
            >
                Limpiar
            </button>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { onMounted, ref, watch } from "vue";

const props = defineProps({
    filters: {
        type: Object,
    },
    talents: {
        type: Object,
    },
    jobModalities: {
        type: Array,
    },
});

const filterForm = useForm({
    job_title: props.filters.job_title ?? null,
    location: props.filters.location ?? null,
    jobModality: props.filters.jobModality ?? null,
});

watch(
    () => ({
        job_title: filterForm.job_title,
        location: filterForm.location,
        jobModality: filterForm.jobModality,
    }),
    (newValues, oldValues) => {
        if (newValues.job_title !== oldValues.job_title) {
            filter(newValues.job_title);
        }
        if (newValues.location !== oldValues.location) {
            filter(newValues.location);
        }
        if (newValues.jobModality !== oldValues.jobModality) {
            filter(newValues.jobModality);
        }
    }
);

const filter = () => {
    filterForm.get(route("talents.index"), {
        preserveState: true,
        preserveScroll: true,
    });
};

const clear = () => {
    filterForm.job_title = null;
    filterForm.location = null;
    filterForm.jobModality = null;
    filter();
};
</script>
