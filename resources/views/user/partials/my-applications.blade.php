<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-center mb-2">
            {{ __('Jobs You Applied To') }}
        </h2>

    </header>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Available Positions
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Applied Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $application->title }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $application->positions }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $application->time }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $application->status }}
                    </td>
                    <td>
                        <x-anchor text="details" link="/application/details?id={{$application->id}}" />
                    </td>
                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>

</section>