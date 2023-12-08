<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-6 bg-white dark:bg-gray-800 mt-2 shadow-sm sm:rounded-lg flex py-2">
        <div class="hidden sm:ms-5 sm:flex ">
            <x-nav-link :href="route('system.dashboard')" :active="request()->routeIs('system.dashboard')">
                {{ __('Monitor') }}
            </x-nav-link>
        </div>
        <div class="hidden sm:ms-5 sm:flex ">
            <x-nav-link :href="route('system.search')" :active="request()->routeIs('system.search')">
                {{ __('Search') }}
            </x-nav-link>
        </div>
        <div class="hidden sm:ms-5 sm:flex ">
            <x-nav-link :href="route('system.report')" :active="request()->routeIs('system.report')">
                {{ __('Report') }}
            </x-nav-link>
        </div>
    </div>



    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (request()->routeis('system.search'))
                        @include('system.partials.search')
                    @elseif(request()->routeis('system.find'))
                        @include('system.partials.found-users')
                    @elseif(request()->routeis('system.dashboard'))
                        @include('system.partials.monitor')
                    @elseif(request()->routeis('system.report'))
                        @include('system.partials.report')
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
