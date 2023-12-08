<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-center mb-2">
            {{ __('Published Vacancies') }}
        </h2>

    </header>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class=" py-3">
                        People Applied
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Salary Range
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Published Date
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
                @foreach ($vacancies as $vacancy)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" onclick="toggleActive({{$vacancy->id}})" {{
                                $vacancy->active ==
                            true?'checked':''}}/>
                            <div
                                class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                        </label>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $vacancy->title }}
                    </th>
                    <td class=" py-4">
                        {{ $numbers[$vacancy->id] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $vacancy->salary_range }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $vacancy->created_at }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $vacancy->deadline }}
                    </td>
                    <td class="px-4">
                        <x-anchor text="candidates" link="/admin/vacancy/applicants?v_id={{$vacancy->id}}" />
                        <x-anchor text="edit" link="/admin/vacancy/edit?id={{$vacancy->id}}" />
                        <!-- <x-anchor text="close" link="/admin/vacancy/close?id={{$vacancy->id}}" /> -->
                    </td>
                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        function toggleActive(id) {
            var div = document.createElement('div')
            div.innerHTML = '<input type="text" name="id" />'
            var inp = div.firstChild
            var toggleActiveForm = document.createElement("form")
            toggleActiveForm.action = "/admin/vacancy/toggle_activity"
            toggleActiveForm.method = "get"
            inp.value = id
            toggleActiveForm.appendChild(div)
            document.body.appendChild(toggleActiveForm)
            toggleActiveForm.submit()
        }

    </script>
</section>