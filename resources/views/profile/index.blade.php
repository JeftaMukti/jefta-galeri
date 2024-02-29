<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1  class="mb-1 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-blue">{{ $user->username }}</h1>
                    <p class="text-lg mb-4 font-normal text-gray-500 lg:text-xl dark:text-gray-400">Name: {{ $user->name }}</p>
                    <!-- Display user's photos -->
                    <h2>Photos</h2>
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        @foreach ($user->photos as $photo)
                            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                                <a href="{{ route('profile.show', $photo->id) }}">
                                    <img src="{{ asset('images/' . $photo->image) }}" alt="Photo" class="w-full h-auto">
                                </a>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $photo->judul_foto }}</h3>
                                    <p class="text-gray-500">{{ $photo->deskripsi_foto }}</p>
                                    <p class="text-indigo-600">Album: {{ $photo->album->name_album }}</p>
                                    <div class="flex justify-between items-center mt-4">
                                        <button class="text-gray-500 hover:text-indigo-600 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                                            </svg>
                                        </button>
                                        <button class="text-gray-500 hover:text-indigo-600 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <h2>Albums</h2>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($user->albums as $album)
                            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $album->name_album }}</h3>
                                    <p class="text-gray-500">{{ $album->description }}</p>
                                    <a href="{{ route('profile.album', $album->id) }}" class="text-indigo-600 hover:text-indigo-800">View Album</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
