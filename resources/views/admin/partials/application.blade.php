<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100  mb-2">
            <x-anchor link="{{ URL::previous() }}" text="Back" class="me-4" />
            {{ __('Application Details') }}
        </h2>
        <div class=" overflow-x-auto mt-4">
            <h4>cover letter
        </div>

    </header>
    <div class="m-6">
        {{ $application->cover_letter }}
    </div>
    <?php $url = Storage::url($application->cv); ?>
    <div class="mt-4">
        <x-input-label for="cv" :value="__('CV / curriculum vitae')" />
        <div class="row justify-content-center">
            <iframe src="{{ asset($url) }}" width="100%" height="600">
                This browser does not support PDFs. Please download the PDF to view it: <a
                    href="{{ url($url) }}">Download
                    PDF</a>
            </iframe>
        </div>
    </div>






    <!-- Modal toggle -->
    <button data-modal-target="comment-modal" data-modal-toggle="comment-modal"
        class=" mt-3 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button" {{ $application->status == 'approved' ? 'disabled' : '' }} {{ $application->status == 'rejected' ? 'disabled' : '' }}>
        @if ($application->status == 'pending')
            Respond now
        @elseif($application->status == 'approved')
            Already approved
        @elseif($application->status == 'rejected')
            Already rejected
        @endif
    </button>

    <!-- Main modal -->
    <div id="comment-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tell Your Reasons for Your Applicant
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="comment-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-2 md:p-5">
                    <form id="comment_form" action="/admin/application/respond" method="post">
                        @csrf
                        @method('put')
                        <textarea id="comment_box" rows="12" name="comment"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="comment" required></textarea>
                        <input type="text" name="status" id="status" hidden>
                        <input type="text" name="id" value="{{ $application->id }}" hidden>
                    </form>
                    <div class="grid gap-4 grid-cols-2 mt-2">
                        <button onclick="readyApprove()" type="button"
                            data-modal-target="confirm-modal" data-modal-toggle="confirm-modal"
                            data-modal-hide="comment-modal"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Approve</button>
                        <button onclick="readyReject()" type="button"
                            data-modal-target="confirm-modal" data-modal-toggle="confirm-modal"
                            data-modal-hide="comment-modal"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Reject</button>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <div id="confirm-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="confirm-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 mt-5">This will perform the
                        operation and notify the applicant! </h3>
                    <button data-modal-hide="confirm-modal" type="button" onclick="confirm()"
                        class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Proceed
                    </button>
                    <button data-modal-hide="confirm-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const comment_form = document.getElementById('comment_form')
        const status = document.getElementById('status')

        function readyApprove() {
            status.value = 'approved'
        }

        function readyReject() {
            status.value = 'rejected'
        }

        function confirm() {
            comment_form.submit()
        }
    </script>

</section>
