<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Ad') }}
        </h2>
    </x-slot>

    <h1>Title : {{ $ad->title }}</h1>

    <div>Category : {{ getCategoryName($ad->category_id) }}</div>

    <div>Descripton : {{ $ad->description }}</div>

    <div>Picture : {{ $ad->picture }}</div>

    <img class="image1" src="{{ asset('pictures/' . $ad->picture) }}">

    <div>Location : {{ $ad->location }}</div>

    <div>Price : {{ $ad->price }}</div>

    <div>User_id : {{ $ad->user_id }}. {{ getSellerName($ad->user_id) }}</div>

    <div>Created at : {{ $ad->created_at }}</div>

    <br>

    <!-- <p><a href="{{ route('ads.index') }}" title="Back to ads list">Back to ads list</a></p> -->
    <x-button onclick="window.location.href='/ads'">Back to ads list</x-button>
</x-app-layout>