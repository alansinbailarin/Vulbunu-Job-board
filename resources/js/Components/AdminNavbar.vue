<template>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button
                        @click="toggleSidebar"
                        type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100"
                    >
                        <svg
                            class="w-6 h-6"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                            ></path>
                        </svg>
                    </button>
                    <Link href="/" class="flex ml-2 md:mr-24">
                        <img
                            src="../../img/logo.png"
                            class="h-8 mr-3"
                            alt="Vulbunu logo"
                        />
                    </Link>
                </div>
                <div></div>
            </div>
        </div>
    </nav>

    <aside
        v-show="sidebarOpen"
        class="z-40 w-64 h-screen pt-20 transition-transform bg-white border-r border-gray-200"
    >
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ProfileItem :user="props.user" />
            <SidebarItemList />
        </div>
    </aside>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { defineEmits, defineProps, ref, Transition } from "vue";
import SidebarItemList from "../Pages/Admin/components/SidebarItemList.vue";
import ProfileItem from "../Pages/Admin/components/ProfileItem.vue";

const props = defineProps({
    user: Object,
});

const sidebarOpen = ref(false);
const userMenuOpen = ref(false);

const toggleSidebar = () => {
    sidebarOpen.value = !sidebarOpen.value;
};

const toggleUserMenu = () => {
    userMenuOpen.value = !userMenuOpen.value;
};
</script>

<style scoped>
.outer,
.inner {
    background: #eee;
    padding: 30px;
    min-height: 100px;
}

.inner {
    background: #ccc;
}

.nested-enter-active,
.nested-leave-active {
    transition: all 0.3s ease-in-out;
}
/* delay leave of parent element */
.nested-leave-active {
    transition-delay: 0.15s;
}

.nested-enter-from,
.nested-leave-to {
    transform: translateX(-30px);
    opacity: 0;
}

/* we can also transition nested elements using nested selectors */
.nested-enter-active .inner,
.nested-leave-active .inner {
    transition: all 0.3s ease-in-out;
}
/* delay enter of nested element */
.nested-enter-active .inner {
    transition-delay: 0.25s;
}

.nested-enter-from .inner,
.nested-leave-to .inner {
    transform: translateX(30px);
    /*
  	Hack around a Chrome 96 bug in handling nested opacity transitions.
    This is not needed in other browsers or Chrome 99+ where the bug
    has been fixed.
  */
    opacity: 0.001;
}
</style>
