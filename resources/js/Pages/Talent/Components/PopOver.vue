<template>
    <Transition>
        <div
            class="bg-white rounded-md absolute z-50 w-[22.5rem] md:w-[25.6rem] shadow-lg bottom-[10.8rem] md:bottom-72 h-52 mb-20"
        >
            <slot></slot>
        </div>
    </Transition>
</template>
<script setup>
import { Transition } from "vue";
</script>

<style scoped>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.3s ease-in-out;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
