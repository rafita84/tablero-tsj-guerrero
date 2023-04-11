<x-app-layout title="Detalle de proyectos" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12 pb-4">
                <div class="mt-3 flex items-center justify-between px-4 sm:px-5">
                    <div></div>
                    <h2 class="text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100">
                        Proyectos en curso por mes
                    </h2>
                    <div class="flex items-center space-x-4">
                        <div class="hidden items-center space-x-2 sm:flex">
                            <div class="h-3 w-3 rounded-full bg-primary"></div>
                            <p>{{ $ano2022 }}</p>
                        </div>
                        <div class="hidden items-center space-x-2 sm:flex">
                            <div class="h-3 w-3 rounded-full bg-accent"></div>
                            <p>{{ $ano2023 }}</p>
                        </div>
                        <div class="hidden items-center space-x-2 sm:flex">
                            <div class="h-3 w-3 rounded-full bg-info"></div>
                            <p>{{ $ano2024 }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-3 grid grid-cols-12">
                    <div class="col-span-12 px-4 sm:col-span-6 sm:px-5 lg:col-span-4">
                        <div class="grid grid-cols-3 gap-x-4  text-center">
                            <div class="bg-primary/10 p-2">
                                <p class="text-lg uppercase text-primary">
                                    {{ $ano2022 }}
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $proyectos2022 }}
                                </p>
                            </div>
                            <div class="bg-accent/10 p-2">
                                <p class="text-lg uppercase text-accent">
                                    {{ $ano2023 }}
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $proyectos2023 }}
                                </p>
                            </div>
                            <div class="bg-info/10 p-2">
                                <p class="text-lg uppercase text-info">
                                    {{ $ano2024 }}
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $proyectos2024 }}
                                </p>
                            </div>
                            <div class="bg-primary/10 p-2">
                                <p class="text-xs uppercase text-slate-500 dark:text-navy-400">
                                    Concluidos
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $proyectosConcluidos2022 }}
                                </p>
                            </div>
                            <div class="bg-accent/10 p-2">
                                <p class="text-xs uppercase text-slate-500 dark:text-navy-400">
                                    Concluidos
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $proyectosConcluidos2023 }}
                                </p>
                            </div>
                            <div class="bg-info/10 p-2">
                                <p class="text-xs uppercase text-slate-500 dark:text-navy-400">
                                    Concluidos
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $proyectosConcluidos2024 }}
                                </p>
                            </div>
                            <div class="bg-primary/10 p-2">
                                <p class="text-xs uppercase text-slate-500 dark:text-navy-400">
                                    En proceso
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $proyectosEnProceso2022 }}
                                </p>
                            </div>
                            <div class="bg-accent/10 p-2">
                                <p class="text-xs uppercase text-slate-500 dark:text-navy-400">
                                    En proceso
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $proyectosEnProceso2023 }}
                                </p>
                            </div>
                            <div class="bg-info/10 p-2">
                                <p class="text-xs uppercase text-slate-500 dark:text-navy-400">
                                    En proceso
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $proyectosEnProceso2024 }}
                                </p>
                            </div>
                            <div class="bg-primary/10 p-2">
                                <p class="text-xs uppercase text-slate-500 dark:text-navy-400">
                                    Desfasados
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $proyectosDesfasados2022 }}
                                </p>
                            </div>
                            <div class="bg-accent/10 p-2">
                                <p class="text-xs uppercase text-slate-500 dark:text-navy-400">
                                    Desfasados
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $proyectosDesfasados2023}}
                                </p>
                            </div>
                            <div class="bg-info/10 p-2">
                                <p class="text-xs uppercase text-slate-500 dark:text-navy-400">
                                    Desfasados
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $proyectosDesfasados2024}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="ax-transparent-gridline col-span-12 px-2 sm:col-span-6 lg:col-span-8">
                        <div id="graficaPorMeses"></div>
                    </div>
                </div>
            </div>

            <div class="col-span-12">
                <div class="-mt-1 flex items-center justify-between">
                    <h2 class="text-sm+ font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                        Proyectos por área
                    </h2>
                </div>
                <div class="card mt-3">
                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table class="is-zebra w-full">
                            <thead>
                                <tr>
                                    <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5 text-left">
                                        Área
                                    </th>
                                    <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                                        Concluidos
                                    </th>
                                    <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                                        En proceso
                                    </th>
                                    <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                                        Desfasados
                                    </th>
                                    <th class="bg-accent px-4 py-3 font-semibold uppercase text-white dark:bg-navy-800 dark:text-navy-400 lg:px-5">
                                        Todos
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($areas as $area)
                                <tr>
                                    <td class="min-w-[20rem] px-4 py-3 sm:px-5">
                                        {{ $area->nombre }}
                                    </td>
                                    <td class="text-center px-4 py-3">
                                        {{ $area->proyectos()->whereDoesntHave('actividades', function($q){$q->where('concluida', 0);})->count() }}
                                    </td>
                                    <td class="text-center px-4 py-3">
                                        {{ $area->proyectos()->whereHas('actividades', function ($q){$q->where('concluida', 0);})->count() }}
                                    </td>
                                    <td class="text-center px-4 py-3">
                                        {{ $area->proyectos()->whereHas('actividades', function ($q){$q->where('concluida', 0)->whereDate('fecha_final','<',date('Y-m-d'));})->count() }}
                                    </td>
                                    <td class="text-center px-4 py-3">
                                        {{ $area->loadCount('proyectos')->proyectos_count }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        (function () {
            var options = {
                proyectosPorMes: {
                    colors: ["#49652E", "#C79D48", "#0284c7"],
                    series: [
                        {
                            name: "{{ $ano2022 }}",
                            data: @json($seriesData2022)
                        },
                        {
                            name: "{{ $ano2023 }}",
                            data: @json($seriesData2023)
                        },
                        {
                            name: "{{ $ano2024 }}",
                            data: @json($seriesData2024)
                        }
                    ],
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
                            barHeight: "100%",
                            columnWidth: "40%",
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
            }

            var chart = new ApexCharts(document.getElementById('graficaPorMeses'), options.proyectosPorMes);
            chart.render();
        }());
    </script>
</x-app-layout>
