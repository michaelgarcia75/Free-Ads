<x-app-layout>
    <x-slot name="header">
        <div class="headerdiv">

            <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                {{ __('Ads') }}

            </h2> -->

            <div class="filterdiv">
                <form action="{{ route('ads.search') }}" method="GET">
                    @csrf
                    <div class="search">
                        <input type="text" name="query" placeholder="Search..." class="query">
                    </div>
                    <h1>FILTER BY</h1>
                    <div class='filter1'>
                        <span>Category </span>
                        <select id="category_id" class="category_id" name="category_id">
                            <option value=""> </option>
                            @foreach(getCategories() as $cat)
                            <option value="{{$cat->id}}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='filter2'>
                        <span>Location </span>
                        <input type="text" name="location" id="location" size=10>
                    </div>
                    <div class='filter3'>
                        <span>Price Range </span>
                        <input type="number" name="min" id="min" placeholder="Min">
                        <input type="number" name="max" id="max" placeholder="Max">
                    </div>
                    <x-button type="submit" class="btn-search ml-4">Search</x-button>
                </form>
            </div>
            @if (count($ads)<=1) <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ "Found " . count($ads) . " result with search : '" . $query ."' + filters" }} </h2>
                @else
                <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ "Found " . count($ads) . " results with search : '" . $query ."' (+filters)" }} </h2>
                @endif
        </div>
    </x-slot>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .headerdiv {
            width: 100%;
        }

        .headerdiv h2 {
            width: 100%;
            font-size: 13px;
            margin-top: 20px;
            text-align: center;
        }

        .filterdiv {

            text-align: center;
        }

        .filterdiv h1 {
            width: fit-content;
            display: inline-block;
            margin-right: 10px;
            font-weight: 800;
            font-style: italic;
            font-size: 15px;
        }

        .search {
            margin-bottom: 10px;
        }

        .filterdiv form {
            display: inline-block;
        }

        .filterdiv span {
            display: inline-block;
            margin-right: 10px;
            margin-left: 20px;
            font-weight: 800;
            font-style: italic;
            font-size: 13px;

        }

        .filter1 {
            display: inline-block;
            margin-right: 10px;
        }


        .filter2 {
            display: inline-block;
            margin-right: 10px;
        }

        .filter3 {
            display: inline-block;
            margin-right: 10px;
        }

        #min,
        #max {
            width: 120px;
        }

        .row {
            display: inline-flex;
            justify-content: space-around;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: stretch;
            align-content: space-around;
        }

        .card {
            height: 250px;
            width: 600px;
            margin: 20px 20px;
            display: inline-block;
            padding: 10px;
            border: 2px solid lightskyblue;
            border-radius: 5px;
            align-items: center;
        }

        .card-body {
            height: 100%;
            width: 60%;
            padding-left: 20px;
            float: right;

        }

        .card-body h1 {
            display: inline-block;
        }

        .tovdiv {
            display: inline-block;
        }

        .categoryname {
            font-size: 15px;
            color: grey;
            display: inline-block;
            height: 100%;
            width: 28%;
            text-align: end;
        }

        .titlename {
            font-size: 18px;
            color: black;
            font-weight: 900;
            display: inline-block;
            height: 100%;
            width: 70%;
        }

        .pricenamediv {
            position: absolute;
            margin-left: -185px;
            margin-top: 195px;
            border-radius: 10px;
            width: 100px;
            height: 25px;
            background-color: white;
            border: 2px solid lightskyblue;

        }

        .pricename {
            text-align: center;
            color: black;
            font-weight: 900;

        }

        .descriptionnamediv {
            width: 100%;
            height: 50%;

            margin-top: 15px;
            overflow: hidden scroll;
            font-size: 13px;
        }

        .image1 {
            height: 100%;
            width: 40%;
            border-radius: 5px;
            float: left;
        }

        .bottomdiv p {
            display: inline-block;
            margin-top: 10px;
            font-weight: 500;
            font-style: italic;

        }

        .contactdiv p {
            display: inline-block;
            margin-top: 10px;
        }

        .timestamp {
            float: right;
        }

        .contactseller {
            float: right;
        }

        .contactseller2 {
            color: blue;
            font-weight: 900;
        }

        .paginationdiv {
            background-color: whitesmoke;
        }

        .pagination {
            width: 50%;
            margin-left: 25%;
            background-color: whitesmoke;
        }

        .detail_ad {
            color: crimson;
            font-weight: 900;
        }

        @media screen and (max-width: 700px) {
            .card {
                width: 412px;
            }

            .categoryname {
                font-size: 10px;
            }

            .titlename {
                font-size: 15px;
            }

            .bottomdiv {
                font-size: 15px;
            }

            .contactdiv {
                font-size: 12px;
            }

            .pricenamediv {
                margin-left: -150px;
            }
        }
    </style>

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @guest
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endguest
        </div>
        @endif

        <div class="py-5">
            <div class="container">
                <div class="row">
                    @if($ads->isNotEmpty())
                    @foreach($ads as $ad)
                    <div class="col-md-3">
                        <div class="card">
                            <img class="image1" src="{{ asset('pictures/' . $ad->picture) }}">
                            <div class="card-body">
                                <div class="pricenamediv">
                                    <p class="pricename">{{ $ad->price }} €</p>
                                </div>
                                <div class="topdiv">
                                    <h1 class="titlename">{{ $ad->title }}</h1>
                                    <h1 class="categoryname">{{ getCategoryName($ad->category_id) }}</h1>
                                </div>
                                <div class="descriptionnamediv">
                                    <p>{{ $ad->description }}</p>
                                </div>
                                <div class="bottomdiv">
                                    <p>{{ $ad->location }}</p>
                                    <p class="timestamp"><small>{{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}</small></p>
                                </div>
                                <div class="contactdiv">
                                    <p class="detail_ad"><a href="detail/{{$ad['id']}}">See ad</a></p>
                                    <p class="contactseller">from <a class="contactseller2" href="{{ route('message.create', ['seller_id' => $ad->user_id, 'ad_id' => $ad->id]) }}">{{getSellerName($ad->user_id)}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

</x-app-layout>