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
                        :style="`color: ${job.color}; 
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;
                        -webkit-line-clamp: 2;`"
                        :class="['font-medium flex items-center gap-1']"
                    >
                        {{ job.title }}
                    </span>
                    <span v-if="job.anonymous == 0" class="text-gray-500 text-sm flex items-center gap-1"
                        >{{ job.user.name }} {{ job.user.last_name }}
                        <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="14"
                                    height="14"
                                    fill="currentColor"
                                    class="bi bi-patch-check-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"
                                    />
                                </svg>
                    </span>
                    <span v-else class="text-gray-500 text-sm flex items-center gap-1"
                        >Anonymous publisher
                    </span>
                </div>
                <div v-else>
                    <h1 class="font-medium line-clamp-2">{{ job.title }}</h1>
                    <p v-if="job.anonymous == 0" class="text-gray-500 text-sm">
                        {{ job.user.name }} {{ job.user.last_name }}
                    </p>
                    <p v-else class="text-gray-500 text-sm">
                        Anonymous publisher
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
