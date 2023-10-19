<template>
    <header
        :class="{
            'bg-white': !isTransparent,
            'bg-white bg-opacity-80 backdrop-filter backdrop-blur transition-all duration-300 ease-in-out bg-gradient-to-t from-transparent via-transparent to-white':
                isTransparent,
        }"
        class="bg-white shadow-sm sticky top-0 z-20 w-full"
    >
        <div class="container mx-auto">
            <nav class="md:flex md:items-center md:justify-between p-4">
                <div
                    class="max-w-screen-xl md:hidden flex flex-wrap items-center justify-between mx-auto"
                >
                    <Link href="/" class="" @click="isMenuOpen = false"
                        ><img src="../../img/logo.png" alt="" class="w-24"
                    /></Link>
                    <div class="md:hidden flex items-center">
                        <div class="relative" v-if="props.user">
                            <button
                                type="button"
                                @click="toggleNotifications()"
                                class="relative inline-flex items-center p-3 text-sm font-medium text-center text-gray-600"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="22"
                                    height="22"
                                    fill="currentColor"
                                    class="bi bi-bell-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"
                                    />
                                </svg>
                                <div
                                    v-if="props.user?.notifications?.length > 0"
                                    class="absolute inline-flex items-center justify-center w-5 h-5 text-[0.60rem] text-white rounded-full top-0.5 right-1 border border-white"
                                    :class="{
                                        'bg-transparent':
                                            manageNotificationsCount === 0,
                                        'bg-red-500':
                                            manageNotificationsCount !== 0,
                                    }"
                                >
                                    {{
                                        manageNotificationsCount !== 0
                                            ? manageNotificationsCount
                                            : ""
                                    }}
                                </div>
                            </button>
                            <Notifications
                                @click="notificationsOpen = false"
                                :user="props.user"
                                class="absolute right-0 z-10 mt-2 w-72 origin-top-right overflow-y-auto"
                                v-show="notificationsOpen"
                            />
                        </div>
                        <button
                            @click="toggleMenu"
                            type="button"
                            class="inline-flex items-center p-2 ml-1 text-sm text-gray-700"
                        >
                            <svg
                                v-if="!isMenuOpen"
                                xmlns="http://www.w3.org/2000/svg"
                                width="29"
                                height="29"
                                fill="currentColor"
                                class="bi bi-list"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
                                />
                            </svg>
                            <svg
                                v-else
                                xmlns="http://www.w3.org/2000/svg"
                                width="29"
                                height="29"
                                fill="currentColor"
                                class="bi bi-x"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                                />
                            </svg>
                        </button>
                    </div>
                    <Transition
                        ><div
                            v-show="isMenuOpen"
                            class="w-full md:block md:w-auto transition-all duration-500 ease-in-out"
                        >
                            <ul
                                class="flex flex-col md:p-0 mt-2 md:flex-row p-2"
                            >
                                <li>
                                    <Link
                                        href="/"
                                        class="text-base py-3 px-4 flex"
                                        :class="{
                                            'text-blue-500': $page.url === '/',
                                        }"
                                        @click="isMenuOpen = false"
                                        >Home</Link
                                    >
                                </li>
                                <li>
                                    <Link
                                        href="/jobs"
                                        class="text-base py-3 px-4 flex"
                                        :class="{
                                            'text-blue-500':
                                                $page.url.includes('/jobs'),
                                        }"
                                        @click="isMenuOpen = false"
                                        >Jobs</Link
                                    >
                                </li>
                                <li>
                                    <Link
                                        href="/talents"
                                        class="text-base py-2 px-4 flex"
                                        :class="{
                                            'text-blue-500':
                                                $page.url.includes('/talents'),
                                        }"
                                        @click="isMenuOpen = false"
                                        >Talents</Link
                                    >
                                </li>
                                <!-- <li>
                                    <Link
                                        href="#"
                                        class="text-base py-2 px-4 flex"
                                        :class="{
                                            'text-blue-500':
                                                $page.url === '/alertas',
                                        }"
                                        @click="isMenuOpen = false"
                                        >Alertas</Link
                                    >
                                </li> -->
                                <li>
                                    <Link
                                        href="#"
                                        class="text-base py-2 px-4 flex border-b border-gray-100"
                                        :class="{
                                            'text-blue-500':
                                                $page.url === '/salarios',
                                        }"
                                        @click="isMenuOpen = false"
                                        >Salaries</Link
                                    >
                                </li>
                                <div v-if="user" class="py-2 px-4 text-base">
                                    <Link
                                        :href="`/talents/${user.slug}`"
                                        @click="isMenuOpen = false"
                                        class="text-gray-700 font-normal my-2"
                                    >
                                        {{ user.name }} {{ user.last_name }}
                                        <p
                                            class="text-gray-500 font-medium text-xs"
                                        >
                                            {{ user.email }}
                                        </p>
                                    </Link>
                                    <div class="my-2">
                                        <Link
                                            href="/user-account/configuration"
                                            @click="isMenuOpen = false"
                                            class="text-gray-700 font-normal"
                                            >Settings</Link
                                        >
                                    </div>
                                    <!-- <div class="my-2">
                                        <Link
                                            href="/dashboard"
                                            @click="isMenuOpen = false"
                                            class="text-gray-700 font-normal"
                                            >Dashboard</Link
                                        >
                                    </div> -->
                                    <div
                                        class="my-2"
                                        v-if="
                                            props.user.applications.length > 0
                                        "
                                    >
                                        <Link
                                            href="/my-applications"
                                            @click="isMenuOpen = false"
                                            class="text-gray-700 font-normal"
                                            >My applications</Link
                                        >
                                    </div>
                                    <div
                                        class="my-2"
                                        v-if="props.user.userJobs.length > 0"
                                    >
                                        <Link
                                            href="/my-published-jobs"
                                            @click="isMenuOpen = false"
                                            class="text-gray-700 font-normal"
                                            >My jobs</Link
                                        >
                                    </div>
                                    <div class="mt-3 font-normal">
                                        <Link
                                            class="font-normal text-gray-700"
                                            href="/logout"
                                            method="DELETE"
                                            as="button"
                                            >Log Out</Link
                                        >
                                    </div>
                                </div>
                                <div v-else>
                                    <li>
                                        <Link
                                            href="/login"
                                            class="text-base py-2 px-4 flex"
                                            :class="{
                                                'text-blue-500':
                                                    $page.url === '/salarios',
                                            }"
                                            >Log in</Link
                                        >
                                    </li>
                                    <li>
                                        <Link
                                            href="/user-account/create"
                                            class="text-base py-2 px-4 flex"
                                            :class="{
                                                'text-blue-500':
                                                    $page.url ===
                                                    '/user-account/create',
                                            }"
                                            >Sign Up</Link
                                        >
                                    </li>
                                </div>
                            </ul>
                            <div class="w-full px-6 py-3 text-center">
                                <Link
                                    class="block bg-gray-100 w-full py-3 px-4 rounded-md text-gray-700 hover:bg-gray-200 transition duration-200 ease-in-out font-semibold"
                                    href="#"
                                >
                                    Hire talent
                                </Link>
                            </div>
                        </div>
                    </Transition>
                </div>
                <div class="text-xl font-bold hidden md:block">
                    <Link href="/" class="">
                        <img src="../../img/logo.png" alt="" class="w-28" />
                    </Link>
                </div>
                <div class="flex-row gap-8 text-sm font-medium hidden md:flex">
                    <Link
                        href="/"
                        :class="{ 'text-blue-500': $page.url === '/' }"
                        >Home</Link
                    >
                    <Link
                        href="/jobs"
                        :class="{
                            'text-blue-500': $page.url.includes('/jobs'),
                        }"
                        >Jobs</Link
                    >
                    <Link
                        href="/talents"
                        :class="{
                            'text-blue-500': $page.url.includes('/talents'),
                        }"
                        >Talents</Link
                    >
                    <!-- <Link href="#">Alertas</Link> -->
                    <Link href="#">Salaries</Link>
                </div>
                <div
                    class="hidden md:flex flex-row gap-4 text-sm items-center font-medium"
                >
                    <div class="relative" v-if="props.user">
                        <button
                            type="button"
                            @click="toggleNotifications()"
                            class="relative inline-flex items-center p-3 text-sm font-medium text-center text-gray-600"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="22"
                                height="22"
                                fill="currentColor"
                                class="bi bi-bell-fill"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"
                                />
                            </svg>
                            <div
                                v-if="props.user?.notifications?.length > 0"
                                class="absolute inline-flex items-center justify-center w-6 h-6 text-[0.70rem] text-white rounded-full top-0 right-0.5"
                                :class="{
                                    'bg-transparent':
                                        manageNotificationsCount === 0,
                                    'bg-red-500 border border-white':
                                        manageNotificationsCount !== 0,
                                }"
                            >
                                {{
                                    manageNotificationsCount !== 0
                                        ? manageNotificationsCount
                                        : ""
                                }}
                            </div>
                        </button>
                        <Notifications
                            @click="notificationsOpen = false"
                            :user="props.user"
                            class="absolute right-0 z-10 mt-2 w-72 origin-top-right overflow-y-auto"
                            v-show="notificationsOpen"
                        />
                    </div>
                    <div v-if="user" class="mr-2">
                        <button
                            @click="showUserMenu = !showUserMenu"
                            class="text-gray-700 flex items-center gap-2 hover:text-gray-600 transition-all ease-in-out duration-500"
                        >
                            {{ user.name }}
                            {{ user.last_name }}
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="13"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-down"
                                :class="{
                                    'transform rotate-180': showUserMenu,
                                }"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
                                />
                            </svg>
                        </button>
                        <Transition v-on-click-outside="closeMenu"
                            ><div
                                v-show="showUserMenu"
                                class="absolute transition-all ease-in-out duration-300 bg-white w-[13rem] py-3 rounded-md shadow-md p-2 mt-2"
                            >
                                <Link
                                    :href="`/talents/${user.slug}`"
                                    @click="isMenuOpen = false"
                                    class="text-gray-700 font-normal mt-2"
                                >
                                    {{ user.name }} {{ user.last_name }}
                                    <p
                                        class="text-gray-500 font-medium text-xs"
                                    >
                                        {{ user.email }}
                                    </p>
                                </Link>
                                <hr class="my-2" />
                                <div class="my-2">
                                    <Link
                                        href="/user-account/configuration"
                                        class="text-gray-700 font-normal"
                                        @click="showUserMenu = false"
                                        >Settings</Link
                                    >
                                </div>
                                <!-- <div class="my-2">
                                    <Link
                                        href="/dashboard"
                                        class="text-gray-700 font-normal"
                                        @click="showUserMenu = false"
                                        >Dashboard</Link
                                    >
                                </div> -->
                                <div
                                    class="my-2"
                                    v-if="props.user.applications.length > 0"
                                >
                                    <Link
                                        href="/my-applications"
                                        class="text-gray-700 font-normal"
                                        @click="showUserMenu = false"
                                        >My applications</Link
                                    >
                                </div>
                                <div
                                    class="my-2"
                                    v-if="props.user.userJobs.length > 0"
                                >
                                    <Link
                                        href="/my-published-jobs"
                                        class="text-gray-700 font-normal"
                                        @click="showUserMenu = false"
                                        >My jobs</Link
                                    >
                                </div>
                                <hr class="my-2" />
                                <div class="mt-2 font-normal">
                                    <Link
                                        class="font-normal text-gray-700"
                                        href="/logout"
                                        method="DELETE"
                                        as="button"
                                        >Log Out</Link
                                    >
                                </div>
                            </div></Transition
                        >
                    </div>
                    <Link
                        class="bg-gray-100 rounded-md text-gray-700 px-4 py-2 hover:bg-gray-200 transition duration-200 ease-in-out font-semibold"
                        href="/talents"
                        >Hire talent</Link
                    >
                    <div v-if="!user">
                        <Link
                            class="bg-blue-600 rounded-md text-white px-4 py-2 hover:bg-blue-700 transition duration-200 ease-in-out font-semibold"
                            href="/login"
                            >Log In</Link
                        >
                        <Link
                            class="px-4 py-2 rounded-md text-gray-700 hover:text-gray-500 transition-all duration-300 ease-in-out font-semibold"
                            href="/user-account/create"
                            >Sign Up</Link
                        >
                    </div>
                </div>
            </nav>
        </div>
    </header>
</template>

<script setup>
import { Link, router } from "@inertiajs/vue3";
import { ref, onMounted, Transition, computed, onBeforeMount } from "vue";
import { vOnClickOutside } from "@vueuse/components";
import Notifications from "./Notifications.vue";

const isMenuOpen = ref(false);
const notificationsOpen = ref(false);
const isTransparent = ref(false);
const showUserMenu = ref(false);

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const manageNotificationsCount = computed(() => {
    if (!props.user?.notifications) {
        return 0;
    }

    const unreadNotifications = props.user.notifications.filter(
        (notification) => notification.read_at === null
    );

    if (unreadNotifications.length >= 9) {
        return "+9";
    }

    return unreadNotifications.length;
});

const resetNotificationsCount = () => {
    router.put(route("reset-notifications"), {
        preserveScroll: true,
    });
};

const toggleNotifications = () => {
    notificationsOpen.value = !notificationsOpen.value;
};

const closeMenu = () => {
    showUserMenu.value = false;
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
});

const handleScroll = () => {
    const scrollPosition =
        window.pageYOffset || document.documentElement.scrollTop;
    const threshold = 50; // Ajusta este valor según tus necesidades

    isTransparent.value = scrollPosition > threshold;
};

const props = defineProps({
    user: Object,
});

onBeforeMount(() => {
    if (props.user) {
        window.Echo.private(`App.Models.User.${props.user.id}`).notification(
            (notification) => {}
        );
    }
});
</script>

<style scoped>
header {
    /* backdrop-filter: none;  Para desactivar el desenfoque en navegadores que no lo admiten */
    transition: background-color 0.5s ease-in-out,
        backdrop-filter 0.3s ease-in-out;
}

.v-enter-active,
.v-leave-active {
    transition: opacity 0.3s ease-in-out;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
