<template>
    <canvas ref="chart"></canvas>
</template>

<script setup>
import { ref, onMounted } from "vue";
import Chart from "chart.js/auto";

const props = defineProps({
    percentajeTotalLastWeek: Number,
});

const chart = ref(null);

onMounted(() => {
    const ctx = chart.value.getContext("2d");

    const data = {
        labels: ["Ultima semana", "Total"],
        datasets: [
            {
                label: "Aplicaciones",
                data: [props.percentajeTotalLastWeek, 100],
                backgroundColor: ["#F59E0B", "#10B981"],
            },
        ],
    };

    const options = {
        responsive: true,
        maintainAspectRatio: false,
    };

    new Chart(ctx, {
        type: "line",
        data: data,
        options: options,
    });
});
</script>
