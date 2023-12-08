<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100  mb-2">
            <x-anchor link="{{ URL::previous() }}" text="Back" class="me-4" />
            {{ __('Apply to this Job') }}
        </h2>

        <div class=" overflow-x-auto">
            <h4><em>Title</em> &nbsp;&nbsp;&nbsp;&nbsp; {{ $vacancy->title }} </h4>
            <div class="text-md font-medium px-4"> {{$vacancy->description}} </div>
        </div>


        <p class="mt-4 text-sm text-gray-600 dark:text-gray-400 mb-4">
            {{ __('Conciece and descriptive cover letter increases the chance of success.') }}
        </p>
    </header>

    <form method="post" action="{{ route('job.apply') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="vacancy_id" value="{{$vacancy->id}}">
        <div>
            <x-input-label for="cover_letter" :value="__('Cover Letter')" />
            <x-textarea id="cover_letter" name="cover_letter" type="text" class="mt-1 block w-full" value=" "
                required />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>
        <div class="flex items-center justify-center w-full">
            <label for="cv"
                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                            upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">only pdf files accepted</p>
                </div>
                <input id="cv" name="cv" type="file" class="hidden" accept="application/pdf" required />
            </label>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Apply') }}</x-primary-button>
        </div>
    </form>
</section>