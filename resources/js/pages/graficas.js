import colors from "tailwindcss/colors";

export const graficas = {
    proyectosPorMes: {
        colors: [colors.lime["600"], colors.yellow["500"]],

        chart: {
            height: 280,
            type: "bar",
            parentHeightOffset: 0,
            toolbar: {
                show: false,
            },
        },
        stroke: {
            show: true,
            width: 3,
            colors: ["transparent"],
        },
        dataLabels: {
            enabled: false,
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                barHeight: "90%",
                columnWidth: "35%",
            },
        },
        legend: {
            show: false,
        },
        xaxis: {
            categories: [
                "Ene",
                "Feb",
                "Mar",
                "Abr",
                "May",
                "Jun",
                "Jul",
                "Ago",
                "Sep",
                "Oct",
                "Nov",
                "Dic",
            ],
            labels: {
                hideOverlappingLabels: false,
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            tooltip: {
                enabled: false,
            },
        },
        grid: {
            padding: {
                left: 0,
                right: 0,
                top: 0,
                bottom: -10,
            },
        },
        yaxis: {
            show: false,
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
            },
        },
        responsive: [
            {
                breakpoint: 1024,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: "55%",
                        },
                    },
                },
            },
        ],
    }
};
