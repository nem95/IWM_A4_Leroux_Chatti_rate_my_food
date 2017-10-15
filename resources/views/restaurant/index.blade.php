@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tous les restaurants</h1>
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row">
                    @foreach($restaurants as $restaurant)
                        <div class="col s12 m6 l4">
                            <a class="restaurant__cards-link" href="{{ route('restaurant.show', $restaurant->id) }}">
                                <div class="card">
                                    <div class="card-image">
                                        <img class="responsive-img" src="{{ asset($restaurant->pictures->first() ? $restaurant->pictures->first()->path :
                            'img/default_restaurant_picture.jpg') }}">
                                        <span class="card-title">{{ $restaurant->name }}</span>
                                    </div>
                                    <div class="card-content">
                                        <p>{{ str_limit($restaurant->description, 150) }}</p>
                                        <p>{{ $restaurant->address }}, {{ $restaurant->city }} {{ $restaurant->zip_code }}</p>
                                    </div>
                                    <div class="card__link">
                                        <span>voir</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    <div class="col s12 center-align">
                        {{ $restaurants->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection