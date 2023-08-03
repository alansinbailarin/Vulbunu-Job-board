<template>
    <div class="fixed w-full">
        <TransitionGroup
            class="right-4 md:top-24 md:right-24 z-50 w-full max-w-xs"
            enter-from-class="translate-y-full opacity-0"
            enter-active-class="duration-500"
            leave-active-class="duration-500"
            leave-to-class="translate-y-full opacity-0"
        >
            <ToastListItem
                v-if="page.props.flash.success"
                :message="page.props.flash.success"
            />
        </TransitionGroup>
    </div>
</template>
<script setup>
import ToastListItem from "./ToastListItem.vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
</script>
