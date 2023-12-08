<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-6 bg-white dark:bg-gray-800 mt-2 shadow-sm sm:rounded-lg flex py-2">
        <div class="hidden sm:ms-5 sm:flex ">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('user.vacancies')">
                {{ __('vacancies') }}
            </x-nav-link>
        </div>
        <div class="hidden sm:ms-5 sm:flex ">
            <x-nav-link :href="route('user.my_applications', 'id=' . Auth::id())" :active="request()->routeIs('user.my_applications')">
                {{ __('my applications') }}
            </x-nav-link>
        </div>
    </div>


    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (request()->routeIs('user.vacancies'))
                        @include('user.partials.job-list')
                    @elseif(request()->routeIs('job.apply'))
                        @include('user.partials.apply')
                    @elseif(request()->routeIs('user.my_applications'))
                        @include('user.partials.my-applications')
                    @elseif(request()->routeIs('application.details'))
                        @include('user.partials.application-details')
                    @elseif(request()->routeIs('job.moreinfo'))
                        @include('user.partials.job-info')
                    @elseif(request()->routeIs('application.comment'))
                        @include('user.partials.comment')
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
