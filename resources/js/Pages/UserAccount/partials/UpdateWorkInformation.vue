<template>
    <div class="p-4 bg-white rounded-md">
        <div class="flex items-center justify-between mb-3">
            <div>
                <h1 class="font-semibold text-xl mb-2">
                    Work history information
                </h1>
            </div>
            <div>
                <button
                    @click="isOpen = true"
                    class="border flex items-center border-blue-500 px-2 py-1.5 rounded-md text-blue-500 font-medium hover:bg-blue-500 hover:text-white transition-all duration-300 ease-in-out"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="22"
                        height="22"
                        fill="currentColor"
                        class="bi bi-plus"
                        viewBox="0 0 16 16"
                    >
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"
                        />
                    </svg>
                </button>
            </div>
            <div
                v-show="isOpen"
                class="fixed inset-0 flex items-center justify-center z-50"
            >
                <!-- Fondo obscuro -->
                <div
                    @click="isOpen = false"
                    class="fixed inset-0 bg-black opacity-50"
                ></div>

                <!-- Contenido del modal -->
                <div
                    class="bg-white w-full md:w-1/2 p-4 mx-4 rounded-md relative"
                >
                    <!-- Botón para cerrar el modal -->
                    <button
                        @click="isOpen = false"
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
                    <h1 class="font-medium text-gray-700">New work record</h1>
                    <p class="text-sm text-gray-500">
                        Add information about your work
                    </p>
                    <form @submit.prevent="addNewWorkRecord()" class="mt-2">
                        <div
                            class="overflow-y-auto h-[26rem] grid grid-cols-1 md:grid-cols-2 gap-3"
                        >
                            <div class="col-span-2">
                                <label
                                    for="name"
                                    class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                    >Company name
                                </label>
                                <input
                                    id="name"
                                    type="text"
                                    v-model="form.name"
                                    autocomplete="name"
                                    placeholder="Worker of..."
                                    class="w-full text-sm px-5 bg-gray-50 placeholder:text-gray-300 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                                />
                                <div v-if="form.errors.name" class="mt-2">
                                    <div class="flex items-center">
                                        <div>
                                            <p
                                                class="text-sm text-red-500 text-left"
                                            >
                                                {{ form.errors.name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-2 md:col-span-1">
                                <label
                                    for="start_date"
                                    class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                    >Start date</label
                                >
                                <input
                                    id="start_date"
                                    type="date"
                                    v-model="form.start_date"
                                    class="w-full text-sm px-5 bg-gray-50 py-2.5 placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                                />
                                <div v-if="form.errors.start_date" class="mt-2">
                                    <div class="flex items-center">
                                        <div>
                                            <p
                                                class="text-sm text-red-500 text-left"
                                            >
                                                {{ form.errors.start_date }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <label
                                            for="end_date"
                                            class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                            >End date</label
                                        >
                                    </div>
                                    <div>
                                        <div class="flex items-center mb-4">
                                            <input
                                                id="default-checkbox"
                                                type="checkbox"
                                                v-model="form.present"
                                                value=""
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"
                                            />
                                            <label
                                                for="default-checkbox"
                                                class="ml-2 text-sm font-medium text-gray-700"
                                                >Present</label
                                            >
                                        </div>
                                    </div>
                                </div>
                                <input
                                    :disabled="form.present"
                                    id="end_date"
                                    type="date"
                                    v-model="form.end_date"
                                    class="w-full text-sm px-5 bg-gray-50 py-2.5 placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                                />
                                <div v-if="form.errors.end_date" class="mt-2">
                                    <div class="flex items-center">
                                        <div>
                                            <p
                                                class="text-sm text-red-500 text-left"
                                            >
                                                {{ form.errors.end_date }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label
                                    for="description"
                                    class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                    >Description</label
                                >
                                <textarea
                                    name="description"
                                    id="description"
                                    v-model="form.description"
                                    cols="30"
                                    rows="7"
                                    class="w-full text-sm placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600 bg-gray-50"
                                    placeholder="Student in the best school from..."
                                ></textarea>
                                <div
                                    v-if="form.errors.description"
                                    class="mt-2"
                                >
                                    <div class="flex items-center">
                                        <div>
                                            <p
                                                class="text-sm text-red-500 text-left"
                                            >
                                                {{ form.errors.description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button
                                type="submit"
                                :class="{
                                    'opacity-25':
                                        form.processing || !form.isDirty,
                                }"
                                :disabled="form.processing || !form.isDirty"
                                class="w-full bg-blue-600 text-white py-1.5 rounded-md font-semibold"
                            >
                                Save work record
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
            <div
                v-for="work in props.works"
                :key="work.id"
                class="border border-gray-200 rounded-md px-4 py-2 bg-gray-50"
            >
                <div class="flex items-center justify-between mb-2">
                    <div>
                        <h1 class="font-medium">{{ work.name }}</h1>
                    </div>
                    <div class="flex items-center gap-2">
                        <button
                            @click="toggleModal(work)"
                            class="border border-blue-500 bg-white px-2 py-1 text-blue-500 rounded-md"
                        >
                            <span
                                ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-pencil-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"
                                    />
                                </svg>
                            </span>
                        </button>
                        <button
                            @click="showDeleteAlert(work.id)"
                            class="border border-red-500 px-2 py-1 text-red-500 rounded-md"
                        >
                            <span
                                ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-trash-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"
                                    />
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div
                        v-show="work.editModalOpen"
                        class="fixed inset-0 flex items-center justify-center z-50"
                    >
                        <!-- Fondo obscuro -->
                        <div
                            @click="toggleModal(work)"
                            class="fixed inset-0 bg-black opacity-50"
                        ></div>

                        <!-- Contenido del modal -->
                        <div
                            class="bg-white w-full md:w-1/2 p-4 mx-4 rounded-md relative"
                        >
                            <!-- Botón para cerrar el modal -->
                            <button
                                @click="toggleModal(work)"
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
                            <h1 class="font-medium text-gray-700">
                                {{ work.name }}
                            </h1>
                            <p class="text-sm text-gray-500">
                                Edit the information about your job
                            </p>
                            <form
                                class="mt-2"
                                @submit.prevent="updateWorkRecord(work.id)"
                            >
                                <div
                                    class="overflow-y-auto h-[26rem] grid grid-cols-1 md:grid-cols-2 gap-3"
                                >
                                    <div class="col-span-2">
                                        <label
                                            for="name"
                                            class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                            >Institution name
                                        </label>
                                        <input
                                            id="name"
                                            type="text"
                                            v-model="editForm.name"
                                            autocomplete="name"
                                            placeholder="University of..."
                                            class="w-full text-sm px-5 bg-gray-50 placeholder:text-gray-300 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                                        />
                                        <div
                                            v-if="editForm.errors.name"
                                            class="mt-2"
                                        >
                                            <div class="flex items-center">
                                                <div>
                                                    <p
                                                        class="text-sm text-red-500 text-left"
                                                    >
                                                        {{
                                                            editForm.errors.name
                                                        }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2 md:col-span-1">
                                        <label
                                            for="start_date"
                                            class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                            >Start date</label
                                        >
                                        <input
                                            id="start_date"
                                            type="date"
                                            v-model="editForm.start_date"
                                            class="w-full text-sm px-5 bg-gray-50 py-2.5 placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                                        />
                                        <div
                                            v-if="editForm.errors.start_date"
                                            class="mt-2"
                                        >
                                            <div class="flex items-center">
                                                <div>
                                                    <p
                                                        class="text-sm text-red-500 text-left"
                                                    >
                                                        {{
                                                            editForm.errors
                                                                .start_date
                                                        }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2 md:col-span-1">
                                        <div
                                            class="flex items-center justify-between"
                                        >
                                            <div>
                                                <label
                                                    for="end_date"
                                                    class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                                    >End date</label
                                                >
                                            </div>
                                            <div>
                                                <div
                                                    class="flex items-center mb-4"
                                                >
                                                    <input
                                                        id="default-checkbox"
                                                        type="checkbox"
                                                        v-model="
                                                            editForm.present
                                                        "
                                                        value=""
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"
                                                    />
                                                    <label
                                                        for="default-checkbox"
                                                        class="ml-2 text-sm font-medium text-gray-700"
                                                        >Present</label
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <input
                                            :disabled="editForm.present"
                                            id="end_date"
                                            type="date"
                                            v-model="editForm.end_date"
                                            class="w-full text-sm px-5 bg-gray-50 py-2.5 placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                                        />
                                        <div
                                            v-if="editForm.errors.end_date"
                                            class="mt-2"
                                        >
                                            <div class="flex items-center">
                                                <div>
                                                    <p
                                                        class="text-sm text-red-500 text-left"
                                                    >
                                                        {{
                                                            editForm.errors
                                                                .end_date
                                                        }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <label
                                            for="description"
                                            class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                            >Description</label
                                        >
                                        <textarea
                                            name="description"
                                            id="description"
                                            v-model="editForm.description"
                                            cols="30"
                                            rows="7"
                                            class="w-full text-sm placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600 bg-gray-50"
                                            placeholder="Student in the best school from..."
                                        ></textarea>
                                        <div
                                            v-if="editForm.errors.description"
                                            class="mt-2"
                                        >
                                            <div class="flex items-center">
                                                <div>
                                                    <p
                                                        class="text-sm text-red-500 text-left"
                                                    >
                                                        {{
                                                            editForm.errors
                                                                .description
                                                        }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <button
                                        type="submit"
                                        :class="{
                                            'opacity-25':
                                                editForm.processing ||
                                                !editForm.isDirty,
                                        }"
                                        :disabled="
                                            editForm.processing ||
                                            !editForm.isDirty
                                        "
                                        class="w-full bg-blue-600 text-white py-1.5 rounded-md font-semibold"
                                    >
                                        Save Work record
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <p
                        v-if="work.description !== null"
                        class="text-gray-500 text-sm line-clamp-2"
                    >
                        {{ work.description }}
                    </p>
                    <p v-else class="text-gray-500 text-sm line-clamp-2">
                        No description for this work record
                    </p>
                    <div class="mt-2 text-xs text-gray-400">
                        <span>
                            {{ moment(work.start_date).format("MMMM D, YYYY") }}
                        </span>
                        -
                        <span>{{ formattedEndDate(work.end_date) }} </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import moment from "moment";
import { computed, ref, watch } from "vue";
import { router, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

moment.locale("en");

const isOpen = ref(false);
const editModalOpen = ref(false);

const props = defineProps({
    user: Object,
    works: Array || Object,
});

const form = useForm({
    name: "",
    description: "",
    start_date: "",
    end_date: null,
    present: ref(false),
});

const editForm = useForm({
    id: props.works.id,
    name: props.works.name,
    description: props.works.description,
    start_date: props.works.start_date,
    end_date: props.works.end_date,
    present: ref(false),
});

const toggleModal = (works) => {
    editForm.id = works.id;
    editForm.name = works.name;
    editForm.description = works.description;
    editForm.start_date = works.start_date;
    editForm.end_date = works.end_date;

    works.editModalOpen = !works.editModalOpen;
};

function formattedEndDate(date) {
    if (date !== null) {
        return moment(date).format("MMMM D, YYYY");
    } else {
        return "Present";
    }
}

watch(
    () => form.present,
    (newPresentValue) => {
        if (newPresentValue) {
            form.end_date = null;
        }
    }
);

watch(
    () => editForm.present,
    (newPresentValue) => {
        if (newPresentValue) {
            editForm.end_date = null;
        }
    }
);

const showDeleteAlert = (itemToDelete) => {
    Swal.fire({
        title: "Are you sure you want to delete it?",
        text: "You cannot revert this action!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "0E70FF",
        confirmButtonText: "Delete!",
        cancelButtonText: "Cancel!",
    }).then((result) => {
        if (result.isConfirmed) {
            deleteItem(itemToDelete);
        }
    });
};

const addNewWorkRecord = () => {
    form.post(route("work-record.store"), {
        preserveScroll: true,
        onSuccess: () => {
            isOpen.value = false;
            form.reset();
        },
    });
};

const updateWorkRecord = (id) => {
    editForm.put(route("work-record.update", { id: editForm.id }), {
        preserveScroll: true,
        onSuccess: () => {
            isOpen.value = false;
        },
    });
};

const deleteItem = (id) => {
    router.delete(route("work-record.destroy", { id }), {
        preserveScroll: true,
    });
};
</script>
