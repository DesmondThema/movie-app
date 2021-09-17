@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Available Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($movies as $movie)
                    <div class="mt-8 mb-4">
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="mt-2">
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <span class="text-lg mt-2 hover:text-gray-300">{{ $movie['title'] }} </span>
                            </div>
                                <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                        </div>
                        <div class=" mt-4">
                            <span> <livewire:mark-as-favourite :movie="$movie" /> </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 bg-gray-200 text-center rounded mb-6">{{ $movies->links() }}</div>
@endsection
