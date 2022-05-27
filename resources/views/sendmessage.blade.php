<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Contact seller : ' . getSellerName($seller_id) }}
        </h2>
    </x-slot>

    <form action="{{ route('message.store') }}" method="POST" class="ml-12 mt-4">
        @csrf
        <div class="mt-4">
            <x-label for="content">Your message</x-label>
            <textarea class="mt-4" name="content" id="content" cols="100" rows="10" require autofocus></textarea>
        </div>
        <input type="hidden" name="seller_id" value="{{$seller_id}}">
        <input type="hidden" name="ad_id" value="{{$ad_id}}">
        <input type="hidden" name="buyer_id" value="{{auth()->user()->id}}">
        <x-button type="submit" class="btn btn-success">Send message</x-button>
    </form>
</x-app-layout>