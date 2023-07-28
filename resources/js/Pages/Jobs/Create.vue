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
            <form name="createJob" @submit.prevent="publish">
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
                            v-model="form.title"
                            placeholder="Ej. Tecnico en mantenimiento..."
                            class="w-full text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                        />
                        <div
                            v-if="form.errors.title"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.title }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block mb-2 font-medium"
                            >Categoria</label
                        >
                        <select
                            form="createJob"
                            id="category"
                            v-model="form.category_id"
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
                        <div
                            v-if="form.errors.category_id"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.category_id }}
                                    </p>
                                </div>
                            </div>
                        </div>
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
                            v-model="form.apply_on"
                            placeholder="https://www.ejemplo.com/apply/on/..."
                            class="w-full text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                        />
                        <div
                            v-if="form.errors.apply_on"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.apply_on }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 mt-4 md:mt-0">
                        <label for="color" class="block mb-2 font-medium"
                            >Color</label
                        >
                        <div
                            class="w-full text-sm px-2 bg-gray-50 py-1.5 rounded-md border border-gray-200"
                        >
                            <input
                                type="color"
                                class="w-full rounded-md"
                                v-model="form.color"
                            />
                        </div>
                        <!-- <select
                            id="color"
                            form="createJob"
                            v-model="form.color"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>Selecciona un color</option>
                            <option value="gray">Gris</option>
                            <option value="blue">Azul</option>
                            <option value="red">Rojo</option>
                            <option value="indigo">Morado</option>
                            <option value="green">Verde</option>
                        </select> -->
                        <div
                            v-if="form.errors.color"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.color }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 mt-4 md:mt-0">
                        <label for="status" class="block mb-2 font-medium"
                            >Estado del trabajo</label
                        >
                        <select
                            id="status"
                            form="createJob"
                            v-model="form.status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                        >
                            <option value="" hidden>
                                Selecciona un estatus
                            </option>

                            <option value="draft">Borrador</option>
                            <option value="published">Publicado</option>
                            <option value="archived">Archivado</option>
                        </select>
                        <div
                            v-if="form.errors.status"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.status }}
                                    </p>
                                </div>
                            </div>
                        </div>
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
                            v-model="form.job_modality_id"
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
                        <div
                            v-if="form.errors.job_modality_id"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.job_modality_id }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 mt-4 md:mt-0">
                        <label for="workdays" class="block mb-2 font-medium"
                            >Tipo de puesto</label
                        >
                        <select
                            id="workdays"
                            form="createJob"
                            v-model="form.workday_id"
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
                        <div
                            v-if="form.errors.workday_id"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.workday_id }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 mt-4 md:mt-0">
                        <label for="priority" class="block mb-2 font-medium"
                            >Prioridad</label
                        >
                        <select
                            id="priority"
                            form="createJob"
                            v-model="form.priority_id"
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
                        <div
                            v-if="form.errors.priority_id"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.priority_id }}
                                    </p>
                                </div>
                            </div>
                        </div>
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
                        <div
                            v-if="form.errors.country_id"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.country_id }}
                                    </p>
                                </div>
                            </div>
                        </div>
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
                        <div
                            v-if="form.errors.state_id"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.state_id }}
                                    </p>
                                </div>
                            </div>
                        </div>
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
                        <div
                            v-if="form.errors.city_id"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.city_id }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:grid grid-cols-7 mb-4 gap-4 text-sm">
                    <div class="col-span-1">
                        <p class="font-medium mb-2">Selecciona hasta 6 tags</p>
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
                        <Transition v-on-click-outside="closeMenu"
                            ><div
                                v-show="open"
                                class="bg-white border border-gray-200 rounded-md w-[21rem] md:w-[9.8rem] mt-0.5 z-10 px-2 py-2 absolute"
                            >
                                <ul class="max-h-44 overflow-y-scroll">
                                    <li
                                        v-for="tag in tags"
                                        class="py-1 px-2 my-1 text-sm rounded-md p-1"
                                        :class="{
                                            'bg-gray-100 ': isSelected(
                                                tag.name,
                                                tag.id
                                            ),
                                        }"
                                        :key="tag.id"
                                        :value="tag.id"
                                    >
                                        <button
                                            @click="addTag(tag.name, tag.id)"
                                            type="button"
                                            :class="getButtonClass(tag.name)"
                                            class="w-full text-left"
                                        >
                                            {{ tag.name }}
                                        </button>
                                    </li>
                                </ul>
                            </div></Transition
                        >
                    </div>
                    <div class="col-span-6 mt-4 md:mt-0">
                        <p class="font-medium mb-2">
                            Tags seleccionados: {{ selectedTagsCount }}
                        </p>
                        <div
                            class="bg-gray-50 rounded-md border border-gray-300 px-2 flex flex-wrap items-center py-0.5"
                        >
                            <p class="py-2 mr-2">Selección:</p>
                            <button
                                v-for="(selectedTag, index) in selectedTags"
                                :key="index"
                                type="button"
                                @click="removeTag(selectedTag)"
                                class="m-0.5 text-xs font-medium bg-blue-100 text-blue-700 px-3 rounded-full border border-blue-200 py-1.5 flex items-center justify-between"
                            >
                                {{ selectedTag.value }}
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
                    <div v-if="form.errors.tag_id" class="px-2 py-2 rounded-md">
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.tag_id }}
                                </p>
                            </div>
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
                            v-model="form.currency_id"
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
                        <div
                            v-if="form.errors.currency_id"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.currency_id }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 mt-4 md:mt-0">
                        <label for="min" class="block mb-2 font-medium"
                            >Desde</label
                        >
                        <input
                            type="number"
                            id="min"
                            v-model="form.min"
                            placeholder="Minimo"
                            min="1"
                            pattern="^[0-9]+"
                            class="w-full text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                        />
                        <div
                            v-if="form.errors.min"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.min }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 mt-4 md:mt-0">
                        <label for="max" class="block mb-2 font-medium"
                            >Hasta</label
                        >
                        <input
                            type="number"
                            id="max"
                            v-model="form.max"
                            placeholder="Maximo"
                            min="1"
                            pattern="^[0-9]+"
                            class="w-full text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                        />
                        <div
                            v-if="form.errors.max"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.max }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 mt-4 md:mt-0">
                        <label for="periodicity" class="block mb-2 font-medium"
                            >Cada</label
                        >
                        <select
                            id="periodicity"
                            v-model="form.periodicity_id"
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
                        <div
                            v-if="form.errors.periodicity_id"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.periodicity_id }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 mt-4 md:mt-0">
                        <label for="salary_type" class="block mb-2 font-medium"
                            >Por</label
                        >
                        <select
                            id="salary_type"
                            v-model="form.salary_type_id"
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
                        <div
                            v-if="form.errors.salary_type_id"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.salary_type_id }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-sm">
                    <label
                        for="description"
                        class="block mb-2 font-medium text-left"
                        >Descripción</label
                    >
                    <textarea
                        v-model="form.description"
                        id="description"
                        class="w-full text-sm rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600 bg-gray-50"
                        cols="30"
                        rows="4"
                        placeholder="Escribe una descripción del empleo..."
                    ></textarea>
                    <div
                        v-if="form.errors.description"
                        class="px-2 py-2 rounded-md"
                    >
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <label
                        for="extra_info"
                        class="block mb-2 mt-2 font-medium text-left"
                        >Información sobre la empresa</label
                    >
                    <textarea
                        v-model="form.extra_info"
                        id="extra_info"
                        class="w-full text-sm rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600 bg-gray-50"
                        cols="30"
                        rows="3"
                        placeholder="Escribe una descripción de la empresa..."
                    ></textarea>
                    <div
                        v-if="form.errors.extra_info"
                        class="px-2 py-2 rounded-md"
                    >
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.extra_info }}
                                </p>
                            </div>
                        </div>
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
import { ref, computed, onMounted, watch } from "vue";
import { Transition } from "vue";
import axios from "axios";
import { useForm } from "@inertiajs/vue3";
import { vOnClickOutside } from "@vueuse/components";

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
    currencies: {
        type: Array,
    },
    salariesTypes: {
        type: Array,
    },
    periodicities: {
        type: Array,
    },
    user_id: {
        type: Number,
    },
    tags: {
        type: Array,
    },
});

const form = useForm({
    user_id: props.user_id,
    title: "",
    category_id: "",
    apply_on: "",
    color: "#272727",
    status: "",
    job_modality_id: "",
    workday_id: "",
    priority_id: "",
    country_id: "",
    state_id: "",
    city_id: "",
    tag_id: [],
    min: "",
    max: "",
    currency_id: "",
    salary_type_id: "",
    periodicity_id: "",
    description: "",
    extra_info: "",
});

watch(
    [
        () => form.title,
        () => form.category_id,
        () => form.apply_on,
        () => form.color,
        () => form.status,
        () => form.job_modality_id,
        () => form.workday_id,
        () => form.priority_id,
        () => form.min,
        () => form.max,
        () => form.currency_id,
        () => form.salary_type_id,
        () => form.periodicity_id,
        () => form.description,
        () => form.extra_info,
    ],
    ([
        newTitle,
        newCategory,
        newApplyOn,
        newColor,
        newStatus,
        newJobModality,
        newWorkday,
        newPriority,
        newMin,
        newMax,
        newCurrency,
        newSalaryType,
        newPeriodicity,
        newDescription,
        newExtraInfo,
    ]) => {
        localStorage.setItem("title", newTitle);
        localStorage.setItem("category_id", newCategory);
        localStorage.setItem("apply_on", newApplyOn);
        localStorage.setItem("color", newColor);
        localStorage.setItem("status", newStatus);
        localStorage.setItem("job_modality_id", newJobModality);
        localStorage.setItem("workday_id", newWorkday);
        localStorage.setItem("priority_id", newPriority);
        localStorage.setItem("min", newMin);
        localStorage.setItem("max", newMax);
        localStorage.setItem("currency_id", newCurrency);
        localStorage.setItem("salary_type_id", newSalaryType);
        localStorage.setItem("periodicity_id", newPeriodicity);
        localStorage.setItem("description", newDescription);
        localStorage.setItem("extra_info", newExtraInfo);
    }
);

onMounted(() => {
    getCountries();

    let savedTitle = localStorage.getItem("title");
    let savedCategory = localStorage.getItem("category_id");
    let savedApplyOn = localStorage.getItem("apply_on");
    let savedColor = localStorage.getItem("color");
    let savedStatus = localStorage.getItem("status");
    let savedJobModality = localStorage.getItem("job_modality_id");
    let savedWorkday = localStorage.getItem("workday_id");
    let savedPriority = localStorage.getItem("priority_id");
    let savedMin = localStorage.getItem("min");
    let savedMax = localStorage.getItem("max");
    let savedCurrency = localStorage.getItem("currency_id");
    let savedSalaryType = localStorage.getItem("salary_type_id");
    let savedPeriodicity = localStorage.getItem("periodicity_id");
    let savedDescription = localStorage.getItem("description");
    let savedExtraInfo = localStorage.getItem("extra_info");

    if (savedCategory) {
        form.category_id = savedCategory;
    }
    if (savedTitle) {
        form.title = savedTitle;
    }

    if (savedApplyOn) {
        form.apply_on = savedApplyOn;
    }

    if (savedColor) {
        form.color = savedColor;
    }

    if (savedStatus) {
        form.status = savedStatus;
    }

    if (savedJobModality) {
        form.job_modality_id = savedJobModality;
    }

    if (savedWorkday) {
        form.workday_id = savedWorkday;
    }

    if (savedPriority) {
        form.priority_id = savedPriority;
    }

    if (savedMin) {
        form.min = savedMin;
    }

    if (savedMax) {
        form.max = savedMax;
    }

    if (savedCurrency) {
        form.currency_id = savedCurrency;
    }

    if (savedSalaryType) {
        form.salary_type_id = savedSalaryType;
    }

    if (savedPeriodicity) {
        form.periodicity_id = savedPeriodicity;
    }

    if (savedDescription) {
        form.description = savedDescription;
    }

    if (savedExtraInfo) {
        form.extra_info = savedExtraInfo;
    }
});

const publish = () => {
    form.post(route("jobs.store"));
    window.localStorage.clear();
};

const open = ref(false);
const selectedTags = ref([]);
const countries = ref([]);
const states = ref([]);
const cities = ref([]);
const selectedCountry = ref("");
const selectedState = ref("");
const selectedCity = ref("");
const tags_id = ref([]);

const closeMenu = () => {
    open.value = false;
};

form.tag_id = computed(() => {
    return tags_id.value;
});

form.user_id = computed(() => {
    return props.user_id;
});

form.country_id = computed(() => {
    return selectedCountry.value;
});

form.state_id = computed(() => {
    return selectedState.value;
});

form.city_id = computed(() => {
    return selectedCity.value;
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

const addTag = (value, id) => {
    const tag = { value, id };

    if (
        selectedTags.value.length < 6 &&
        !selectedTags.value.some((t) => t.value === value && t.id === id)
    ) {
        selectedTags.value.push(tag);
        tags_id.value.push(id);
    }
};

const removeTag = (selectedTag) => {
    const index = selectedTags.value.indexOf(selectedTag);
    if (index !== -1) {
        selectedTags.value.splice(index, 1);
        tags_id.value.splice(index, 1);
    }
};

const isSelected = (value, id) => {
    return selectedTags.value.some(
        (tag) => tag.value === value && tag.id === id
    );
};

const selectedTagsCount = computed(() => {
    return selectedTags.value.length;
});

const getButtonClass = (value) => {
    return {
        "cursor-not-allowed": isSelected(value) || selectedTagsCount.value >= 6,
    };
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
