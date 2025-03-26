@extends('backend.layout.master')
@section('title', 'Dashboard')
@section('content')

    <!-- Dashboard Content -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-4 pb-3">
        <!-- Event Card -->
        <div class="ring-2 card bg-base-500 p-5 pb-10 drop-shadow-lg drop-shadow-indigo-500">
            <div class="flex justify-between items-center mb-2">
                <h5 class="text-2xl font-semibold text-white">
                    Event <span class="text-base-content/50 font-normal">| Today</span>
                </h5>
            </div>
            <div class="flex items-center gap-5 pt-5 pl-5">
                <div class="flex items-center justify-center w-20 h-20 rounded-full border border-primary/20 bg-primary/10">
                    <span class="icon-[tabler--calendar-event] text-white size-12"></span>
                </div>
                <div>
                    <h6 class="text-3xl font-bold text-white">145</h6>
                    <div>
                        <span class="text-success font-bold">12%</span>
                        <span class="text-base-content/70 pl-1">increase</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Event Card -->
        <!-- User Card -->
        <div class="ring-2 card bg-base-500 p-5 pb-10">
            <div class="flex justify-between items-center mb-2">
                <h5 class="text-2xl font-semibold text-white">
                    User <span class="text-base-content/50 font-normal">| Total</span>
                </h5>
            </div>
            <div class="flex items-center gap-5 pt-5 pl-5">
                <div class="flex items-center justify-center w-20 h-20 rounded-full border border-primary/20 bg-primary/10">
                    <span class="icon-[tabler--user] text-white size-12"></span>
                </div>
                <div>
                    <h6 class="text-3xl font-bold text-white">145</h6>
                    <div>
                        <span class="text-success font-bold">12%</span>
                        <span class="text-base-content/70 pl-1">increase</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End User Card -->
        <!-- Revenue Card -->
        <div class="ring-2 card bg-base-500 p-5 pb-10">
            <div class="flex justify-between items-center mb-2">
                <h5 class="text-2xl font-semibold text-white">
                    Revenue <span class="text-base-content/50 font-normal">| Total</span>
                </h5>
            </div>
            <div class="flex items-center gap-5 pt-5 pl-5">
                <div class="flex items-center justify-center w-20 h-20 rounded-full border border-primary/20 bg-primary/10">
                    <span class="icon-[tabler--currency-dollar] text-white size-12"></span>
                </div>
                <div>
                    <h6 class="text-3xl font-bold text-white">145</h6>
                    <div>
                        <span class="text-success font-bold">12%</span>
                        <span class="text-base-content/70 pl-1">increase</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Revenue Card -->
        <!-- Order Card -->
        <div class="ring-2 card bg-base-500 p-5 pb-10">
            <div class="flex justify-between items-center mb-2">
                <h5 class="text-2xl font-semibold text-white">
                    Order <span class="text-base-content/50 font-normal">| Today</span>
                </h5>
            </div>
            <div class="flex items-center gap-5 pt-5 pl-5">
                <div class="flex items-center justify-center w-20 h-20 rounded-full border border-primary/20 bg-primary/10">
                    <span class="icon-[tabler--shopping-cart] text-white size-12"></span>
                </div>
                <div>
                    <h6 class="text-3xl font-bold text-white">145</h6>
                    <div>
                        <span class="text-success font-bold">12%</span>
                        <span class="text-base-content/70 pl-1">increase</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Order Card -->
    </div>
    <!-- Chart Block -->
    <div class="ring-2 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
        <div class="w-full h-full">
            <!-- Reports -->
            <div class="card bg-base-100 shadow-sm p-4 h-full flex flex-col">
                <div class="flex justify-between items-center mb-2">
                    <h5 class="text-2xl font-semibold text-white">
                        Sales and Revenue <span class="text-base-content/50 font-normal">| Total</span>
                    </h5>
                </div>
                <div id="salesChart" class="flex-1 w-full"></div>
            </div>
            <!-- End Reports -->
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
    </div>
    <div class="flex items-center justify-center h-48 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 1v16M1 9h16" />
            </svg>
        </p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#salesChart"), {
                series: [{
                    name: 'Sales',
                    data: [1200, 1500, 1300, 1700, 2000, 1800, 2200, 2500, 2300, 2700, 3000, 3200]
                }, {
                    name: 'Revenue',
                    data: [800, 1000, 900, 1200, 1500, 1300, 1600, 1800, 1700, 2000, 2200, 2400]
                }],
                chart: {
                    height: '400',
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                    foreColor: '#ffffff', // Set all chart text to white
                },
                markers: {
                    size: 4
                },
                colors: ['#A020F0', '#2eca6a'], // Blue for Sales, Green for Revenue
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.4,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                        'Nov', 'Dec'
                    ]
                },
                tooltip: {
                    x: {
                        format: 'MMM' // Display month in tooltip
                    },
                    theme: 'dark', // Use dark theme for better contrast
                    style: {
                        fontSize: '12px',
                        color: '#ffffff' // Tooltip text color
                    },
                    custom: function({
                        series,
                        seriesIndex,
                        dataPointIndex,
                        w
                    }) {
                        return (
                            '<div style="background-color: #000000; color: #ffffff; padding: 8px; border-radius: 4px;">' +
                            '<span>' + w.globals.labels[dataPointIndex] + '</span>' +
                            '<br>' +
                            '<span>' + w.globals.seriesNames[seriesIndex] + ': ' + series[
                                seriesIndex][dataPointIndex] + '</span>' +
                            '</div>'
                        );
                    }
                }
            }).render();
        });

        document.addEventListener('DOMContentLoaded', () => {
            if (typeof HSCollapse !== 'undefined') {
                HSCollapse.autoInit();
            }
            if (typeof HSDropdown !== 'undefined') {
                HSDropdown.autoInit();
            }
        });
    </script>
@endsection
