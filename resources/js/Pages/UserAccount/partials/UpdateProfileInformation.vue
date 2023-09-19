<template>
    <div class="p-4 bg-white rounded-md">
        <h1 class="font-semibold text-xl mb-2">Profile information</h1>
        <form @submit.prevent="updateProfileInformation" class="">
            <div class="flex flex-col items-center gap-4">
                <input
                    ref="photoInput"
                    type="file"
                    class="hidden"
                    @change="updatePhotoPreview"
                />
                <div class="relative">
                    <div v-show="!photoPreview" class="mt-2">
                        <img
                            v-if="user.avatar"
                            name="avatar"
                            :src="user.avatar"
                            :alt="user.name"
                            class="rounded-full h-28 w-28 object-cover"
                        />
                        <img
                            v-else
                            src="../../../../img/no-image.jpeg"
                            alt=""
                            class="rounded-full h-28 w-28 object-cover"
                        />
                    </div>
                    <div v-show="photoPreview" class="mt-2">
                        <span
                            class="block rounded-full w-28 h-28 bg-cover bg-no-repeat bg-center"
                            :style="
                                'background-image: url(\'' +
                                photoPreview +
                                '\');'
                            "
                        ></span>
                    </div>
                    <button
                        type="button"
                        @click.prevent="selectNewPhoto"
                        class="absolute bottom-0 py-2 font-semibold opacity-50 bg-white text-xs w-full left-1/2 transform -translate-x-1/2"
                    >
                        Change
                    </button>
                </div>

                <button
                    v-if="user.avatar"
                    class="mt-2 border-2 border-red-500 hover:bg-red-50 transition-all ease-in-out duration-150 px-3 py-1 rounded-md text-red-500 text-sm"
                    @click="showDeleteAlert('avatar')"
                >
                    Delete image
                </button>
                <div v-if="form.errors.avatar" class="px-2 py-2 rounded-md">
                    <div class="flex items-center">
                        <div>
                            <p class="text-sm text-red-600 text-left">
                                {{ form.errors.avatar }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:grid grid-cols-2 gap-4 mt-6">
                <div>
                    <div class="mb-1.5">
                        <label for="name" value="Name">Name </label>
                        <input
                            id="name"
                            v-model="form.name"
                            type="text"
                            autocomplete="name"
                            placeholder="Miguel"
                            class="w-full my-1 text-sm px-5 bg-gray-50 placeholder:text-gray-300 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                        />
                        <div
                            v-if="form.errors.name"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1.5">
                        <label for="username" value="User Name"
                            >User name</label
                        >
                        <input
                            id="username"
                            v-model="form.username"
                            type="text"
                            placeholder="destructor30029"
                            class="w-full my-1 text-sm px-5 placeholder:text-gray-300 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                        />
                        <div
                            v-if="form.errors.username"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.username }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-1.5">
                        <label for="birthdate" value="birthdate"
                            >Birth date</label
                        >
                        <input
                            id="birthdate"
                            v-model="form.birthdate"
                            type="date"
                            placeholder="Birth date"
                            class="w-full my-1 text-sm px-5 bg-gray-50 py-2.5 placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                            autocomplete="birthdate"
                        />
                        <div
                            v-if="form.errors.birthdate"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.birthdate }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1.5">
                        <label for="linkedin" value="linkedin"
                            >Linkedin url</label
                        >
                        <input
                            id="linkedin"
                            v-model="form.linkedin"
                            type="url"
                            placeholder="https://www.linkedin.com/in/user"
                            class="w-full my-1 text-sm px-5 bg-gray-50 py-2.5 placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                            autocomplete="linkedin"
                        />
                        <div
                            v-if="form.errors.linkedin"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.linkedin }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1.5">
                        <label for="cv" value="cv">Resume</label>
                        <div
                            class="w-full items-center mt-2 text-xs px-2 md:px-0 py-1.5 md:py-0 rounded-md border md:border-none border-gray-200"
                        >
                            <div v-if="props.user.cv" class="">
                                <button
                                    @click.prevent="downloadCV(props.user.cv)"
                                    class="hover:bg-gray-100 mb-1 md:mb-0 mr-4 border border-dashed border-gray-300 text-gray-600 font-medium py-2 px-4 rounded-md inline-flex items-center text-sm transition-all ease-in-out duration-300"
                                >
                                    <svg
                                        class="fill-current w-3 h-3 mr-2"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"
                                        />
                                    </svg>
                                    <span>Download cv</span>
                                </button>
                                <button
                                    @click="showDeleteAlert('cv')"
                                    class="hover:bg-red-50 border mt-1 md:mt-0 border-dashed border-red-300 text-red-600 font-medium py-2 px-4 rounded-md inline-flex items-center text-sm transition-all ease-in-out duration-300"
                                >
                                    <svg
                                        class="fill-current w-3 h-3 mr-2"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"
                                        />
                                    </svg>
                                    <span>Delete cv</span>
                                </button>
                            </div>
                            <div v-else>
                                <input
                                    class="w-full"
                                    type="file"
                                    accept=".pdf"
                                    @input="form.cv = $event.target.files[0]"
                                />
                                <p class="text-[0.6rem] mt-1 text-gray-500">
                                    PDF (Max. 2MB).
                                </p>
                            </div>
                        </div>
                        <div v-if="form.errors.cv" class="px-2 py-2 rounded-md">
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.cv }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mb-1.5">
                        <label for="last_name" value="Last Name">
                            Last name
                        </label>
                        <input
                            id="last_name"
                            v-model="form.last_name"
                            type="text"
                            placeholder="Gutierrez"
                            class="w-full my-1 text-sm px-5 bg-gray-50 py-2.5 placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                            autocomplete="last_name"
                        />
                        <div
                            v-if="form.errors.last_name"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.last_name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1.5">
                        <label for="slug" value="slug">Profile url</label>
                        <div class="relative mb-4 flex flex-wrap items-stretch">
                            <span
                                class="bg-gray-100 items-center whitespace-nowrap rounded-l border border-r-0 border-solid border-neutral-300 px-3 py-1.5 text-center mt-1 font-normal leading-[1.6] text-gray-500 text-sm"
                                >https://vulbunu.com/talents/</span
                            >

                            <input
                                v-model="form.slug"
                                type="text"
                                placeholder="miguelitoff"
                                class="relative m-0 placeholder:text-gray-300 block w-[1px] min-w-0 flex-auto rounded-r border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-1.5 font-normal mt-1 text-sm leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out"
                                id="slug"
                            />
                        </div>
                        <div
                            v-if="form.errors.slug"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.slug }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1.5">
                        <label for="email" value="email">Email</label>
                        <input
                            id="email"
                            v-model="form.email"
                            type="text"
                            placeholder="example@example.com"
                            class="w-full my-1 text-sm px-5 bg-gray-50 py-2.5 placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                            autocomplete="email"
                        />
                        <div
                            v-if="form.errors.email"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.email }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1.5">
                        <label for="job_title" value="job_title"
                            >Job title</label
                        >
                        <input
                            id="job_title"
                            v-model="form.job_title"
                            type="text"
                            placeholder="Software engineer"
                            class="w-full my-1 text-sm px-5 placeholder:text-gray-300 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                            autocomplete="job_title"
                        />
                        <div
                            v-if="form.errors.job_title"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.job_title }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1.5">
                        <label for="phone" value="phone">Phone number</label>
                        <input
                            id="phone"
                            v-model="form.phone"
                            type="tel"
                            placeholder="6632883212"
                            class="w-full my-1 text-sm px-5 bg-gray-50 py-2.5 placeholder:text-gray-300 rounded-md border border-gray-200 focus:ring-1 focus:ring-blue-500 text-gray-600"
                            autocomplete="phone"
                        />
                        <div
                            v-if="form.errors.phone"
                            class="px-2 py-2 rounded-md"
                        >
                            <div class="flex items-center">
                                <div>
                                    <p class="text-sm text-red-600 text-left">
                                        {{ form.errors.phone }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="md:grid grid-cols-3 gap-4">
                        <div class="mt-1">
                            <label
                                for="jobModalities"
                                class="flex items-center mb-2"
                                >Preferred job modality</label
                            >
                            <select
                                id="jobModalities"
                                v-model="form.job_modality_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
                            >
                                <option value="" hidden>
                                    Select a modality
                                </option>

                                <option
                                    v-for="modality in props.jobModalities"
                                    :key="modality.id"
                                    :value="modality.id"
                                >
                                    {{ modality.title }}
                                </option>
                            </select>
                            <div
                                v-if="form.errors.job_modality_id"
                                class="px-2 py-2 rounded-md"
                            >
                                <div class="flex items-center">
                                    <div>
                                        <p
                                            class="text-sm text-red-600 text-left"
                                        >
                                            {{ form.errors.job_modality_id }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-1">
                            <label for="gender" class="flex items-center mb-2"
                                >Gender</label
                            >
                            <select
                                id="gender"
                                v-model="form.gender_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
                            >
                                <option value="" hidden>
                                    Select your gender
                                </option>

                                <option
                                    v-for="gender in props.genders"
                                    :key="gender.id"
                                    :value="gender.id"
                                >
                                    {{ gender.name }}
                                </option>
                            </select>
                            <div
                                v-if="form.errors.gender_id"
                                class="px-2 py-2 rounded-md"
                            >
                                <div class="flex items-center">
                                    <div>
                                        <p
                                            class="text-sm text-red-600 text-left"
                                        >
                                            {{ form.errors.gender_id }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-1">
                            <label
                                for="looking_for_job"
                                class="flex items-center mb-2"
                                >Are you looking for a job?</label
                            >
                            <select
                                id="looking_for_job"
                                v-model="form.looking_for_job"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
                            >
                                <option value="" hidden>
                                    Select an option
                                </option>

                                <option value="1">I'm looking for a job</option>
                                <option value="0">I don't want a job</option>
                            </select>
                            <div
                                v-if="form.errors.looking_for_job"
                                class="px-2 py-2 rounded-md"
                            >
                                <div class="flex items-center">
                                    <div>
                                        <p
                                            class="text-sm text-red-600 text-left"
                                        >
                                            {{ form.errors.looking_for_job }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 mt-2 md:mt-0">
                    <label for="about_me" value="about_me"
                        >Personal information</label
                    >
                    <textarea
                        v-model="form.about_me"
                        name="about_me"
                        id="about_me"
                        placeholder="I am a chemical engineer with 5 years of experience in the pharmaceutical industry..."
                        class="w-full my-1 rounded-md border border-gray-200 bg-gray-50 text-sm placeholder:text-gray-300"
                        cols="100"
                        rows="10"
                    ></textarea>
                    <div
                        v-if="form.errors.about_me"
                        class="px-2 py-2 rounded-md"
                    >
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.about_me }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:flex items-center gap-3 mt-4">
                <button
                    type="submit"
                    class="bg-blue-600 w-full md:w-auto rounded-md px-4 py-2 text-white font-semibold hover:bg-blue-500 transition duration-200 ease-in-out"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Save changes
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm, router } from "@inertiajs/vue3";
import { defineProps, ref } from "vue";
import Swal from "sweetalert2";

const props = defineProps({
    user: Object,
    jobModalities: Array,
    genders: Array,
});

const photoPreview = ref(null);
const photoInput = ref(null);

const showDeleteAlert = (itemToDelete) => {
    Swal.fire({
        title: "Seguro que deseas eliminarlo?",
        text: "No podrás revertir esta acción!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "0E70FF",
        confirmButtonText: "Eliminar!",
        cancelButtonText: "Eancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            deleteItem(itemToDelete);
        }
    });
};

const form = useForm(() => ({
    _method: "PUT",
    name: props.user.name,
    last_name: props.user.last_name,
    username: props.user.username,
    avatar: props.user.avatar,
    email: props.user.email,
    birthdate: props.user.birthdate,
    about_me: props.user.about_me,
    slug: props.user.slug,
    job_title: props.user.job_title,
    phone: props.user.phone,
    cv: props.user.cv,
    linkedin: props.user.linkedin,
    job_modality_id: props.user.job_modality_id,
    gender_id: props.user.gender_id,
    looking_for_job: props.user.looking_for_job,
}));

const updateProfileInformation = () => {
    if (photoInput.value) {
        form.avatar = photoInput.value.files[0];
    }

    form.post(route("user-account.update"), {
        preserveScroll: true,
        onSuccess: () => {
            if (photoInput.value) {
                photoInput.value.value = "";
            }
        },
    });
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (!photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deleteItem = (itemToDelete) => {
    router.delete(route("user-account.destroy", { itemToDelete }), {
        preserveScroll: true,
        onSuccess: () => {
            if (itemToDelete === "avatar") {
                photoPreview.value = null;
                clearPhotoFileInput();
            } else if (itemToDelete === "cv") {
                form.cv = null;
            }

            itemToDelete = null;
        },
    });
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
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
