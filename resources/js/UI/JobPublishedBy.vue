<template>
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <img
                v-if="job.img_path"
                :src="`https://primerempleolat.s3.us-east-2.amazonaws.com/${job.img_path}`"
                alt=""
                class="w-16 rounded-md h-11 object-cover"
            />
            <img
                v-else
                src="../../img/no-image.jpeg"
                alt=""
                class="rounded-md w-16 h-11 object-cover"
            />
            <div class="ml-4 items-center">
                <div v-if="job.featured">
                    <span
                        :style="`color: ${job.color};`"
                        :class="['font-medium flex items-center gap-1']"
                    >
                        {{ job.title }}
                    </span>
                    <span class="text-gray-500 text-sm flex items-center gap-1"
                        >{{ job.user.name }} {{ job.user.last_name }}
                    </span>
                </div>
                <div v-else>
                    <h1 class="font-medium">{{ job.title }}</h1>
                    <p class="text-gray-500 text-sm">
                        {{ job.user.name }} {{ job.user.last_name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    job: { type: [Array, Object] },
});
</script>
