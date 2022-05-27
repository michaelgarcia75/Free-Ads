<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ads') }}
        </h2>
    </x-slot>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .row {
            display: inline-flex;
            justify-content: space-around;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: stretch;
            align-content: center;
        }

        .card {
            height: 900px;
            width: 600px;
            margin: 20px 20px;
            display: inline-block;
            padding: 10px;
            border: 2px solid lightskyblue;
            border-radius: 5px;
            align-items: center;
        }

        .card-body {
            height: 50%;
            width: 100%;
        }

        .tovdiv {
            display: block;
        }

        .categoryname {
            font-size: 15px;
            color: grey;
            display: block;
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
            border-radius: 10px;
            width: 100px;
            height: 25px;
            background-color: white;
            border: 2px solid lightskyblue;
            margin-bottom: 10px;

        }

        .descriptiontitle h2 {
            font-weight: 900;
            width: 87px;
            border-bottom: 2px solid black;
        }

        .pricename {
            text-align: center;
            color: black;
            font-weight: 900;

        }

        .descriptionnamediv {
            width: 100%;
            height: 50%;
            margin-bottom: 30px;
            margin-top: 15px;
            overflow: hidden scroll;
            font-size: 13px;
        }

        .image1 {
            height: 50%;
            width: 100%;
            border-radius: 5px;

        }

        .locationtitle h3 {
            font-weight: 900;
            width: 65px;
            border-bottom: 2px solid black;
        }


        .bottomdiv p {
            display: block;
            font-style: italic;
            font-weight: 500;

        }

        .contactdiv p {
            display: inline-block;

        }

        .timestamp {
            float: left;
        }

        .contactseller {
            float: right;
        }

        .contactseller2 {
            color: blue;
            font-weight: 900;
        }

        .delete {
            text-align: center;
            text-decoration: underline;
            padding-bottom: 30px;
            font-weight: 800;
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
                    <div class="col-md-3">
                        <div class="card">
                            <img class="image1" src="{{ asset('pictures/' . $ad->picture) }}">
                            <div class="card-body">
                                <div class="topdiv">
                                    <h1 class="titlename">{{ $ad->title }}</h1>
                                    <h1 class="categoryname">{{ getCategoryName($ad->category_id) }}</h1>
                                </div>
                                <div class="pricenamediv">
                                    <p class="pricename">{{ $ad->price }} €</p>
                                </div>
                                <div class="descriptiontitle">
                                    <h2>Description</h2>
                                </div>
                                <div class="descriptionnamediv">
                                    <p>{!! nl2br($ad->description) !!}</p>
                                </div>
                                <div class="locationtitle">
                                    <h3>Location</h3>
                                </div>
                                <div class="bottomdiv">
                                    <p>{{ $ad->location }}</p>
                                    <p class="timestamp"><small>{{ $ad->created_at }}</small></p>
                                </div>
                                <div class="contactdiv">
                                    <p class="contactseller">from <a class="contactseller2" href="{{ route('message.create', ['seller_id' => $ad->user_id, 'ad_id' => $ad->id]) }}">{{getSellerName($ad->user_id)}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @auth
    @if ($ad->user_id == auth()->user()->id)
    <p class="delete"><a onclick="return confirm('Are you sure to delete ad : {{$ad->title}} ?')" href="destroy/{{$ad['id']}}">Delete ad</a></p>
    @endif
    @endauth


</x-app-layout>