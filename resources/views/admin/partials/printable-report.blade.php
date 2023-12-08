<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100  mb-2">
            <x-anchor link="/admin/report" text="Back" class="me-12" />
            <button type="button" onclick="printReport()"
                class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Print
                Report</button>
        </h2>

    </header>


    <div class="relative overflow-x-auto m-12" id="printable">



        <div id="detailed-pricing" class="w-full overflow-x-auto">
            <div class="overflow-hidden min-w-max">

                @foreach ($rep as $application)
                    <div
                        class="grid grid-cols-2 px-4 py-5 text-gray-700  border-gray-200 gap-x-16 dark:border-gray-700">
                        <div class="text-gray-500 dark:text-gray-400 text-end">Job Title</div>
                        <div class="text-green-500 h1 ">
                            {{ $application->title }}
                        </div>
                        <div
                            class="grid grid-cols-2 px-4 py-5 text-gray-700  border-gray-200 gap-x-16 dark:border-gray-700">
                            <div class="text-gray-500 dark:text-gray-400 text-end">Published On</div>
                            <div class="text-green-500 h1">
                                {{ $application->created_at }}
                            </div>
                            <div class="text-gray-500 dark:text-gray-400 text-end">Deadline</div>
                            <div class="text-green-500 h1">
                                {{ $application->deadline }}
                            </div>
                        </div>

                        <div
                            class="grid grid-cols-2 px-4 py-5 text-gray-700  border-gray-200 gap-x-16 dark:border-gray-700">
                            @if ($applied)
                                <div class="text-gray-500 dark:text-gray-400 text-end">People Applied</div>
                                <div class="text-green-500 h1">
                                    {{ count(App\Models\Application::where('vacancy_id', $application->vacancy_id)->get()) }}
                                </div>
                            @endif
                            @if ($accepted)
                                <div class="text-gray-500 dark:text-gray-400 text-end">People Accepted</div>
                                <div class="text-green-500 h1">
                                    {{ count(App\Models\Application::where('status', 'approved')->where('vacancy_id', $application->vacancy_id)->get()) }}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </div>

    <script>
        var printable = document.getElementById('printable')

        function printReport() {
            var a = window.open('report', '', 'height=500, width=700');
            a.document.write('<html>');
            a.document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />');
            a.document.write('<body >');
            a.document.write(printable.innerHTML);
            a.document.write('</body></html>');
            a.document.close();
            setTimeout(function(){a.print();},1000);
        }
    </script>

</section>
