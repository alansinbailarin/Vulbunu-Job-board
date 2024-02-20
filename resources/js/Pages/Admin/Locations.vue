<template>
    <div class="py-16">
        <div class="">
            <div v-for="country in countries.data">
                {{ country.id }} {{ country.name }}
            </div>
        </div>
        <form @submit.prevent="addCountry()">
            <input type="text" v-model="countryForm.name" />
            <button>Add country</button>
            <div v-if="countryForm.errors.name" class="mt-2">
                <div class="flex items-center">
                    <div>
                        <p class="text-sm text-red-500 text-left">
                            {{ countryForm.errors.name }}
                        </p>
                    </div>
                </div>
            </div>
        </form>

        <form @submit.prevent="addState()">
            <input
                type="number"
                v-model="stateForm.country_id"
                placeholder="country id"
            />
            <input
                type="text"
                v-model="stateForm.name"
                placeholder="state name"
            />
            <button>Add state</button>
            <div v-if="stateForm.errors.name" class="mt-2">
                <div class="flex items-center">
                    <div>
                        <p class="text-sm text-red-500 text-left">
                            {{ stateForm.errors.name }}
                        </p>
                    </div>
                </div>
            </div>
            <div v-if="stateForm.errors.country_id" class="mt-2">
                <div class="flex items-center">
                    <div>
                        <p class="text-sm text-red-500 text-left">
                            {{ stateForm.errors.country_id }}
                        </p>
                    </div>
                </div>
            </div>
        </form>

        <div class="">
            <div v-for="state in states.data">
                {{ state.id }} {{ state.name }} {{ state.country_id }}
            </div>
        </div>
    </div>
</template>
<script setup>
import { defineProps } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    countries: {
        type: Array,
        required: true,
    },
    states: {
        type: Array,
        required: true,
    },
    cities: {
        type: Array,
        required: true,
    },
});

const countryForm = useForm({
    name: "",
});

const stateForm = useForm({
    name: "",
    country_id: "",
});

const addCountry = () => {
    countryForm.post(route("add-country"), {
        preserveScroll: true,
        onSuccess: () => {
            countryForm.reset();
        },
    });
};

const addState = () => {
    stateForm.post(route("add-state"), {
        preserveScroll: true,
        onSuccess: () => {
            stateForm.reset();
        },
    });
};

console.log(props.countries);
</script>
<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";
export default {
    layout: AdminLayout,
};
</script>
