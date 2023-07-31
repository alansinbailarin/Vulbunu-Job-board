<template>
    <div class="mt-4">
        <div
            v-if="job.salary?.show == 1"
            class="flex items-center gap-1 text-xs md:text-md font-medium text-gray-500 lowercase"
        >
            <p>{{ job.salary?.currency.symbol }}{{ formattedMinSalary }}</p>
            <span> - </span>
            <p>{{ job.salary?.currency.symbol }}{{ formattedMaxSalary }}</p>

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
import { computed } from "vue";

const props = defineProps({
    job: { type: [Array, Object] },
});

// Cast the props.price to make sure it is a Number.
const formattedMinSalary = computed(() =>
    (props.job.salary?.min).toLocaleString({
        style: "currency",
        currency: "USD",
        maximumFractionDigits: 2,
    })
);

const formattedMaxSalary = computed(() =>
    (props.job.salary?.max).toLocaleString({
        style: "currency",
        currency: "USD",
        maximumFractionDigits: 2,
    })
);
</script>
