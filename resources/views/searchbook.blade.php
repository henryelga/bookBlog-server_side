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
    <br>

    <div class="text-center py-15">
        <span class="uppercase text-m py-15 text-gray-400">Search Books</span>

        <!-- Search Box -->
        <div class="sm:grid gap-6 w-4/5 mx-auto py-5">
            <form method="get" action="/searchbook" class="mb-4 flex items-center">
                <input type="text" id="inputText" name="inputText" placeholder="Start typing a book name..."
                       class="w-full flex-grow border border-gray-300 rounded-md p-2 focus:outline-none focus:border-indigo-500">
                <button type="submit"
                        class="bg-indigo-500 text-white py-2 px-4 rounded-md ml-2 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">
                    Submit
                </button>
            </form>
        </div>
        
        

        <div class="sm:grid grid-cols-3 gap-10 w-4/5 mx-auto py-15 border-b border-gray-500">
            @if (count($books) > 0)
                <?php $numBooks = min(count($books), 10); ?>
                @for ($i = 0; $i < $numBooks; $i++)
                    <?php $currentBook = $books[$i]; ?>
                    <div
                        class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white shadow-xl bg-opacity-50 hover:rounded-2xl">
                        <a href="https://openlibrary.org{{ $currentBook['seed'][0] }}" target="_blank">
                            @if (isset($currentBook['isbn']))
                                <?php
                                $isbn = $currentBook['isbn'][0];
                                $imageUrl = "https://covers.openlibrary.org/b/isbn/{$isbn}-M.jpg";
                                $imageSize = @getimagesize($imageUrl);
                                ?>
                                @if ($imageSize && $imageSize[0] > 10 && $imageSize[1] > 10)
                                    <div class="flex items-center justify-center">
                                        <img src="{{ $imageUrl }}" alt="Book Cover" class="rounded-md">
                                    </div>
                                @else
                                    <div class="flex items-center justify-center">
                                        <img src="https://149348893.v2.pressablecdn.com/wp-content/uploads/2019/03/no-image-available.png"
                                            alt="Book Cover" class="rounded-md">
                                    </div>
                                @endif
                            @else
                                <div class="flex items-center justify-center">
                                    <img src="https://149348893.v2.pressablecdn.com/wp-content/uploads/2019/03/no-image-available.png"
                                        alt="Book Cover" class="rounded-md">
                                </div>
                            @endif

                            <br>

                            <p class="font-extrabold text-gray-600 text-s">{{ $currentBook['title'] }}</p>
                            <p class="py-2 text-gray-500 text-s">Author: {{ $currentBook['author_name'][0] }}</p>
                            <p class="py-2 text-gray-500 text-s">
                                @if (isset($currentBook['first_sentence']))
                                    @if (isset($currentBook['first_sentence'][1]))
                                        {{ $currentBook['first_sentence'][1] }}...
                                    @else
                                        {{ $currentBook['first_sentence'][0] }}...
                                    @endif
                                @else
                                    N/A
                                @endif
                            </p>


                            @if (isset($currentBook['ratings_average']))
                                <p class="py-2 text-gray-500 text-s">Average Rating:
                                    {{ number_format($currentBook['ratings_average'], 1) }}</p>
                            @else
                                <p>Average Rating: N/A</p>
                            @endif

                            <p class="py-2 text-gray-500 text-s">Number of Pages:
                                @if (isset($currentBook['number_of_pages_median']))
                                    {{ $currentBook['number_of_pages_median'] }}
                                @else
                                    N/A
                                @endif
                            </p>

                            <p class="py-2 text-gray-500 text-s">
                                Published Year: {{ $currentBook['publish_year'][0] }}<br>
                                Publisher: {{ $currentBook['publisher'][0] }}
                            </p>
                        </a>
                    </div>
                @endfor
            @else
                <p>No books found in the API response.</p>
            @endif
        </div>
    @endsection
