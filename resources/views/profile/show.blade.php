<x-app-layout>
    <div class="max-w-4xl mx-auto flex mt-2">
            <!-- Bagian foto -->
        <div class="max-w-lg w-full mr-8">
            <div class="bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-md">
                <img src="{{ asset('images/' . $photos->image) }}" alt="Photo" class="w-full h-auto">
            </div>
            <form action="{{ route('photos.like', $photos->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ auth()->user()->hasLiked($photos->id) ? 'Unlike' : 'Like' }}
                </button>
                <button type="button" onclick="showLikesModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    View Likes
                </button>
                <p class="text-gray-900 dark:text-gray-400 text-sm mt-2">{{ $photos->likes->count() }} likes</p>
            </form>
        </div>

        <!-- Modal Likes -->
        <div id="likesModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen">
                <div class="modal-container bg-white dark:bg-gray-900 dark:text-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    <!-- Content Modal Likes -->
                    <div class="modal-content py-4 text-left px-6">
                        <!-- Title -->
                        <div class="flex justify-between items-center pb-3">
                            <p class="text-2xl font-bold">Likes</p>
                            <button onclick="closeLikesModal()" class="text-gray-600 hover:text-gray-700 focus:outline-none">
                                <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M6.72 6.72a.75.75 0 011.06 0L12 10.94l4.22-4.22a.75.75 0 111.06 1.06L13.06 12l4.22 4.22a.75.75 0 11-1.06 1.06L12 13.06l-4.22 4.22a.75.75 0 01-1.06-1.06L10.94 12 6.72 7.78a.75.75 0 010-1.06z"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- List Likes -->
                        <ul>
                            @foreach($likes as $like)
                            <li class="text-gray-900 dark:text-gray-400 text-sm">{{ $like->user->username }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showLikesModal() {
                document.getElementById('likesModal').classList.remove('hidden');
            }

            function closeLikesModal() {
                document.getElementById('likesModal').classList.add('hidden');
            }
        </script>

        <!-- Bagian komentar -->
        <!-- Inside show.blade.php in the profile folder -->
    <div class="w-full max-w-lg bg-white">
        <div class="bg-white white:bg-gray-900 rounded-lg overflow-hidden shadow-md">
            <div class="p-4">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-gray-900">Discussion (20)</h2>
                <!-- Form komentar -->
                <form action="{{ route('profile.comments.store', ['photoId' => $photos->id]) }}" method="POST" class="mb-6">
                    @csrf
                    <textarea name="body" id="body" rows="4" class="w-full text-sm text-gray-900 dark:text-black bg-white dark:bg-white rounded-lg p-2 mb-2 border border-gray-200 dark:border-gray-700" placeholder="Write a comment..." required></textarea>
                    <button type="submit" class="inline-block bg-gray-700 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-800">Post comment</button>
                </form>
                <!-- Komentar contoh -->
                @foreach($comments as $comment)
                    <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-start mb-4">
                            <img class="w-10 h-10 rounded-full mr-3" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Michael Gough">
                            <div>
                                <p class="text-gray-900 dark:text-black font-semibold">{{ $comment->user->username }}</p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">{{ $comment->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <p class="text-gray-900 dark:text-black">{{ $comment->body }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
