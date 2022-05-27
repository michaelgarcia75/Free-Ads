<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All ads') }}
        </h2>
    </x-slot>

    <p class="ml-12 mt-4">
        <!-- Create new add : "ads.create" -->
        <a href="{{ route('ads.create') }}" title="Create new add">Create new add</a>
    </p>

    <!-- Show existing ads -->
    <table class="ml-12 mt-4 " border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th colspan="2">Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ads as $ad)
            <tr>
                <td>
                    <!-- Display ad : "ads.show" -->
                    <a href="{{ route('ads.show', $ad) }}" title="Display ad">{{ $ad->title }}</a>
                </td>
                <td>
                    <!-- Modify ad : "ads.edit" -->
                    <a href="{{ route('ads.edit', $ad) }}" title="Modify ad">Modify</a>
                </td>
                <td> </td>
                <td>
                    <!-- Delete ad : "ads.destroy" -->
                    <form method="POST" action="{{ route('ads.destroy', $ad) }}">
                        @csrf
                        <!-- <input type="hidden" name="_method" value="DELETE"> -->
                        @method("DELETE")
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>