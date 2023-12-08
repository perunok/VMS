<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-center mb-2">
            {{ __('Available Jobs') }}
        </h2>

    </header>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Position
                    </th>
                    <th scope="col" class="px-6 py-3">
                        People Needed
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Salary Range
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Published on
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deadline
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $job->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $job->positions }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $job->salary_range }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $job->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $job->deadline }}
                        </td>
                        <td>
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                                role="alert">
                                <a href="/job/moreinfo?id={{ $job->id }}"
                                    class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">More
                                    info</a>

                                @if ($job->status == 'pending')
                                    <span class="font-medium ml-4">Awaiting Response! </span>
                                @elseif($job->status == 'approved')
                                    <a href="/application/comment?uid={{ Auth::user()->id }}&&id={{ $job->id }}"
                                        class="relative inline-flex items-center p-3 text-md font-medium text-center text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">
                                        insight
                                        <div
                                            class="absolute inline-flex items-center justify-center w-16 h-4 text-xs font-bold text-white bg-green-500 border-1 border-white rounded-full -top-3 -end-3 dark:border-gray-900">
                                            approved</div>
                                    </a>
                                @elseif($job->status == 'rejected')
                                    <a href="/application/comment?uid={{ Auth::user()->id }}&&id={{ $job->id }}"
                                        class="relative inline-flex items-center p-3 text-md font-medium text-center text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">
                                        insight
                                        <div
                                            class="absolute inline-flex items-center justify-center w-16 h-4 text-xs font-bold text-white bg-orange-500 border-1 border-white rounded-full -top-3 -end-3 dark:border-gray-900">rejected</div>
                                    </a>
                                @else
                                    <a href="/job/apply?id={{ $job->id }}"
                                        class=" bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">Apply</a>
                                @endif

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>

</section>
