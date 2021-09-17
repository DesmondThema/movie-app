<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use App\Helpers\General\CollectionHelper;

class MoviesController extends Controller
{
    public function allMovies()
    {

        $popularMovies = Http::withHeaders(['Authorization' => config('services.tmdb.token')])
            ->get(config('services.tmdb.popular_movies'))
            ->collect('results')->take(16);

        $showingMovies = Http::withHeaders(['Authorization' => config('services.tmdb.token')])
            ->get(config('services.tmdb.showing_movies'))
            ->collect('results')->take(16);

        $topRateMovies = Http::withHeaders(['Authorization' => config('services.tmdb.token')])
            ->get(config('services.tmdb.top_movies'))
            ->collect('results')->take(17);

        $movies = new Collection();

        $movies = $movies->merge($popularMovies);
        $movies = $movies->merge($showingMovies);
        $movies = $movies->merge($topRateMovies);

       return view('index', [
           'allMovies' => $movies,
           'movies' => CollectionHelper::paginate($movies, 9),
        ]);
    }

    public function favouriteMovies()
    {
        $favouriteMovies = Http::withHeaders(['Authorization' => config('services.tmdb.token')])
            ->get('https://api.themoviedb.org/3/account/{account_id}/favorite/movies?session_id=a0cc5030e22f46d128dcb82259dfe4e60f5f025f')
            ->collect('results')->take(20);

        return view('favourites', [
            'favouriteMovies' => $favouriteMovies
        ]);
    }
}
