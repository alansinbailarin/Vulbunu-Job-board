<template>
    <div class="mt-4">
        <div
            v-if="job.salary"
            class="flex items-center gap-1 text-xs md:text-md font-medium text-gray-500"
        >
            <p>{{ job.salary?.currency.symbol }}{{ job.salary?.min }}</p>
            <span> - </span>
            <p>{{ job.salary?.currency.symbol }}{{ job.salary?.max }}</p>
            <span>/</span>
            <p>{{ job.salary?.periodicity.title }}</p>
        </div>
        <div v-else>
            <p class="text-gray-500 text-xs font-medium md:text-md">
                Salario no mostrado por la empresa
            </p>
        </div>
    </div>
</template>

<script setup>
defineProps({
    job: { type: [Array, Object] },
});
</script>
