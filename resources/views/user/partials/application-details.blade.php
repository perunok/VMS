<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100  mb-2">
        <x-anchor link="{{ URL::previous() }}" text="Back" class="me-4" />
            {{ __('Application Details') }}
        </h2>

        <div class=" overflow-x-auto">
            <h4><em>Title</em> &nbsp;&nbsp;&nbsp;&nbsp; {{$application->title}} </h4 </div>

    </header>
    <div>
        <x-input-label for="coverletter" :value="__('Your Cover Letter')" />
        <x-display-label :text="$application->cover_letter" />
    </div>
    <div class="mt-4">
        <?php $url = Storage::url($application->cv) ?>
        <div class="mt-4">
            <x-input-label for="cv" :value="__('Your Uploaded CV')" />
            <div class="row justify-content-center">
                <iframe src="{{asset($url)}}" width="100%" height="600">
                    
                </iframe>
            </div>
        </div>
    </div>

</section>