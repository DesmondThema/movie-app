<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search >= 2)) {
            $searchResults = Http::withHeaders(
                [
                    'Authorization' => config('services.tmdb.token'),
                ]
            )
                ->get(sprintf('%s%s', config('services.tmdb.search_url'), $this->search))
                ->json()['results'];
        }


        //dump($searchResults);


        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(5)
        ]);
    }
}
