<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100  mb-2">
            <x-anchor link="/user/vacancies" text="Back" class="me-4" />
            {{ __('Company Response') }}
        </h2>

        <div class=" overflow-x-auto ml-12">
            {{-- alerts here --}}
            @if ($application->status == 'approved')
                <div class=" text-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">Great!</span> Your Application id Approved
                </div>
            @elseif($application->status == 'rejected')
                <div class=" text-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">Sorry!</span> Your Application is Not Approved
                </div>
            @endif
        </div>

    </header>

    <div class="max-w-md mx-auto  mb-2">
        <textarea rows="20"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            readonly>{{ $application->comment }}</textarea>
    </div>
</section>
