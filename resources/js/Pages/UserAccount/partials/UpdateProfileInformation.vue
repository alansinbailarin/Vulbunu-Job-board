<template>
    <h1 class="font-semibold text-xl mb-1">Información del perfil</h1>

    <div class="border border-gray-200 p-4 rounded-md">
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
                            class="rounded-full h-20 w-20 object-cover"
                        />
                        <img
                            v-else
                            src="../../../../img/no-image.jpeg"
                            alt=""
                            class="rounded-full h-20 w-20 object-cover"
                        />
                    </div>
                    <div v-show="photoPreview" class="mt-2">
                        <span
                            class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
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
                        Cambiar
                    </button>
                </div>

                <button
                    v-if="user.avatar"
                    class="mt-2 border-2 border-red-500 px-3 py-1 rounded-md text-red-500 text-sm"
                    @click.prevent="deletePhoto"
                >
                    Eliminar imagen
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
                        <label for="name" value="Name">Nombre </label>
                        <input
                            id="name"
                            v-model="form.name"
                            type="text"
                            required
                            autocomplete="name"
                            placeholder="Nombre"
                            class="w-full my-1 text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
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
                        <label for="last_name" value="Last Name">
                            Apellido
                        </label>
                        <input
                            id="last_name"
                            v-model="form.last_name"
                            type="text"
                            placeholder="Apellido"
                            class="w-full my-1 text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                            required
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
                        <label for="birthdate" value="birthdate"
                            >Fecha de nacimiento</label
                        >
                        <input
                            id="birthdate"
                            v-model="form.birthdate"
                            type="date"
                            placeholder="Fecha de nacimiento"
                            class="w-full my-1 text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                            required
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
                </div>
                <div>
                    <div class="mb-1.5">
                        <label for="username" value="User Name"
                            >Nombre de usuario</label
                        >
                        <input
                            id="username"
                            v-model="form.username"
                            type="text"
                            placeholder="Nombre de usuario"
                            class="w-full my-1 text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                            required
                            autocomplete="username"
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
                        <label for="email" value="email"
                            >Correo electrónico</label
                        >
                        <input
                            id="email"
                            v-model="form.email"
                            type="text"
                            placeholder="Correo electrónico"
                            class="w-full my-1 text-sm px-5 bg-gray-50 py-2.5 rounded-md border border-gray-200 focus:ring-1 focus:ring-indigo-500 text-gray-600"
                            required
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
                </div>
                <div class="col-span-2">
                    <textarea
                        v-model="form.about_me"
                        name="about_me"
                        id="about_me"
                        class="w-full rounded-md border border-gray-200 bg-gray-50 text-sm"
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
                    class="bg-indigo-600 w-full md:w-auto rounded-md px-4 py-2 text-white font-semibold hover:bg-indigo-500 transition duration-200 ease-in-out"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm, router } from "@inertiajs/vue3";
import { defineProps, ref } from "vue";

const photoPreview = ref(null);
const photoInput = ref(null);

const props = defineProps({
    user: Object,
});

const form = useForm(() => ({
    _method: "PUT",
    name: props.user.name,
    last_name: props.user.last_name,
    username: props.user.username,
    avatar: props.user.avatar,
    email: props.user.email,
    birthdate: props.user.birthdate,
    about_me: props.user.about_me,
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

const deletePhoto = () => {
    router.delete(route("user-account.destroy"), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clearPhotoFileInput();
        },
    });
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};
</script>
