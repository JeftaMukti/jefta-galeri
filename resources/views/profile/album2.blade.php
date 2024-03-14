<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Album') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Album: {{ $album->name_album }}</h1>
                    
                    <!-- Display images in the album -->
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        @foreach ($photos as $photo)
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('images/' . $photo->image) }}" alt="{{ $photo->judul_foto }}" class="w-full h-auto">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold mb-2">{{ $photo->judul_foto }}</h3>
                                <p class="text-gray-500">{{ $photo->deskripsi_foto }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Pagination links -->
                    <div class="mt-4">
                        {{ $photos->links() }}
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
