@extends('layouts.app')

<?php
$timeout = 150;

// Retrieve the search query from the URL
// $searchQuery = isset($_GET['inputText']) ? $_GET['inputText'] : '';
$searchQuery = "J K Rowling";
$api_url = 'https://openlibrary.org/search/authors.json?q=' . urlencode($searchQuery);

// Set the time limit
set_time_limit($timeout);

$json_data = @file_get_contents($api_url);

if ($json_data === false) {
    // Display a message when the timeout occurs
    echo 'Took too long to load. Please try again later.';
    exit();
}

$data = json_decode($json_data, true);
$authors = $data && isset($data['docs']) ? $data['docs'] : [];
?>

@section('content')
    <br>

    <div class="text-center py-15">
        <span class="uppercase text-m py-15 text-gray-400">Look Up Authors</span>
    </div>

    <div class="sm:grid grid-cols-3 gap-10 w-4/5 mx-auto py-15 border-b border-gray-500">
        @if (count($authors) > 0)
            @for ($i = 0; $i < 1; $i++)
                <?php $currentAuthor = $authors[$i]; ?>

                <?php
                // Extract the author key
                $authorKey = $currentAuthor['key'];
                
                // Build the author details URL
                $authorDetailsURL = 'https://openlibrary.org/authors/' . $authorKey . '.json';

                // Make a request to the author details URL
                $authorDetailsJSON = @file_get_contents($authorDetailsURL);

                if ($authorDetailsJSON !== false) {
                    // Parse the JSON response
                    $authorDetails = json_decode($authorDetailsJSON, true);

                    // Display the relevant information
                    ?>
                    <div class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white shadow-xl bg-opacity-50 hover:rounded-2xl">
                        <p class="font-extrabold text-gray-600 text-s">{{ $authorDetails['name'] }}</p>
                        <p class="py-2 text-gray-500 text-s">
                            {{ $authorDetails['bio'] ?? 'Bio: N/A' }}
                        </p>
                        
                        @if (isset($authorDetails['links']) && is_array($authorDetails['links']))
                            <p class="py-2 text-gray-500 text-s">Links:</p>
                            <ul>
                                @foreach ($authorDetails['links'] as $link)
                                    <li>
                                        <a href="{{ $link['url'] }}" target="_blank">{{ $link['title'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                <?php
                } else {
                    // Display an error message if unable to fetch author details
                    echo 'Error fetching author details.';
                }
                ?>
            @endfor
        @else
            <p>No authors found in the API response.</p>
        @endif
    </div>
@endsection
