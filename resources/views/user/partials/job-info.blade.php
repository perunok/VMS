<section>
    <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100  mb-2">
            <x-anchor link="{{ URL::previous() }}" text="Back" class="me-4" />
            {{ __('Job Details') }}
        </h2>

        <div class=" overflow-x-auto ml-12">
            <h4><em>Title</em> &nbsp;&nbsp;&nbsp;&nbsp; {{$vacancy->title}} </h4 </div>

    </header>

    <textarea id="description" rows="25" name="description"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Vacancy details here...">{{$vacancy->description}}</textarea>
</section>