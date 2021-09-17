<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class MarkAsFavourite extends Component
{
    public $movie;

    public function mark($movie)
    {
        if (Auth::check()) {
            Http::withHeaders(
                [
                    'Authorization' => config('services.tmdb.token'),
                    'Content-Type' => 'application/json'
                ]
            )
                ->post('https://api.themoviedb.org/3/account/{account_id}/favorite?api_key=aae6077e799302b1725175689c0f021c&session_id=a0cc5030e22f46d128dcb82259dfe4e60f5f025f', [
                    'media_type' => 'movie',
                    'media_id' => $movie,
                    'favorite' => true,
                    'account_id' => 10111,
                ]);

            $this->emit('saved');
        } else {
            return Redirect::to('/login');
        }
    }

    public function render()
    {
        return view('livewire.mark-as-favourite');
    }
}
