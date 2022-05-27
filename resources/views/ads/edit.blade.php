<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ (isset($ad)) ? __('Edit Ad') : __('Create Ad')}}
        </h2>
    </x-slot>


    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />



    @if (isset($ad))

    <form class="ml-12" method="POST" action="{{ route('ads.update', $ad) }}" enctype="multipart/form-data">

        <!-- <input type="hidden" name="_method" value="PUT"> -->
        @method('PUT')

        @else

        <form class="ml-12" method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data">

            @endif

            @csrf

            <div class="mt-4">
                <x-label for="title" :value="__('Title')" />

                <x-input id="title" class="block mt-1 w-auto" type="text" name="title" value="{{ $ad->title ?? old('title') }}" required autofocus />
            </div>
            @error(" title") <div>{{ $message }}
            </div>
            @enderror

            <div class="mt-4">
                <x-label for="category_id" :value="__('Category')" />

                <select id="category_id" class="category_id" name="category_id">
                    <option value=""> - </option>
                    @foreach(getCategories() as $cat)
                    <option value="{{$cat->id}}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            @error("category")
            <div>{{ $message }}</div>
            @enderror

            <div class="mt-4">
                <x-label for="description" :value="__('Description')" />

                <textarea id="description" class="block mt-1 w-auto" name="description" cols="100" rows="10" required>{{ $ad->description ?? old('description') }}</textarea>
            </div>
            @error("description")
            <div>{{ $message }}</div>
            @enderror



            <div class="mt-4">
                <x-label for="picture" :value="__('Picture')" />
                @if (isset($ad->picture))
                <img class="image1" src="{{ asset('pictures/' . $ad->picture) }}">
                @endif

                <x-input id="picture" class="block mt-1 w-auto" type="file" name="picture" value="{{ $ad->picture ?? old('picture') }}" />
            </div>
            @error("picture")
            <div>{{ $message }}</div>
            @enderror



            <div class="mt-4">
                <x-label for="price" :value="__('Price')" />

                <x-input id="price" class="block mt-1 w-auto" type="text" name="price" value="{{ $ad->price ?? old('price') }}" required />
            </div>
            @error("price")
            <div>{{ $message }}</div>
            @enderror

            <div class="mt-4">
                <x-label for="location" :value="__('Location')" />

                <x-input id="location" class="block mt-1 w-auto" type="text" name="location" value="{{ $ad->location ?? old('location') }}" required />
            </div>
            @error("location")
            <div>{{ $message }}</div>
            @enderror

            <div class="mt-4">
                <x-label for="user_id" :value="__('User_id')" />

                <x-input id="user_id" class="block mt-1 w-auto" type="text" name="user_id" value="{{ $ad->user_id ?? old('user_id') }}" required />
            </div>
            @error("location")
            <div>{{ $message }}</div>
            @enderror

            <div class="flex items-center mt-4">
                <x-button>
                    {{ (isset($ad)) ? __('Edit Ad') : __('Create Ad')}}
                </x-button>
            </div>
        </form>
</x-app-layout>