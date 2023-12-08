<x-app-layout>
    @if (Auth::user()->susspended)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6 shadow-sm sm:rounded-lg text-center p-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-300">
                Your Account is susspended! consider contacting the system admin
        </div>
        @else
            <div
                class="max-w-7xl mx-auto sm:px-6 lg:px-6 bg-white dark:bg-gray-800 mt-2 shadow-sm sm:rounded-lg flex py-2">
                <div class="hidden sm:ms-5 sm:flex ">
                    <x-nav-link :href="route('admin.vacancy.publish')" :active="request()->routeIs('admin.vacancy.publish')">
                        {{ __('publish vacancy') }}
                    </x-nav-link>
                </div>
                <div class="hidden sm:ms-5 sm:flex ">
                    <x-nav-link :href="route('admin.vacancy.published')" :active="request()->routeIs('admin.vacancy.published')">
                        {{ __('published vacancies') }}
                    </x-nav-link>
                </div>
                <div class="hidden sm:ms-5 sm:flex ">
                    <x-nav-link :href="route('admin.report')" :active="request()->routeIs('admin.report')">
                        {{ __('generate report') }}
                    </x-nav-link>
                </div>
            </div>
    @endif


    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Auth::user()->susspended)
                        <div class="text-center p-4 mb-4 text-6xl text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                            role="alert">
                            susspend
                        </div>
                    @elseif (request()->routeIs('admin.vacancy.publish'))
                        @include('admin.partials.publish')
                    @elseif(request()->routeIs('admin.vacancy.edit'))
                        @include('admin.partials.edit')
                    @elseif(request()->routeIs('admin.vacancy.published'))
                        @include('admin.partials.published')
                    @elseif(request()->routeIs('admin.vacancy.applicants'))
                        @include('admin.partials.applicants')
                    @elseif(request()->routeIs('admin.application.details'))
                        @include('admin.partials.application')
                    @elseif(request()->routeIs('job.moreinfo'))
                        @include('user.partials.job-info')
                    @elseif(request()->routeIs('admin.report'))
                        @include('admin.partials.report')
                    @elseif(request()->routeIs('admin.report.generate'))
                        @include('admin.partials.printable-report')
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
