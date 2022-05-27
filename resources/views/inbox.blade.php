<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inbox') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($messages as $message)
                <div class="p-2 bg-white border-b border-gray-200 my-4">
                    <h2>Message from {{ getBuyerName($message->buyer_id) }} : </h2>
                    <p>{{$message->content}}</p>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>