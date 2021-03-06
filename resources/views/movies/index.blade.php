@extends('layouts.app')

@section('content')

    <section class="listing text-white" style="height: 100vh; padding: 8% 0;">

        @include('layouts._nav')

        <div class="container">

            <div class="row">
                <div class="col">
                    <h2 class="fw-300">{{ request()->category_name ?? 'Favorite' }} Movies</h2>
                </div>
            </div>

            <div class="row my-3 {{ request()->favorite ? 'favorite' : '' }}">

                @if($movies->count() > 0)

                    @foreach($movies as $movie)

                    <div class="movie col-md-3">
                        <img src="{{ $movie->poster_path }}" class="img-fluid" alt="">

                        <div class="movie__details text-white">

                            <div class="d-flex justify-content-between">
                                <p class="mb-0 movie__name">{{ $movie->name }}</p>
                                <p class="mb-0 movie__year align-self-center">{{ $movie->year }}</p>
                            </div>

                            <div class="d-flex movie__rating">
                                <div class="mr-2">

                                    @for($i = 0; $i < $movie->rating; $i++)

                                        <i class="fas fa-star text-primary mr-1"></i>

                                    @endfor

                                </div>
                                <span>{{ $movie->rating }}</span>
                            </div>

                            <div class="movie___views">
                                <p>Views : {{ $movie->views }}</p>
                            </div>

                            <div class="d-flex movie__cta">
                                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i>watch now</a>

                                @auth
                                    <i class="far fa-heart {{ $movie->is_favored ? 'fw-900' : '' }} fa-1x align-self-center movie__fav-icon movie-{{ $movie->id }}"
                                       data-movie-id="{{ $movie->id }}" data-url="{{ route('movies.toggle_favorite', $movie->id) }}" style="cursor: pointer"
                                    >

                                    </i>
                                @else
                                    <a href="{{ route('login') }}" class="text-white align-self-center"><i class="far fa-heart fa-1x align-self-center movie__fav-icon" style="cursor: pointer"></i></a>
                                @endauth

                            </div>

                        </div><!-- end of movie details -->

                    </div><!-- end of col -->


                @endforeach

                @else

                    <div class="col">

                        <h5 class="fw-300">Sorry no movies found</h5>

                    </div>
                @endif
            </div>

        </div>

    </section>

@stop
