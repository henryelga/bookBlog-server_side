@extends('layouts.app')

<?php
// Retrieve the search query from the URL
$searchQuery = isset($_GET['inputText']) ? $_GET['inputText'] : '';
$api_url = "https://openlibrary.org/search.json?q=" . urlencode($searchQuery);

$json_data = file_get_contents($api_url);
$data = json_decode($json_data, true);
$books = $data && isset($data['docs']) ? $data['docs'] : [];
?>

@section('content')
    <br><br>

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">Buy Books</span>
        <h2 class="text-4xl font-bold py-10">Buy Books</h2>

        <!-- Search Box -->
        <form method="get" action="/buybook">
            <label for="inputText">Enter Text:</label>
            <input type="text" id="inputText" name="inputText">
            <button type="submit">Submit</button>
        </form>
        

        <!-- Display Books -->
        <div class="sm:grid grid-cols-1 gap-5 w-4/5 mx-auto py-15 border-b border-gray-500">
            @if (count($books) > 0)
                @php $numBooks = min(count($books), 20); @endphp
                @for ($i = 0; $i < $numBooks; $i++)
                    <?php $currentBook = $books[$i]; ?>
                    <div
                        class="p-4 flex flex-col sm:flex-row items-center justify-between w-[680px] rounded-xl group bg-white shadow-xl bg-opacity-50 hover:rounded-2xl">

                        <div class="text-left">
                            <p class="font-extrabold text-gray-600 text-s">{{ $currentBook['title'] }}</p>
                        </div>

                        <div class="text-right">
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
                    </div>
                @endfor
            @else
                <p>No books found in the API response.</p>
            @endif
        </div>
    </div>
@endsection
