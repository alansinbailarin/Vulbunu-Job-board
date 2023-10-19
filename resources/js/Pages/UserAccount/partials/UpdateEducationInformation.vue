<template>
    <div class="p-4 bg-white rounded-md">
        <div class="flex items-center justify-between mb-3">
            <div>
                <h1 class="font-semibold text-xl mb-2">
                    Education information
                </h1>
            </div>
            <div>
                <button
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
        </div>

        <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
            <div
                v-for="edu in props.education"
                :key="edu.id"
                class="border border-gray-200 rounded-md p-4 bg-gray-50"
            >
                <div class="flex items-center justify-between mb-2">
                    <div>
                        <h1 class="font-medium">{{ edu.name }}</h1>
                    </div>
                    <div class="flex items-center gap-2">
                        <button
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
                            @click="showDeleteAlert(edu.id)"
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
                </div>
                <div>
                    <p class="text-gray-500 text-sm line-clamp-2">
                        {{ edu.description }}
                    </p>
                    <div class="mt-2 text-sm text-gray-400">
                        <span>
                            {{ moment(edu.start_date).format("MMMM D, YYYY") }}
                        </span>
                        -
                        <span>{{ formattedEndDate(edu.end_date) }} </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import moment from "moment";
import { computed } from "vue";
import { router } from "@inertiajs/vue3";
import Swal from "sweetalert2";

moment.locale("en");

function formattedEndDate(date) {
    if (date !== null) {
        return moment(date).format("MMMM D, YYYY");
    } else {
        return "Present";
    }
}

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

const deleteItem = (id) => {
    router.delete(route("education-record.destroy", { id }), {
        preserveScroll: true,
    });
};

const props = defineProps({
    user: Object,
    education: Array || Object,
});
</script>
