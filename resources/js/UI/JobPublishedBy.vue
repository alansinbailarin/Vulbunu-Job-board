<template>
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <Link href="#">
                <img src="../../img/nike.jpeg" alt="" class="w-16 rounded-lg" />
            </Link>
            <div class="ml-4 items-center">
                <div v-if="job.featured">
                    <span
                        :class="[
                            `text-${job.color}-600`,
                            'font-medium flex items-center gap-1',
                        ]"
                    >
                        {{ job.title
                        }}<svg
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
                    <p class="text-gray-500 text-sm">{{ job.user.name }}</p>
                </div>
                <div v-else>
                    <h1 class="font-medium">{{ job.title }}</h1>
                    <p class="text-gray-500 text-sm">{{ job.user.name }}</p>
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
