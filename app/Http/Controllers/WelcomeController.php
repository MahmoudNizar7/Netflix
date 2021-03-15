<?php

    namespace App\Http\Controllers;

    use App\Models\Movie;

    class WelcomeController extends Controller
    {
        public function index()
        {
            $latest_movies = Movie::latest()->limit(2)->get();
            return view('welcome', compact('latest_movies'));
        }
    }
