<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My ads') }}
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
            font-weight: 300;
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
                                <p><a href="detail/{{$ad['id']}}">See ad</a></p>

                                <p class="contactseller"><a onclick="return confirm('Are you sure to delete ad : {{$ad->title}} ?')" href="destroy/{{$ad['id']}}">Delete ad</a></p>
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