<template>
    <div class="p-2 mb-4 rounded-md">
        <div class="flex items-center">
            <img
                :src="user.avatar"
                alt="Profile Photo"
                class="w-9 h-9 rounded-sm"
            />
            <div class="ml-2">
                <h1 class="font-semibold text-sm text-gray-700">
                    {{ user.name }} {{ user.last_name }}
                </h1>
                <p class="text-gray-400 text-xs font-light">{{ user.role }}</p>
            </div>
        </div>
    </div>
</template>
<script setup>
import { defineProps } from "vue";
const props = defineProps({
    user: Object,
});
</script>
