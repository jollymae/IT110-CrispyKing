<x-app-layout>
    <!-- Page Header Section -->
    <x-slot name="header">
        <!-- Header Content: Displaying a dynamic header based on the provided $header variable -->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $header }}
        </h2>
    </x-slot>

    <!-- Page Content Section -->
    <div class="py-12">
        <!-- Display Success Alert If Exists -->
        @if ( session('status') )
        <!-- Success Alert Container -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <!-- Alert Message: Displaying success message -->
                <span class="font-medium">Success alert!</span> {{ session('status') }}
            </div>
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form Container: Wraps the entire form section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Form Content: Styling and shadow for the form -->
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- User Form: Form for adding or updating user information -->
                    <form method="POST"
                        action="{{ ( url()->current() == url('/users/add') ) ? url('/users/add'):url('/users/update/' . $user->id) }}">
                        @csrf
                        <!-- CSRF Token: Protects against cross-site request forgery -->

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="( url()->current() == url('/users/add') ) ? old('name'):$user->name" required
                                autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="( url()->current() == url('/users/add') ) ? old('email'):$user->email"
                                required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        @if( url()->current() == url('/users/add') )
                        <!-- Conditionally Display Password Field for User Addition -->
                        <!-- Password Section: Displayed only when adding a new user -->
                        <div class="mt-4">
                            <!-- Password Input Label -->
                            <x-input-label for="password" :value="__('Password')" />

                            <!-- Password Input Field -->
                            <x-text-input id="password" class="block mt-1 w-full" type="text" name="password"
                                autocomplete="new-password" />

                            <!-- Display Password Input Errors -->
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        @endif

                        <!-- Form Submission Section -->
                        <div class="flex items-center justify-end mt-4">
                            <!-- Submit Button: Uses a primary button component -->
                            <x-primary-button class="ml-4">
                                {{ $header }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>