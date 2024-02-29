<x-app-layout>
    <div class="max-w-4xl mx-auto flex mt-2">
        <!-- Bagian foto -->
        <div class="max-w-lg w-full mr-8">
            <div class="bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-md">
                <img src="{{ asset('images/' . $photos->image) }}" alt="Photo" class="w-full h-auto">

            </div>
        </div>

        <!-- Bagian komentar -->
        <div class="w-full max-w-lg bg-white">
            <div class="bg-white white:bg-gray-900 rounded-lg overflow-hidden shadow-md">
                <div class="p-4">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-gray-900">Discussion (20)</h2>
                    <!-- Form komentar -->
                    <form action="{{ route('comments.store', $photos->id) }}" method="POST" class="mb-6">
                        @csrf
                        <textarea name="body" id="body" rows="4" class="w-full text-sm text-gray-900 dark:text-black bg-white dark:bg-white rounded-lg p-2 mb-2 border border-gray-200 dark:border-gray-700" placeholder="Write a comment..." required></textarea>
                        <button type="submit" class="inline-block bg-gray-700 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-800">Post comment</button>
                    </form>

                    <!-- Komentar contoh -->
                    <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-start mb-4">
                            <img class="w-10 h-10 rounded-full mr-3" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Michael Gough">
                            <div>
                                <p class="text-gray-900 dark:text-black font-semibold">Michael Gough</p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Feb. 8, 2022</p>
                            </div>
                        </div>
                        <p class="text-gray-900 dark:text-black">Very straight-to-point article. Really worth time reading. Thank you! But tools are just the instruments for the UX designers. The knowledge of the design tools are as important as the creation of the design strategy.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>