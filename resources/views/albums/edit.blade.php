<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Album') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('albums.update', $album->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name_album" :value="__('Album Name')" />
                            <input id="name_album" class="block mt-1 w-full" type="text" name="name_album" value="{{ $album->name_album }}" required autofocus />
                        </div>
                        <div class="mt-4">
                            <label for="deskripsi" :value="__('Description')" />
                            <textarea id="deskripsi" name="deskripsi" class="block mt-1 w-full">{{ $album->deskripsi }}</textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button class="ml-4">
                                {{ __('Update Album') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
