<template>
    <canvas ref="chart"></canvas>
</template>

<script setup>
import { ref, onMounted } from "vue";
import Chart from "chart.js/auto";

const props = defineProps({
    percentajePending: Number,
    percentajeApproved: Number,
    percentajeRejected: Number,
    type: String,
    title: String,
});

const chart = ref(null);

onMounted(() => {
    const ctx = chart.value.getContext("2d");

    const data = {
        labels: ["Pendientes", "Aprobadas", "Rechazadas"],
        datasets: [
            {
                label: " ",
                data: [
                    props.percentajePending,
                    props.percentajeApproved,
                    props.percentajeRejected,
                ],
                backgroundColor: ["#FFC107", "#10B981", "#EF4444"],
            },
        ],
    };

    const options = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: "top",
            },
            title: {
                display: true,
                text: props.title,
            },
        },
    };

    new Chart(ctx, {
        type: props.type,
        data: data,
        options: options,
    });
});
</script>
