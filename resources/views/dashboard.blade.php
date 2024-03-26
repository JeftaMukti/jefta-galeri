<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {!! Toastr::message() !!}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('search') }}" method="GET" class="relative flex items-center">
                    <input type="text" name="query" class="w-full border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring focus:border-indigo-500" placeholder="Search users...">
                    <button type="submit" class="ml-4 px-4 py-2 bg-black text-white font-semibold rounded-md hover:bg-gray-900 focus:outline-none focus:bg-gray-900">Search</button>
                </form>

                <div class="mt-4">
                    @if(isset($users) && count($users) > 0)
                        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($users as $user)
                                <li>
                                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                                        <a href="{{ route('profile.index2', $user->id) }}" class="block">
                                            <p class="w-full h-48 object-cover rounded-t-lg">{{ $user->username }}</p>
                                        </a>
                                        <div class="p-4">
                                            <a href="{{ route('profile.index2', $user->id) }}" class="font-semibold text-lg text-indigo-600 hover:text-indigo-800">{{ $user->name }}</a>
                                            <p class="text-gray-500">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No users found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
