@extends('layouts.app')
@section('content')

    <section id="banner">

        @include('layouts._nav')

        <div class="movies owl-carousel owl-theme">

            @foreach($latest_movies as $movie)

                <div class="movie text-white d-flex justify-content-center align-items-center">

                    <div class="movie__bg"
                         style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.6)), url({{ $movie->image_path }}) center/cover no-repeat;">
                    </div>

                    <div class="container">
                        <div class="row">

                            <div class="col-md-6">

                                <div class="d-flex justify-content-between">
                                    <h1 class="movie__name fw-300">{{ $movie->name }}</h1>
                                    <span class="movie__year align-self-center">{{ $movie->year }}</span>
                                </div>

                                <div class="d-flex movie__rating my-1">
                                    <div class="d-flex">
                                        @for($i = 0; $i < $movie->rating; $i++)
                                            <span class="fas fa-star text-primary mr-2"></span>
                                        @endfor
                                    </div>
                                    <span class="align-self-center">{{ $movie->rating }}</span>
                                </div>

                                <p class="movie__description my-2">{{ $movie->description }}</p>

                                <div class="movie__cta my-4">
                                    <a href="show.html" class="btn btn-primary text-capitalize mr-0 mr-md-2"><span
                                            class="fas fa-play"></span> watch now</a>
                                    <a href="#" class="btn btn-outline-light text-capitalize"><span class="fas fa-heart"></span>
                                        add to favorite</a>
                                </div>
                            </div><!-- end of col -->

                            <div class="col-6 mt-2 mx-auto col-md-4 col-lg-3  ml-md-auto mr-md-0">
                                <img src="{{ $movie->poster_path }}" class="img-fluid" alt="">
                            </div>
                        </div><!-- end of row -->
                    </div><!-- end of container -->

                </div><!-- end of movie -->

            @endforeach

        </div><!-- end of movies -->


    </section><!-- end of banner section-->

    <section class="listing py-2">

        <div class="container">

            <div class="row my-4">
                <div class="col-12 d-flex justify-content-between">
                    <h3 class="listing__title text-white fw-300">Drama</h3>
                    <a href="" class="align-self-center text-capitalize text-primary">see all</a>
                </div>
            </div><!-- end of row -->

            <div class="movies owl-carousel owl-theme">

                <div class="movie p-0">
                    <img src="{{ asset('images/mortal_engines.jpg') }}" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i>
                                watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

                <div class="movie p-0">
                    <img src="{{ asset('images/gemni.jpg') }}" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i>
                                watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

                <div class="movie p-0">
                    <img src="{{ asset('images/avatar.jpg') }}" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i>
                                watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

                <div class="movie p-0">
                    <img src="{{ asset('images/iron.jpg') }}" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i>
                                watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

            </div><!-- end of row -->

        </div><!-- end of container -->

    </section><!-- end of listing section -->

    <section class="listing py-2">

        <div class="container">

            <div class="row my-4">
                <div class="col-12 d-flex justify-content-between">
                    <h3 class="listing__title text-white fw-300">Action</h3>
                    <a href="" class="align-self-center text-capitalize text-primary">see all</a>
                </div>
            </div><!-- end of row -->

            <div class="movies owl-carousel owl-theme">

                <div class="movie p-0">
                    <img src="{{ asset('images/mortal_engines.jpg') }}" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i>
                                watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

                <div class="movie p-0">
                    <img src="{{ asset('images/gemni.jpg') }}" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i>
                                watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

                <div class="movie p-0">
                    <img src="{{ asset('images/avatar.jpg') }}" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i>
                                watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

                <div class="movie p-0">
                    <img src="{{ asset('images/iron.jpg') }}" class="img-fluid" alt="">

                    <div class="movie__details text-white">

                        <div class="d-flex justify-content-between">
                            <p class="mb-0 movie__name">Movie Name</p>
                            <p class="mb-0 movie__year align-self-center">2019</p>
                        </div>

                        <div class="d-flex movie__rating">
                            <div class="mr-2">
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                                <i class="fas fa-star text-primary mr-1"></i>
                            </div>
                            <span>4.7</span>
                        </div>

                        <div class="movie___views">
                            <p>Views: 300</p>
                        </div>

                        <div class="d-flex movie__cta">
                            <a href="" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i>
                                watch now</a>
                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                        </div>

                    </div><!-- end of movie details -->

                </div><!-- end of col -->

            </div><!-- end of row -->

        </div><!-- end of container -->

    </section><!-- end of listing section -->


    @include('layouts._footer')

@stop
