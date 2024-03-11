@extends('layouts.app')

<?php
$api_url = 'http://api.quotable.io/random';
$quote = json_decode(file_get_contents($api_url));
?>

<?php
$api_url = 'https://openlibrary.org/search.json?q=sherlock+holmes';
$json_data = file_get_contents($api_url);
$data = json_decode($json_data, true);
$books = $data && isset($data['docs']) ? $data['docs'] : [];
?>

@section('content')
    <br><br>

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">Buy Books</span>
        <h2 class="text-4xl font-bold py-10">Buy Books</h2>

        <div class="sm:grid grid-cols-1 gap-10 w-4/5 mx-auto py-15 border-b border-gray-500">
            @if (count($books) > 0)
                @foreach ($books as $currentBook)
                    <div
                        class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white shadow-xl bg-opacity-50 hover:rounded-2xl">

                        <p class="font-extrabold text-gray-600 text-s">{{ $currentBook['title'] }}</p>

                        @if (!empty($currentBook['id_amazon'][0]))
                            <p class="py-2 text-gray-500 text-s">
                                <a href="https://www.amazon.com/dp/{{ $currentBook['id_amazon'][0] }}" target="_blank">
                                    Buy on Amazon
                                </a>
                            </p>
                        @else
                            <p class="py-2 text-gray-500 text-s">No Amazon link available</p>
                        @endif
                    </div>
                @endforeach
            @else
                <p>No books found in the API response.</p>
            @endif
        </div>
    </div>
@endsection
