<template>
    <div
        class="fixed inset-0 z-20 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none"
    >
        <div class="fixed inset-0 bg-black opacity-10"></div>

        <div class="bg-white z-50 w-[90%] md:w-[40%] rounded-md p-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1>{{ title }}</h1>
                </div>
                <div>
                    <button @click="closeModal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, defineEmits } from "vue";

const props = defineProps({
    title: String,
});

const closeModal = () => {
    props.onCloseModal();
};
</script>
