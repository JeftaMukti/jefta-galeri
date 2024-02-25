<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Photo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('photos.update', $photo->id) }}" enctype="multipart/form-data" id="photoForm">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="judul_foto" class="block text-sm font-medium text-gray-600">Title</label>
                            <input type="text" name="judul_foto" id="judul_foto" class="mt-1 p-2 w-full border rounded-md" value="{{ old('judul_foto', $photo->judul_foto) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi_foto" class="block text-sm font-medium text-gray-600">Description</label>
                            <textarea name="deskripsi_foto" id="deskripsi_foto" class="mt-1 p-2 w-full border rounded-md" required>{{ old('deskripsi_foto', $photo->deskripsi_foto) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-600">Image</label>
                            <input type="file" name="image" id="image" class="mt-1 p-2 w-full border rounded-md" accept="image/*" onchange="previewImage(event)">
                            <img id="imagePreview" class="mt-2 w-full" src="{{ asset('images/' . $photo->image) }}" alt="Photo Image">
                        </div>

                        <div class="mb-4">
                            <label for="album_id" class="block text-sm font-medium text-gray-600">Album</label>
                            <select name="album_id" id="album_id" class="mt-1 p-2 w-full border rounded-md" required>
                                @foreach ($albums as $album)
                                    <option value="{{ $album->id }}" @if($album->id == $photo->album_id) selected @endif>{{ $album->name_album }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var img = document.getElementById('imagePreview');
                img.src = reader.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
</x-app-layout>
