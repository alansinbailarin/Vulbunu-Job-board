<template>
    <ul class="space-y-2">
        <li v-for="item in sidebarItems" :key="item.title" :href="item.link">
            <h1 class="mb-2 text-sm text-gray-500 font-light">
                {{ item.parent.parentTitle }}
            </h1>
            <ul class="space-y-2">
                <Link
                    v-for="child in item.parent.child"
                    :key="child.title"
                    :href="child.link"
                >
                    <div class="mb-2">
                        <div
                            :class="{
                                'text-indigo-600 bg-indigo-50 cursor-pointer hover:bg-indigo-100 transition-all ease-in-out duration-300':
                                    $page.url === child.link,
                            }"
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-indigo-100 transition-all ease-in-out duration-300"
                        >
                            <span v-html="child.icon"></span>
                            <span class="ml-3">{{ child.title }}</span>
                        </div>
                    </div>
                </Link>
            </ul>
        </li>
    </ul>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

const sidebarItems = [
    {
        parent: {
            parentTitle: "General",
            child: [
                {
                    title: "Dashboard",
                    icon: `<svg
                        class="w-6 h-6 transition duration-75 group-hover:text-gray-900"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path
                            d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"
                        ></path>
                    </svg>`,
                    link: "/dashboard",
                },
                {
                    title: "Applications",
                    icon: `<svg class="w-6 h-6 transition duration-75 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-collection-fill" viewBox="0 0 16 16">
                            <path d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3m2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1"/>
                            </svg>`,
                    link: "/dashboard/applications",
                },
                {
                    title: "Interviews",
                    icon: `<svg class="w-6 h-6 transition duration-75 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-dots-fill" viewBox="0 0 16 16">
                            <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353zM5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                            </svg>`,
                    link: "/dashboard/interviews",
                },
                {
                    title: "Jobs",
                    icon: `<svg class="w-6 h-6 transition duration-75 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-duffle-fill" viewBox="0 0 16 16">
                            <path d="M5.007 4.097q.011-.146.027-.298c.05-.464.141-.979.313-1.45.169-.465.432-.933.853-1.249 1.115-.836 2.485-.836 3.6 0 .42.316.684.784.853 1.25.171.47.263.985.313 1.449q.016.15.027.298c1.401.194 2.65.531 3.525 1.012 2.126 1.169 1.446 6.095 1.089 8.018a.954.954 0 0 1-.95.772H1.343a.954.954 0 0 1-.95-.772c-.357-1.923-1.037-6.85 1.09-8.018.873-.48 2.123-.818 3.524-1.012M4.05 5.633a22 22 0 0 0-1.565.352l-.091.026-.034.01a.5.5 0 0 0 .282.959l.005-.002.02-.005.08-.023a21 21 0 0 1 1.486-.334A21 21 0 0 1 8 6.25c1.439 0 2.781.183 3.767.367a21 21 0 0 1 1.567.356l.02.005.004.001a.5.5 0 0 0 .283-.959h-.003l-.006-.002-.025-.007a15 15 0 0 0-.43-.113 22 22 0 0 0-1.226-.265A22 22 0 0 0 8 5.25c-1.518 0-2.926.192-3.95.383M6.8 1.9c-.203.153-.377.42-.513.791a5.3 5.3 0 0 0-.265 1.292 35 35 0 0 1 1.374-.076c.866-.022 1.742.003 2.584.076a5.3 5.3 0 0 0-.266-1.292c-.135-.372-.309-.638-.513-.791-.76-.57-1.64-.57-2.4 0Z"/>
                            </svg>`,
                    link: "/dashboard/jobs",
                },
            ],
        },
    },
    {
        parent: {
            parentTitle: "Administration",
            child: [
                {
                    title: "User",
                    icon: `<svg class="w-6 h-6 transition duration-75 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>`,
                    link: "/dashboard/users",
                },
                // Includes countries, states and cities
                {
                    title: "Locations",
                    icon: `<svg class="w-6 h-6 transition duration-75 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                        </svg>`,
                    link: "/dashboard/locations",
                },
                {
                    title: "Roles",
                    icon: `<svg class="w-6 h-6 transition duration-75 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                            </svg>`,
                    link: "/dashboard/roles",
                },
            ],
        },
    },
];
</script>
