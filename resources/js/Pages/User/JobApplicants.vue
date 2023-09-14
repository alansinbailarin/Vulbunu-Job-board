<template>
    <div>
        <Head :title="`Aplicantes de ${job.title}`"> </Head>
    </div>
    <div class="container my-1 p-4 mx-auto">
        <div class="flex items-center justify-between">
            <div>
                <h1
                    class="text-2xl font-medium"
                    :style="jobTitleColorIfFeatured(job)"
                >
                    {{ job.title }}
                </h1>
            </div>
        </div>

        <h1 class="font-medium text-lg mt-1">Lista de aspirantes</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 md:gap-4 gap-2 my-4">
            <div
                class="rounded-md bg-gradient-to-r from-blue-500 to-blue-700 text-white p-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-semibold">Total</h1>
                    </div>
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            fill="currentColor"
                            class="bi bi-globe2"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-blue-100 text-sm">
                    Conteo total de tus aspirantes.
                </p>
                <div class="mt-2 flex items-center gap-4">
                    <div>
                        <p class="text-3xl">{{ totalAppsCount }}</p>
                    </div>
                    <!-- <div v-if="percentajeTotal > 0.0">
                        <p class="text-2xl font-extralight text-green-400">
                            {{ percentajeTotal.toFixed(1) }} %
                        </p>
                    </div>
                    <div v-else-if="percentajeTotal < 0.0">
                        <p class="text-2xl font-extralight text-red-400">
                            {{ percentajeTotal.toFixed(1) }} %
                        </p>
                    </div> -->
                </div>
            </div>
            <div
                class="rounded-md bg-gradient-to-r from-yellow-500 to-yellow-700 text-white p-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-semibold">Pendientes</h1>
                    </div>
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            fill="currentColor"
                            class="bi bi-question-circle"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                            <path
                                d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-yellow-100 text-sm">
                    Conteo de tus aspirantes pendientes.
                </p>
                <div class="mt-2 flex items-center gap-4">
                    <div>
                        <p class="text-3xl">{{ pendingAppsCount }}</p>
                    </div>
                    <div v-if="percentajePending > 0.0">
                        <p class="text-2xl font-extralight text-green-400">
                            {{ percentajePending.toFixed(1) }} %
                        </p>
                    </div>
                    <div v-else-if="percentajePending < 0.0">
                        <p class="text-2xl font-extralight text-red-400">
                            {{ percentajePending.toFixed(1) }} %
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="rounded-md bg-gradient-to-r from-green-500 to-green-700 text-white p-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-semibold">Aprobadas</h1>
                    </div>
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            fill="currentColor"
                            class="bi bi-check-circle"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                            <path
                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-green-100 text-sm">
                    Conteo de tus aspirantes aprobados.
                </p>
                <div class="mt-2 flex items-center gap-4">
                    <div>
                        <p class="text-3xl">{{ approvedAppsCount }}</p>
                    </div>
                    <div v-if="percentajeApproved > 0.0">
                        <p class="text-2xl font-extralight text-green-400">
                            {{ percentajeApproved.toFixed(1) }} %
                        </p>
                    </div>
                    <div v-else-if="percentajeApproved < 0.0">
                        <p class="text-2xl font-extralight text-red-400">
                            {{ percentajeApproved.toFixed(1) }} %
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="rounded-md bg-gradient-to-r from-red-500 to-red-700 text-white p-4"
            >
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-semibold">Rechazadas</h1>
                    </div>
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="19"
                            height="19"
                            fill="currentColor"
                            class="bi bi-x-circle"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                            />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-red-100 text-sm">
                    Conteo de tus aspirantes rechazados.
                </p>
                <div class="mt-2 flex items-center gap-4">
                    <div>
                        <p class="text-3xl">{{ rejectedAppsCount }}</p>
                    </div>
                    <div v-if="percentajeRejected > 0.0">
                        <p class="text-2xl font-extralight text-green-400">
                            {{ percentajeRejected.toFixed(1) }} %
                        </p>
                    </div>
                    <div v-else-if="percentajeRejected < 0.0">
                        <p class="text-2xl font-extralight text-red-400">
                            {{ percentajeRejected.toFixed(1) }} %
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div
            v-if="job.applicant.length > 0"
            class="grid grid-cols-1 md:grid-cols-3 md:gap-4 gap-2 my-4"
        >
            <Box v-for="applicant in job.applicant">
                <div class="flex items-center justify-between">
                    <div>
                        <a
                            :href="`/talents/${applicant.user?.username}`"
                            class="text-sm font-semibold text-gray-700"
                        >
                            {{ applicant.user.name }}
                            {{ applicant.user.last_name }}
                        </a>
                    </div>
                    <div class="items-center flex">
                        <span :class="getStatusColor(applicant.status)">{{
                            changeStatusText(applicant.status)
                        }}</span>
                        <div
                            class="relative inline-block text-left pt-0.5 ml-1"
                        >
                            <div>
                                <button
                                    @click="toggleDropdown(applicant)"
                                    type="button"
                                    class="inline-flex w-full justify-center gap-x-1.5 text-gray-900"
                                    id="menu-button"
                                    aria-expanded="true"
                                    aria-haspopup="true"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-three-dots-vertical"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"
                                        />
                                    </svg>
                                </button>
                            </div>
                            <div
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white border border-gray-200"
                                v-show="applicant.dropdownOpen"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="menu-button"
                                tabindex="-1"
                            >
                                <div class="" role="none">
                                    <button
                                        type="submit"
                                        @click="
                                            updateApplicationStatus(
                                                applicant,
                                                'approved'
                                            )
                                        "
                                        :disabled="
                                            applicant.status != 'pending'
                                        "
                                        class="w-full text-left text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 transition duration-200 ease-in-out"
                                        :class="{
                                            'bg-gray-50 ':
                                                applicant.status != 'pending',
                                        }"
                                    >
                                        Aprobar aplicación
                                    </button>
                                    <button
                                        type="submit"
                                        @click="
                                            updateApplicationStatus(
                                                applicant,
                                                'rejected'
                                            )
                                        "
                                        :disabled="
                                            applicant.status != 'pending'
                                        "
                                        class="w-full text-left text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 transition duration-200 ease-in-out"
                                        :class="{
                                            'bg-gray-50 ':
                                                applicant.status != 'pending',
                                        }"
                                    >
                                        Rechazar aplicación
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p
                        v-if="applicant.user?.job_title"
                        class="text-sm text-gray-600 font-medium"
                    >
                        {{ applicant.user?.job_title }}
                    </p>
                    <p v-else class="text-sm text-gray-600 font-medium">
                        Aplicante sin titulo
                    </p>
                    <p
                        v-if="applicant.user?.about_me"
                        class="mt-2 text-gray-600 text-xs"
                    >
                        {{ applicant.user?.about_me }}
                    </p>
                    <p v-else class="mt-2 text-gray-600 text-xs">
                        Este usuario no cuenta con una descripcion de perfil.
                    </p>
                </div>
                <div class="mt-2">
                    <p class="text-gray-400 text-xs">
                        Aplicó el
                        {{
                            moment(applicant?.created_at).format(
                                "D [de] MMMM [del] YYYY"
                            )
                        }}
                    </p>
                </div>
                <div class="mt-3 flex text-sm gap-2">
                    <button
                        @click="toggleModal(applicant)"
                        v-if="applicant.interviews?.length === 0"
                        class="text-center bg-indigo-600 text-white py-1.5 rounded-md font-semibold text-sm"
                        :class="applicant.user?.cv ? 'w-1/2' : 'w-full'"
                    >
                        Agendar entrevista
                    </button>
                    <button
                        v-else
                        disabled
                        class="text-center bg-indigo-300 text-white py-1.5 rounded-md font-semibold text-sm"
                        :class="applicant.user?.cv ? 'w-1/2' : 'w-full'"
                    >
                        Entrevista agendada
                    </button>
                    <button
                        @click="downloadCV(applicant.user?.cv)"
                        v-if="applicant.user?.cv"
                        class="w-1/2 text-center border border-dashed border-indigo-500 py-1.5 rounded-md text-indigo-500 font-medium text-sm"
                    >
                        Descargar cv
                    </button>
                </div>
                <div
                    v-show="applicant.isOpen"
                    class="fixed inset-0 flex items-center justify-center z-50"
                >
                    <!-- Fondo obscuro -->
                    <div
                        @click="toggleModal(applicant)"
                        class="fixed inset-0 bg-black opacity-50"
                    ></div>

                    <!-- Contenido del modal -->
                    <div
                        class="bg-white w-full md:w-1/2 p-4 mx-4 rounded-md relative"
                    >
                        <!-- Botón para cerrar el modal -->
                        <button
                            @click="toggleModal(applicant)"
                            class="absolute text-lg cursor-pointer top-2 right-2 text-gray-600 hover:bg-gray-100 rounded-md"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                class="bi bi-x"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                                />
                            </svg>
                        </button>

                        <!-- Contenido del modal -->
                        <h1 class="font-medium text-gray-700">
                            {{ applicant.user?.name }}
                            {{ applicant.user?.last_name }}
                        </h1>
                        <p class="text-sm text-gray-500">
                            {{
                                form.interview_type === "virtual"
                                    ? "Crea un link de https://meet.google.com/ para que el aplicante pueda acceder el dia de la entrevista."
                                    : "Accede a https://maps.google.com/ busca la dirección en la que el aplicante se debe de presentar para la entrevista."
                            }}
                        </p>
                        <form class="mt-2" @submit.prevent="publish">
                            <div
                                class="overflow-y-auto h-[26rem] grid grid-cols-1 md:grid-cols-2 gap-3"
                            >
                                <div class="col-span-2 md:col-span-1">
                                    <label
                                        for="interview_type"
                                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                        >Tipo de entrevista</label
                                    >
                                    <select
                                        id="interview_type"
                                        v-model="form.interview_type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                                    >
                                        <option value="presential">
                                            Presencial
                                        </option>
                                        <option value="virtual">Virtual</option>
                                    </select>
                                    <div
                                        v-if="form.errors.interview_type"
                                        class="px-2 py-2 rounded-md"
                                    >
                                        <div class="flex items-center">
                                            <div>
                                                <p
                                                    class="text-sm text-red-600 text-left"
                                                >
                                                    {{
                                                        form.errors
                                                            .interview_type
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2 md:col-span-1">
                                    <label
                                        for="interview_link"
                                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                        >Enlace para la entrevista
                                    </label>
                                    <input
                                        id="interview_link"
                                        v-model="form.interview_link"
                                        type="text"
                                        autocomplete="link"
                                        :placeholder="
                                            form.interview_type === 'virtual'
                                                ? 'https://meet.google.com/...'
                                                : 'https://maps.google.com/...'
                                        "
                                        class="w-full text-sm px-5 bg-gray-50 placeholder:text-gray-300 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                                    />
                                    <div
                                        v-if="form.errors.interview_link"
                                        class="px-2 py-2 rounded-md"
                                    >
                                        <div class="flex items-center">
                                            <div>
                                                <p
                                                    class="text-sm text-red-600 text-left"
                                                >
                                                    {{
                                                        form.errors
                                                            .interview_link
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2 md:col-span-1">
                                    <label
                                        for="interview_date"
                                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                        >Fecha y hora de la entrevista</label
                                    >
                                    <input
                                        id="interview_date"
                                        v-model="form.interview_date"
                                        type="datetime-local"
                                        class="w-full text-sm px-5 bg-gray-50 py-2.5 placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                                    />
                                    <div
                                        v-if="form.errors.interview_date"
                                        class="px-2 py-2 rounded-md"
                                    >
                                        <div class="flex items-center">
                                            <div>
                                                <p
                                                    class="text-sm text-red-600 text-left"
                                                >
                                                    {{
                                                        form.errors
                                                            .interview_date
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2 md:col-span-1">
                                    <label
                                        for="interview_duration"
                                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                        >Duración de la entrevista</label
                                    >
                                    <select
                                        id="interview_duration"
                                        v-model="form.interview_duration"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full py-2.5"
                                    >
                                        <option value="00:30:00">
                                            30 minutos
                                        </option>
                                        <option value="01:00:00">1 hora</option>
                                        <option value="01:30:00">
                                            1 hora 30 minutos
                                        </option>
                                        <option value="02:00:00">
                                            2 horas
                                        </option>
                                    </select>
                                    <div
                                        v-if="form.errors.interview_duration"
                                        class="px-2 py-2 rounded-md"
                                    >
                                        <div class="flex items-center">
                                            <div>
                                                <p
                                                    class="text-sm text-red-600 text-left"
                                                >
                                                    {{
                                                        form.errors
                                                            .interview_duration
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                    <label
                                        for="interview_observation"
                                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                        >Observaciones para la entrevista</label
                                    >
                                    <textarea
                                        name="interview_observation"
                                        id="interview_observation"
                                        v-model="form.interview_observation"
                                        cols="30"
                                        rows="7"
                                        class="w-full text-sm placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600 bg-gray-50"
                                        placeholder="Por favor, llegar 30 minutos antes a la entrevista para poder realizar el proceso de registro..."
                                    ></textarea>
                                    <div
                                        v-if="form.errors.interview_observation"
                                        class="px-2 py-2 rounded-md"
                                    >
                                        <div class="flex items-center">
                                            <div>
                                                <p
                                                    class="text-sm text-red-600 text-left"
                                                >
                                                    {{
                                                        form.errors
                                                            .interview_observation
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-span-2">
                                    <label
                                        for="interview_feedback"
                                        class="flex items-center mb-2 text-sm font-medium text-gray-700"
                                        >Comentarios acerca de la
                                        entrevista</label
                                    >
                                    <textarea
                                        name="interview_feedback"
                                        id="interview_feedback"
                                        v-model="form.interview_feedback"
                                        cols="30"
                                        rows="7"
                                        class="w-full text-sm placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600 bg-gray-50"
                                        placeholder="El aplicante llego 1 hora tarde a la entrevista..."
                                    ></textarea>
                                </div> -->
                            </div>
                            <div class="mt-6">
                                <Button
                                    type="submit"
                                    :class="{
                                        'opacity-25':
                                            form.processing || !form.isDirty,
                                    }"
                                    :disabled="form.processing || !form.isDirty"
                                    class="w-full bg-indigo-600 text-white py-1.5 rounded-md font-semibold"
                                    >Agendar entrevista</Button
                                >
                            </div>
                        </form>
                    </div>
                </div>
                <Link
                    :href="`/my-applications/interview/${applicant.interviews[0].id}/edit`"
                    class="w-full inline-block text-center mt-3 text-blue-500 underline text-sm"
                    v-if="applicant.interviews?.length > 0"
                >
                    Informacion de entrevista
                </Link>
            </Box>
        </div>
        <div
            v-else
            class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center mt-5"
        >
            <div>
                <h1 class="text-4xl font-semibold">
                    Ups, parece que todavía no hay ningún aplicante...
                </h1>
                <p class="mt-2 text-gray-500 text-lg">
                    No te preocupes, pronto comenzarán a llegar aplicantes
                    interesados en tu oferta laboral. ¡Mantén la expectativa!
                </p>
            </div>
            <div>
                <img
                    src="../../../img/astronaut.png"
                    alt=""
                    class="w-72 mx-auto"
                />
            </div>
        </div>
    </div>
</template>
<script setup>
import { Head, useForm, router, Link } from "@inertiajs/vue3";
import Box from "@/UI/Box.vue";
import moment from "moment";
import "moment/dist/locale/es";
import { ref, computed } from "vue";

const props = defineProps({
    job: Object,
    totalAppsCount: Number,
    pendingAppsCount: Number,
    approvedAppsCount: Number,
    rejectedAppsCount: Number,
    percentajeTotal: Number,
    percentajePending: Number,
    percentajeApproved: Number,
    percentajeRejected: Number,
});

console.log(props.job.applicant);

const form = useForm({
    applicant_id: "",
    interview_type: "presential",
    interview_link: "",
    interview_date: "",
    interview_duration: "00:30:00",
    interview_observation: "",
});

const isOpen = ref(false);
const dropdownOpen = ref(false);

const publish = () => {
    form.post(route("create-interview"));
};

const updateApplicationStatus = (appplicant, status) => {
    form.put(
        route("update-application-status", {
            applicant: appplicant.id,
            status: status,
        })
    );
};

const toggleModal = (applicant) => {
    form.applicant_id = applicant.id;
    applicant.isOpen = !applicant.isOpen;
};

const toggleDropdown = (applicant) => {
    form.applicant_id = applicant.id;
    applicant.dropdownOpen = !applicant.dropdownOpen;
};

const jobTitleColorIfFeatured = (job) => {
    if (job.featured === 1) {
        return `color: ${job.color};`;
    }
};

const getStatusColor = (status) => {
    if (status === "pending") {
        return "bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded";
    } else if (status === "approved") {
        return "bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded";
    } else if (status === "rejected") {
        return "bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded";
    } else if (status === "cancelled") {
        return "bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded";
    }
};

const changeStatusText = (status) => {
    if (status === "pending") {
        return "Pendiente";
    } else if (status === "approved") {
        return "Aprobado";
    } else if (status === "rejected") {
        return "Rechazado";
    } else if (status === "cancelled") {
        return "Cancelado";
    }
};

const downloadCV = (url) => {
    fetch(url)
        .then((response) => response.blob())
        .then((blob) => {
            const blobUrl = window.URL.createObjectURL(new Blob([blob]));
            const fileName = url.split("/").pop();
            const link = document.createElement("a");
            link.href = blobUrl;
            link.setAttribute("download", fileName);
            document.body.appendChild(link);
            link.click();
            link.remove();
        });
};
</script>
<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>
