<template>
    <div class="p-4 rounded-md bg-white my-4">
        <h1 class="font-semibold text-xl mb-2">Location information</h1>

        <form @submit.prevent="updateUserLocation" class="">
            <div class="md:grid grid-cols-3 gap-4">
                <div class="mt-4 md:mt-0">
                    <label
                        for="country"
                        class="flex items-center mb-2 font-medium"
                        >Country</label
                    >
                    <select
                        id="country"
                        form="createJob"
                        v-model="selectedCountry"
                        @change="getStates"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
                    >
                        <option value="" hidden>{{ userCountry }}</option>
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

                <div class="mt-4 md:mt-0">
                    <label
                        for="state"
                        class="flex items-center mb-2 font-medium"
                        >State</label
                    >
                    <select
                        id="state"
                        form="createJob"
                        v-model="selectedState"
                        @change="getCities"
                        :disabled="!selectedCountry"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
                    >
                        <option value="" hidden>{{ userState }}</option>
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
                <div class="mt-4 md:mt-0">
                    <label for="city" class="flex items-center mb-2 font-medium"
                        >City</label
                    >
                    <select
                        id="city"
                        v-model="selectedCity"
                        form="createJob"
                        :disabled="!selectedState"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
                    >
                        <option value="" hidden>{{ userCity }}</option>
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
            <div class="md:flex items-center gap-3 mt-4">
                <button
                    type="submit"
                    class="bg-blue-600 w-full md:w-auto rounded-md px-4 py-2 text-white font-semibold hover:bg-blue-500 transition duration-200 ease-in-out"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Save changes
                </button>
            </div>
        </form>
    </div>
</template>
<script setup>
import { useForm, router } from "@inertiajs/vue3";
import { ref, computed, onMounted } from "vue";
import axios from "axios";

const props = defineProps({
    user: Object,
});

const countries = ref([]);
const states = ref([]);
const cities = ref([]);
const selectedCountry = ref("");
const selectedState = ref("");
const selectedCity = ref("");

const form = useForm(() => ({
    _method: "PUT",
    country_id: props.user.country_id,
    state_id: props.user.state_id,
    city_id: props.user.city_id,
}));

const updateUserLocation = () => {
    form.post(route("location.update"), {
        preserveScroll: true,
    });
};

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

const userCountry = computed(() => {
    if (props.user.country == null) {
        return "Selecciona un país";
    } else if (props.user.country != null) {
        return props.user.country.name;
    }
});

const userState = computed(() => {
    if (props.user.state == null) {
        return "Selecciona un estado";
    } else if (props.user.state != null) {
        return props.user.state.name;
    }
});

const userCity = computed(() => {
    if (props.user.city == null) {
        return "Selecciona una ciudad";
    } else if (props.user.city != null) {
        return props.user.city.name;
    }
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
</script>
