<x-guest-layout>
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="flex flex-col items-center justify-center px-auto py-auto mx-auto lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-600 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Gallery
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create and account
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="mt-4">
                            <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name" :value="__('Name')" />
                            <x-text-input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="username" :value="__('Username')" />
                            <x-text-input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="name" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="alamat" :value="__('Alamat')" />
                            <x-text-input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" />
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="email" :value="__('Email')" />
                            <x-text-input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password" :value="__('Password')" />
                            <x-text-input id="password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="mt-6 flex flex-col md:flex-row md:items-center md:justify-between">
                            <x-primary-button class="w-full md:w-auto mb-2 md:mb-0">
                                {{ __('Register') }}
                            </x-primary-button>
                            <p class="text-sm text-gray-600 dark:text-white md:pl-4">
                                Already have an account? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </section>
</x-guest-layout>
