<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ (isset($user)) ? __('Edit User') : __('Create User')}}
        </h2>
    </x-slot>


    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />



    @if (isset($user))

    <form class="ml-12" method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">

        <!-- <input type="hidden" name="_method" value="PUT"> -->
        @method('PUT')

        @else

        <form class="ml-12" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">

            @endif

            @csrf

            <!-- Login -->
            <div class="mt-4">
                <x-label for="login" :value="__('Login')" />

                <x-input id="login" class="block mt-1 w-auto" type="text" name="login" value="{{ isset($user->login) ? $user->login : old('login') }}" required autofocus />
            </div>
            @error("login")
            <div>{{ $message }}</div>
            @enderror

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-auto" type="email" name="email" value="{{ isset($user->email) ? $user->email : old('email') }}" required />
            </div>
            @error("email")
            <div>{{ $message }}</div>
            @enderror

            <!-- Phone number -->
            <div class="mt-4">
                <x-label for="phonenumber" :value="__('Phone Number')" />

                <x-input id="phonenumber" class="block mt-1 w-auto" type="text" name="phonenumber" value="{{ isset($user->phonenumber) ? $user->phonenumber : old('phonenumber') }}" required />
            </div>
            @error("phonenumber")
            <div>{{ $message }}</div>
            @enderror

            <!-- Nickname -->
            <div class="mt-4">
                <x-label for="nickname" :value="__('Nickname')" />

                <x-input id="nickname" class="block mt-1 w-auto" type="text" name="nickname" value="{{ isset($user->nickname) ? $user->nickname : old('nickname') }}" required autofocus />
            </div>
            @error("nickname")
            <div>{{ $message }}</div>
            @enderror

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-auto" type="password" name="password" required autocomplete="new-password" />
            </div>
            @error("password")
            <div>{{ $message }}</div>
            @enderror

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-auto" type="password" name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <x-label :value="__('Admin')" />
                <input type="checkbox" id="is_admin" class="block mt-1" name="is_admin" value="1" {{ (isset($user) && $user->is_admin ) ? 'checked' : '' }} />
            </div>

            <div class="flex items-center mt-4">
                <x-button>
                    {{ (isset($user)) ? __('Edit User') : __('Create User')}}
                </x-button>
            </div>
        </form>
</x-app-layout>