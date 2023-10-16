<template>
    <div
        class="rounded-md text-sm bg-white border max-h-[calc(100vh-8rem)] border-gray-200"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="menu-button"
        tabindex="-1"
    >
        <div
            v-if="props.user?.notifications?.length > 0"
            v-for="notification in notifications"
            :key="notification.id"
        >
            <div
                class="px-4 py-2 text-gray-500"
                :class="{
                    'bg-gray-100 ': !notification.read_at,
                }"
            >
                <Link
                    :href="notification.data.url"
                    @click="markNotificationAsReaded(notification.id)"
                >
                    <span class="font-medium text-gray-600">{{
                        notification.data.sender
                    }}</span>
                    {{ notification.data.message }}
                </Link>
                <p class="font-medium text-gray-700">
                    {{ moment(notification.created_at).fromNow() }}
                </p>
            </div>
        </div>
        <div v-else>
            <div class="px-4 py-2">
                <h1 class="text-sm font-semibold text-gray-600">We sorry</h1>
                <p class="text-sm leading-5 text-gray-500">
                    There seems to be no notification here
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, router } from "@inertiajs/vue3";
import moment from "moment";
import { computed } from "vue";

moment.locale("en");
let notificationCount = 0;

const props = defineProps({
    user: Object,
});

const notifications = computed((count) => {
    return props.user?.notifications.slice(0, count);
});

const markNotificationAsReaded = (id) => {
    router.put(route("notification-readed", { id }), {
        preserveScroll: true,
    });
};
</script>
