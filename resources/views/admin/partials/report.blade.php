<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2 text-center">
            {{ __('Generate Report') }}
        </h2>
    </header>
    <form method="post" action="{{ route('admin.report.generate') }}" class="max-w-md mx-auto mt-6">
        @csrf
        @method('post')

        {{-- the option checkboxes --}}
        <div class="grid gap-2">
            <div>
                <div class="flex items-center ps-4 pe-8 mt-4 border border-gray-200 rounded dark:border-gray-700">
                    <label for="cb_posted_vacancies"
                        class="w-full py-4 ms-2 text-md font-medium text-gray-900 dark:text-gray-300">Posted
                        Vacancies</label>

                </div>
            </div>
            <div class="grid grid-cols-2">
                <div>
                    <ul>
                        <li class="w-full border-l border-gray-200  dark:border-gray-600">
                            <div class="flex items-center ps-3">

                                <div class="relative max-w-sm my-3">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input name="from" datepicker type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="date from" datepicker-autohide max="{{Carbon\Carbon::now()->toDateString()}}" required>
                                </div>

                            </div>
                        </li>
                        <li class="w-full border-l border-b border-gray-200 dark:border-gray-600">
                            <div class="flex items-center ps-3">

                                <div class="relative max-w-sm my-4">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input name="to" datepicker type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="date to" datepicker-autohide required>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="ps-4">
                        <li class="w-full border-r border-gray-200 dark:border-gray-600">
                            <div class="flex items-center px-3">
                                <label for="applied"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">#
                                    people applied</label>
                                <input id="applied" type="checkbox" name="applied"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            </div>
                        </li>
                        <li class=" my-1 w-full border-r border-gray-200 dark:border-gray-600">
                            <div class="flex items-center px-3">
                                <label for="accepted"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">#
                                    people accepted</label>
                                <input id="accepted" type="checkbox" name="accepted"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            </div>
                        </li>
                        <li class=" my-1 w-full border-b border-r border-gray-200 dark:border-gray-600">
                            <div class="flex items-center px-3">
                                <label for="list"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">list
                                    accepted</label>
                                <input id="list" type="checkbox" name="list_accepted"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" disabled>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 px-4 mt-4">
            <button type="submit"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Done</button>
        </div>
    </form>
    {{-- end the checkboxes --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
</section>
