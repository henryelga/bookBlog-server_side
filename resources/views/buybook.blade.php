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
        <span class="uppercase text-m py-15 text-gray-400">Buy Books</span>

        <!-- Search Box -->
        <div class="sm:grid gap-6 w-4/5 mx-auto py-5">
            <form method="get" action="/buybook" class="mb-4 flex items-center">
                <input type="text" id="inputText" name="inputText" placeholder="Start typing a book name..."
                       class="w-full flex-grow border border-gray-300 rounded-md p-2 focus:outline-none focus:border-indigo-500">
                <button type="submit"
                        class="bg-indigo-500 text-white py-2 px-4 rounded-md ml-2 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">
                    Submit
                </button>
            </form>
        </div>
        

        <!-- Display Books -->
        
            @if (count($books) > 0)<div class="sm:grid grid-cols-1 gap-5 w-4/5 mx-auto py-15 border-b border-gray-500">
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
