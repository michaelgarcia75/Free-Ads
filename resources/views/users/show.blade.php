<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show User') }}
        </h2>
    </x-slot>

    <h1>Login : {{ $user->login }}</h1>

    <div>Email : {{ $user->email }}</div>

    <div>Phone number : {{ $user->phonenumber }}</div>

    <div>Nickname : {{ $user->nickname }}</div>

    <div>Admin : {{ $user->is_admin ? __('Yes') : __('No')}}</div>

    <div>Created at : {{ $user->created_at }}</div>

    <br>

    <!-- <p><a href="{{ route('users.index') }}" title="Back to users list">Back to users list</a></p> -->
    <x-button onclick="window.location.href='/users'">Back to users list</x-button>
</x-app-layout>