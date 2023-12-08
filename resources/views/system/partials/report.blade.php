<div class="max-w-md mx-auto mt-6 space-y-6 mb-8" id="printable">

    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

        <div class="flex justify-between mb-3">
            <div class="flex justify-center items-center">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">System Users Insight</h5>
            </div>
            <div id="printBtn">
                <button type="button" onclick="printReport()" data-tooltip-target="data-tooltip"
                    data-tooltip-placement="bottom"
                    class="hidden sm:inline-flex items-center justify-center text-gray-500 w-8 h-8 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm"><svg
                        class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 16 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3" />
                    </svg><span class="sr-only">Download</span>
                </button>
                <div id="data-tooltip" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Download Chart
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>

        <!-- Donut Chart -->
        <div class="py-6" id="donut-chart"></div>
        <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
            <div class="flex justify-between items-center pt-5">
            </div>
        </div>
    </div>

    <script>
        // ApexCharts options and config
        window.addEventListener("load", function() {
            const getChartOptions = () => {
                return {
                    series: [{{ $applied }}, {{ $approved }}, {{ $rejected }},
                        {{ $pending }},
                    ],
                    colors: ["#262df0", "#2cad28", "#eb752d", "#f2f536"],
                    chart: {
                        height: 320,
                        width: "100%",
                        type: "donut",
                    },
                    stroke: {
                        colors: ["transparent"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                labels: {
                                    show: true,
                                    name: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: 20,
                                    },
                                    total: {
                                        showAlways: true,
                                        show: true,
                                        label: "Total Users Registered",
                                        fontFamily: "Inter, sans-serif",
                                        formatter: function(w) {
                                            const sum = w.globals.seriesTotals.reduce((a, b) => {
                                                return a + b
                                            }, 0)
                                            return {{ count($users) }}
                                        },
                                    },
                                    value: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: -20,
                                        formatter: function(value) {
                                            return value + "k"
                                        },
                                    },
                                },
                                size: "80%",
                            },
                        },
                    },
                    grid: {
                        padding: {
                            top: -2,
                        },
                    },
                    labels: ["applied", "approved", "rejected", "pending"],
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
                                return value
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
                chart.render();

                // Get all the checkboxes by their class name
                const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');


                // Attach the event listener to each checkbox
                checkboxes.forEach((checkbox) => {
                    checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
                });
            }
        });
    </script>


</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var printable = document.getElementById('printable')

    function printReport() {
        var a = window.open('report', '', 'height=500, width=700');
        a.document.write('<html>');
        a.document.write(
        );
        a.document.write('<body >');
        a.document.write('<center >');
        a.document.write(printable.innerHTML);
        a.document.write('</center >');
        a.document.getElementById("printBtn").remove()
        a.document.write('</body></html>');
        setTimeout(function() {
            a.print();
        }, 1000);
        a.document.close();
    }
</script>
