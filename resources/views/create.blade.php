<x-app-layout>
       <x-slot name="header">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                     {{ __('Create New Add') }}
              </h2>
       </x-slot>


       <!-- Validation Errors -->
       <x-auth-validation-errors class="mb-4" :errors="$errors" />

       <form class="ml-12" method="POST" action="{{ route('ad.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="mt-4">
                     <x-label for="title" :value="__('Title')" />

                     <x-input id="title" class="block mt-1 w-auto" type="text" name="title" required autofocus />
              </div>
              @error("title")
              <div>{{ $message }}</div>
              @enderror

              <div class="mt-4">
                     <x-label for="category_id" :value="__('Category')" />

                     <!-- <x-input id="category_id" class="block mt-1 w-auto" type="integer" name="category_id" required /> -->

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

                     <textarea id="description" class="block mt-1 w-auto" name="description" cols="100" rows="10" required></textarea>
              </div>
              @error("description")
              <div>{{ $message }}</div>
              @enderror

              <div class="mt-4">
                     <x-label for="picture" :value="__('Picture')" />

                     <x-input id="picture" class="block mt-1 w-auto" type="file" name="picture" required />
              </div>
              @error("picture")
              <div>{{ $message }}</div>
              @enderror

              <div class="mt-4">
                     <x-label for="price" :value="__('Price')" />

                     <x-input id="price" class="block mt-1 w-auto" type="text" name="price" required />
              </div>
              @error("price")
              <div>{{ $message }}</div>
              @enderror

              <div class="mt-4">
                     <x-label for="location" :value="__('Location')" />

                     <x-input id="location" class="block mt-1 w-auto" type="text" name="location" required />
              </div>
              @error("location")
              <div>{{ $message }}</div>
              @enderror

              <div class="flex items-center mt-4">
                     <x-button>
                            {{ __('Create Add')}}
                     </x-button>
              </div>
       </form>
</x-app-layout>