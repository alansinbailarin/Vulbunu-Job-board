<template>
    <div class="container mx-auto px-4 mt-4">
        <div class="my-4 md:my-10">
            <h1 class="font-bold text-xl md:text-2xl text-gray-700">
                Describe el empleo a publicar
            </h1>
            <p class="text-sm md:text-base">
                Introduce la mayor cantidad de datos acerca de el empleo a
                publicar para poder hacer match con más aplicantes.
            </p>
        </div>
        <div class="bg-white rounded-md md:p-6 p-3">
            <form name="createJob" class="">
                <div class="md:grid grid-cols-6 gap-4 w-full text-sm">
                    <div class="mb-4 col-span-5">
                        <label
                            for="title"
                            class="block mb-2 font-medium text-left"
                            >Titulo</label
                        >
                        <input
                            type="text"
                            id="title"
                            name="title"
                            placeholder="Ej. Tecnico en mantenimiento..."
                            class="w-full text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block mb-2 font-medium"
                            >Categoria</label
                        >
                        <select
                            form="createJob"
                            id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>
                                Selecciona una categoria
                            </option>
                            <option
                                v-for="category in categories"
                                :key="category.id"
                                :value="category.id"
                            >
                                {{ category.title }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="md:grid grid-cols-6 md:mb-4 gap-4 text-sm">
                    <div class="col-span-4">
                        <label for="apply_on" class="block mb-2 font-medium"
                            >Aplica en:</label
                        >
                        <input
                            type="url"
                            id="apply_on"
                            name="apply_on"
                            placeholder="https://www.ejemplo.com/apply/on/..."
                            class="w-full text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                        />
                    </div>
                    <div class="col-span-1 mt-4 md:mt-0">
                        <label for="color" class="block mb-2 font-medium"
                            >Color</label
                        >
                        <select
                            id="color"
                            form="createJob"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>Selecciona un color</option>
                            <option value="gray">Gris</option>
                            <option value="blue">Azul</option>
                            <option value="indigo">Morado</option>
                            <option value="green">Verde</option>
                        </select>
                    </div>
                    <div class="col-span-1 mt-4 md:mt-0">
                        <label for="status" class="block mb-2 font-medium"
                            >Estado del trabajo</label
                        >
                        <select
                            id="status"
                            form="createJob"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>
                                Selecciona un estatus
                            </option>

                            <option value="draft">Borrador</option>
                            <option value="published">Publicado</option>
                            <option value="archived">Archivado</option>
                        </select>
                    </div>
                </div>
                <div class="grid md:grid-cols-12 mb-4 md:gap-4 text-sm">
                    <div class="col-span-2 mt-4 md:mt-0">
                        <label
                            for="jobModalities"
                            class="block mb-2 font-medium"
                            >Tipo de modalidad</label
                        >
                        <select
                            id="jobModalities"
                            form="createJob"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>
                                Selecciona una modalidad
                            </option>

                            <option
                                v-for="modality in jobModalities"
                                :key="modality.id"
                                :value="modality.id"
                            >
                                {{ modality.title }}
                            </option>
                        </select>
                    </div>
                    <div class="col-span-2 mt-4 md:mt-0">
                        <label for="workdays" class="block mb-2 font-medium"
                            >Tipo de puesto</label
                        >
                        <select
                            id="workdays"
                            form="createJob"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>
                                Selecciona un tiempo
                            </option>

                            <option
                                v-for="workday in workdays"
                                :key="workday.id"
                                :value="workday.id"
                            >
                                {{ workday.title }}
                            </option>
                        </select>
                    </div>
                    <div class="col-span-2 mt-4 md:mt-0">
                        <label for="priority" class="block mb-2 font-medium"
                            >Prioridad</label
                        >
                        <select
                            id="priority"
                            form="createJob"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>
                                Selecciona una prioridad
                            </option>

                            <option
                                v-for="priority in priorities"
                                :key="priority.id"
                                :value="priority.id"
                            >
                                {{ priority.title }}
                            </option>
                        </select>
                    </div>
                    <div class="col-span-2 mt-4 md:mt-0">
                        <label for="country" class="block mb-2 font-medium"
                            >Pais</label
                        >
                        <select
                            id="country"
                            form="createJob"
                            v-model="selectedCountry"
                            @change="getStates"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>Selecciona un pais</option>
                            <option
                                v-for="country in countries"
                                :key="country.id"
                                :value="country.id"
                            >
                                {{ country.name }}
                            </option>
                        </select>
                    </div>

                    <div class="col-span-2 mt-4 md:mt-0">
                        <label for="state" class="block mb-2 font-medium"
                            >Estado</label
                        >
                        <select
                            id="state"
                            form="createJob"
                            v-model="selectedState"
                            @change="getCities"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>
                                Selecciona un estado
                            </option>
                            <option
                                v-for="state in states"
                                :key="state.id"
                                :value="state.id"
                            >
                                {{ state.name }}
                            </option>
                        </select>
                    </div>

                    <div class="col-span-2 mt-4 md:mt-0">
                        <label for="city" class="block mb-2 font-medium"
                            >Ciudad</label
                        >
                        <select
                            id="city"
                            v-model="selectedCity"
                            form="createJob"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>
                                Selecciona una ciudad
                            </option>
                            <option
                                v-for="city in cities"
                                :key="city.id"
                                :value="city.id"
                            >
                                {{ city.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="md:grid grid-cols-7 mb-4 gap-4 text-sm">
                    <div class="col-span-1">
                        <p class="font-medium mb-2">Selecciona hasta 7 tags</p>
                        <button
                            @click="open = !open"
                            type="button"
                            class="rounded-md w-full bg-gray-50 px-4 py-2.5 border border-gray-300 flex items-center justify-between"
                        >
                            Tags
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="13"
                                height="13"
                                fill="currentColor"
                                class="bi bi-chevron-down"
                                :class="{ 'transform rotate-180': open }"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
                                />
                            </svg>
                        </button>
                        <Transition
                            ><div
                                v-show="open"
                                class="bg-white border border-gray-200 rounded-md w-[21rem] md:w-[9.8rem] mt-0.5 z-10 px-2 py-2 absolute"
                            >
                                <ul class="max-h-44 overflow-y-scroll">
                                    <li
                                        v-for="category in categories"
                                        class="py-1 px-2 my-1 text-sm rounded-md p-1"
                                        :class="{
                                            'bg-gray-100 ': isSelected(
                                                category.title
                                            ),
                                        }"
                                        :key="category.id"
                                    >
                                        <button
                                            @click="addTag(category.title)"
                                            type="button"
                                            :class="
                                                getButtonClass(category.title)
                                            "
                                            class="w-full text-left"
                                        >
                                            {{ category.title }}
                                        </button>
                                    </li>
                                </ul>
                            </div></Transition
                        >
                    </div>
                    <div class="col-span-6 mt-4 md:mt-0">
                        <p class="font-medium mb-2">
                            Tags seleccionados {{ selectedTagsCount }}
                        </p>
                        <div
                            class="bg-gray-50 rounded-md border border-gray-300 px-2 flex flex-wrap items-center py-0.5"
                        >
                            <p class="py-2 mr-2">Selección:</p>
                            <button
                                v-for="selectedTag in selectedTags"
                                type="button"
                                @click="removeTag(selectedTag)"
                                class="m-0.5 text-xs font-medium bg-blue-100 text-blue-700 px-3 rounded-full border border-blue-200 py-1.5 flex items-center justify-between"
                            >
                                {{ selectedTag }}
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-x"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="md:grid grid-cols-7 mb-4 gap-4 text-sm">
                    <div class="col-span-1 mt-4 md:mt-0">
                        <label for="currency" class="block mb-2 font-medium"
                            >Moneda</label
                        >
                        <select
                            id="currency"
                            name="currencyInput"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>
                                Selecciona un tipo de moneda
                            </option>

                            <option
                                v-for="currency in currencies"
                                :key="currency.id"
                                :value="currency.id"
                            >
                                {{ currency.code }} - {{ currency.name }} -
                                {{ currency.symbol }}
                            </option>
                        </select>
                    </div>
                    <div class="col-span-2 mt-4 md:mt-0">
                        <label for="min" class="block mb-2 font-medium"
                            >Desde</label
                        >
                        <input
                            type="number"
                            id="min"
                            name="min"
                            placeholder="Minimo"
                            min="1"
                            pattern="^[0-9]+"
                            class="w-full text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                        />
                    </div>
                    <div class="col-span-2 mt-4 md:mt-0">
                        <label for="max" class="block mb-2 font-medium"
                            >Hasta</label
                        >
                        <input
                            type="number"
                            id="max"
                            name="max"
                            placeholder="Maximo"
                            min="1"
                            pattern="^[0-9]+"
                            class="w-full text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                        />
                    </div>
                    <div class="col-span-1 mt-4 md:mt-0">
                        <label for="periodicity" class="block mb-2 font-medium"
                            >Cada</label
                        >
                        <select
                            id="periodicity"
                            name="periodicity_input"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>
                                Selecciona una periodicidad
                            </option>
                            <option
                                v-for="periodicity in periodicities"
                                :key="periodicity.id"
                                :value="periodicity.id"
                            >
                                {{ periodicity.title }}
                            </option>
                        </select>
                    </div>
                    <div class="col-span-1 mt-4 md:mt-0">
                        <label for="salary_type" class="block mb-2 font-medium"
                            >Por</label
                        >
                        <select
                            id="salary_type"
                            name="salary_type_input"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>
                                Selecciona un tipo de salario
                            </option>
                            <option
                                v-for="salaryT in salariesTypes"
                                :key="salaryT.id"
                                :value="salaryT.id"
                            >
                                {{ salaryT.title }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="text-sm">
                    <label
                        for="description"
                        class="block mb-2 font-medium text-left"
                        >Descripción</label
                    >
                    <textarea
                        name="description"
                        id="description"
                        class="w-full mb-4 text-sm rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600 bg-gray-50"
                        cols="30"
                        rows="4"
                        placeholder="Escribe una descripción del empleo..."
                    ></textarea>
                    <label
                        for="extra_info"
                        class="block mb-2 font-medium text-left"
                        >Información sobre la empresa</label
                    >
                    <textarea
                        name="extra_info"
                        id="extra_info"
                        class="w-full text-sm rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600 bg-gray-50"
                        cols="30"
                        rows="3"
                        placeholder="Escribe una descripción de la empresa..."
                    ></textarea>
                </div>
                <div class="text-sm mt-4 grid grid-cols-12 gap-4">
                    <div class="col-span-12 flex items-center justify-between">
                        <label
                            for="requirements"
                            class="block font-medium col-span-12"
                            >Lista de requerimientos</label
                        >
                        <button
                            @click="addRequirementInput"
                            class="w-20 h-8 rounded-md bg-green-600 font-medium text-white"
                            type="button"
                        >
                            Añadir
                        </button>
                    </div>
                    <div
                        class="col-span-12 flex gap-2"
                        v-for="(requirement, index) in requirements"
                        :key="index"
                    >
                        <input
                            id="requirements"
                            class="w-full text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                            type="text"
                            :placeholder="'Introduce los requisitos...'"
                        />
                        <button
                            @click="removeRequirementInput(index)"
                            class="w-28 md:w-24 rounded-md bg-red-600 font-medium text-white"
                            type="button"
                        >
                            Eliminar
                        </button>
                    </div>
                </div>
                <div class="text-sm mt-4 grid grid-cols-12 gap-4">
                    <div class="col-span-12 flex items-center justify-between">
                        <label
                            for="responsabilities"
                            class="block font-medium col-span-12"
                            >Lista de requerimientos</label
                        >
                        <button
                            @click="addResponsabilityInput"
                            class="w-20 h-8 rounded-md bg-green-600 font-medium text-white"
                            type="button"
                        >
                            Añadir
                        </button>
                    </div>
                    <div
                        class="col-span-12 flex gap-2"
                        v-for="(responsability, index) in responsabilities"
                        :key="index"
                    >
                        <input
                            id="responsabilities"
                            class="w-full text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                            type="text"
                            :placeholder="'Introduce los responsabilidades...'"
                        />
                        <button
                            @click="removeResponsabilityInput(index)"
                            class="w-28 md:w-24 rounded-md bg-red-600 font-medium text-white"
                            type="button"
                        >
                            Eliminar
                        </button>
                    </div>
                </div>
                <button
                    class="w-full mt-4 font-medium bg-indigo-500 rounded-md py-2.5 text-white hover:bg-indigo-600 duration-300 ease-in-out"
                    type="submit"
                >
                    Publicar empleo
                </button>
            </form>
        </div>
    </div>
</template>
<script setup>
import { ref, computed, onMounted } from "vue";
import { Transition } from "vue";
import axios from "axios";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    categories: {
        type: Array,
    },
    jobModalities: {
        type: Array,
    },
    workdays: {
        type: Array,
    },
    priorities: {
        type: Array,
    },
    // countries: {
    //     type: Array,
    // },
    // states: {
    //     type: Array,
    // },
    // cities: {
    //     type: Array,
    // },
    currencies: {
        type: Array,
    },
    salariesTypes: {
        type: Array,
    },
    periodicities: {
        type: Array,
    },
});

const open = ref(false);
const selectedTags = ref([]);
const requirements = ref([""]);
const responsabilities = ref([""]);
const countries = ref([]);
const states = ref([]);
const cities = ref([]);
const selectedCountry = ref("");
const selectedState = ref("");
const selectedCity = ref("");

onMounted(() => {
    getCountries();
});

const getCountries = () => {
    axios
        .get("/api/countries")
        .then((response) => {
            countries.value = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
};

const getStates = () => {
    axios
        .get(`/api/states/${selectedCountry.value}`)
        .then((response) => {
            states.value = response.data;
            selectedState.value = "";
            cities.value = [];
            selectedCity.value = "";
        })
        .catch((error) => {
            console.log(error);
        });
};

const getCities = () => {
    axios
        .get(`/api/cities/${selectedState.value}`)
        .then((response) => {
            cities.value = response.data;
            selectedCity.value = "";
        })
        .catch((error) => {
            console.log(error);
        });
};

const addTag = (value) => {
    if (selectedTags.value.length < 7 && !selectedTags.value.includes(value)) {
        selectedTags.value.push(value);
    }
};

const removeTag = (value) => {
    selectedTags.value = selectedTags.value.filter((tag) => tag !== value);
};

const isSelected = (value) => {
    return selectedTags.value.includes(value);
};

const selectedTagsCount = computed(() => {
    return selectedTags.value.length;
});

const getButtonClass = (value) => {
    return {
        "cursor-not-allowed": isSelected(value) || selectedTagsCount.value >= 7,
    };
};

const addRequirementInput = () => {
    requirements.value.push("");
};

const removeRequirementInput = (index) => {
    requirements.value.splice(index, 1);
};

const addResponsabilityInput = () => {
    responsabilities.value.push("");
};

const removeResponsabilityInput = (index) => {
    responsabilities.value.splice(index, 1);
};
</script>
<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>

<style scoped>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.2s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
