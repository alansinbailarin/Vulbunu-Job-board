<template>
    <div class="p-4 rounded-md bg-white">
        <h1 class="font-semibold text-xl mb-2">Add your main skills</h1>

        <form class="" @submit.prevent="addSkills">
            <div class="md:grid grid-cols-7 mb-4 gap-4 text-sm">
                <div class="col-span-2">
                    <p class="flex items-center font-medium mb-2">
                        Select your top 10 skills
                    </p>
                    <button
                        @click="open = !open"
                        type="button"
                        class="rounded-md w-full bg-gray-50 px-4 py-2.5 border border-gray-300 flex items-center justify-between"
                    >
                        skills
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="13"
                            height="13"
                            fill="currentColor"
                            class="bi bi-chevron-down"
                            :class="{ 'transform rotate-180': open }"
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
                            v-show="open"
                            class="bg-white border border-gray-200 rounded-md w-[18.5rem] md:w-[9.8rem] mt-0.5 z-10 px-2 py-2 absolute"
                        >
                            <ul class="max-h-44 overflow-y-scroll">
                                <li
                                    v-for="skill in skills"
                                    class="py-1 px-2 my-1 text-sm rounded-md p-1"
                                    :class="{
                                        'bg-gray-100': isSelected(
                                            selectedSkills.name,
                                            skill.id
                                        ),
                                    }"
                                    :key="skill.id"
                                    :value="skill.id"
                                >
                                    <button
                                        @click="addTag(skill.name, skill.id)"
                                        type="button"
                                        :class="[
                                            'w-full text-left',
                                            getButtonClass(skill.name),
                                            {
                                                'cursor-not-allowed':
                                                    isSelected(
                                                        skill.name,
                                                        skill.id
                                                    ),
                                            },
                                        ]"
                                        class="w-full text-left"
                                    >
                                        {{ skill.name }}
                                    </button>
                                </li>
                            </ul>
                        </div></Transition
                    >
                    <div
                        v-if="form.errors.skill_id"
                        class="px-2 py-2 rounded-md"
                    >
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm text-red-600 text-left">
                                    {{ form.errors.skill_id }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-5 mt-4 md:mt-0">
                    <p class="font-medium mb-2">
                        Selected skills: {{ selectedSkillsCount }}
                    </p>
                    <div
                        class="bg-gray-50 rounded-md border border-gray-300 px-2 flex flex-wrap items-center py-0.5"
                    >
                        <p class="py-2 mr-2">Selection:</p>
                        <button
                            v-for="(selectedSkill, index) in selectedSkills"
                            :key="index"
                            type="button"
                            @click="removeTag(selectedSkill)"
                            class="m-0.5 text-xs font-medium bg-blue-100 text-blue-700 px-3 rounded-full border border-blue-200 py-1.5 flex items-center justify-between"
                        >
                            {{ selectedSkill.name || selectedSkill.value }}
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
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
                </div>
                <div class="md:flex items-center gap-3 mt-4">
                    <button
                        type="submit"
                        class="bg-indigo-600 w-full md:w-auto rounded-md px-4 py-2 text-white font-semibold hover:bg-indigo-500 transition duration-200 ease-in-out"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Save changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm, router } from "@inertiajs/vue3";
import { defineProps, ref, Transition, computed, onMounted } from "vue";
import { vOnClickOutside } from "@vueuse/components";

const props = defineProps({
    user: Object,
    skills: Array,
    userSkills: Array,
});

const open = ref(false);
const selectedSkills = ref([]);
const skills_id = ref([]);

const addSkills = () => {
    form.post(route("skills.update"), {
        preserveScroll: true,
    });
};

const form = useForm(() => ({
    _method: "PUT",
    skill_id: [] ? [] : props.user.skill_id,
}));

form.skill_id = computed(() => {
    return skills_id.value;
});

const closeMenu = () => {
    open.value = false;
};

const isSelected = (value, id) => {
    return selectedSkills.value.some(
        (skill) => skill.value === value && skill.id === id
    );
};

const getButtonClass = (value) => {
    return {
        "cursor-not-allowed":
            isSelected(value) || selectedSkillsCount.value >= 10,
    };
};

// Recupera las habilidades seleccionadas del almacenamiento local al cargar la página
onMounted(() => {
    selectedSkills.value = props.userSkills;
});

// Función para agregar habilidades seleccionadas
const addTag = async (value, id) => {
    // Verifica si la habilidad ya está seleccionada por su id
    const isSkillSelected = selectedSkills.value.some(
        (skill) => skill.id === id
    );

    if (selectedSkills.value.length < 10 && !isSkillSelected) {
        const skillToAdd = { value, id };
        selectedSkills.value.push(skillToAdd);
        skills_id.value.push(id);
    }
};

const selectedSkillsCount = computed(() => {
    return selectedSkills.value.length;
});

const removeTag = (selectedskill) => {
    const index = selectedSkills.value.indexOf(selectedskill);
    if (index !== -1) {
        const idToRemove = selectedskill.id; // Usar el id como identificador único
        selectedSkills.value.splice(index, 1);
        skills_id.value.splice(index, 1);

        router.delete(
            route("skill.destroy", {
                skill_id: idToRemove, // Usar el id en lugar del índice
            }),
            {
                preserveScroll: true,
            }
        );
    }
};
</script>
