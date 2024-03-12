@extends('layouts.app')

<?php
$timeout = 150;

// Retrieve the search query from the URL
$searchQuery = isset($_GET['inputText']) ? $_GET['inputText'] : '';
// $searchQuery = 'J K Rowling';
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
    

    <!-- Search Box -->
    <div class="sm:grid gap-6 w-4/5 mx-auto py-5">
        <form method="get" action="/authors" class="mb-4 flex items-center">
            <input type="text" id="inputText" name="inputText" placeholder="Start typing author name..."
                class="w-full flex-grow border border-gray-300 rounded-md p-2 focus:outline-none focus:border-indigo-500">
            <button type="submit"
                class="bg-indigo-500 text-white py-2 px-4 rounded-md ml-2 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">
                Submit
            </button>
        </form>
    </div>

    
        @if (count($authors) > 0)
        <div class="p-4 mx-10 my-4 rounded-xl bg-white shadow-xl bg-opacity-50 hover:rounded-2xl">
            @for ($i = 0; $i < min(5, count($authors)); $i++)
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
    
                    // Check if 'bio' key exists, if not, skip to the next iteration
                    if (!array_key_exists('bio', $authorDetails)) {
                        continue;
                    }
    
                    // Display the relevant information
                    ?>
                <p class="font-extrabold text-gray-600 text-lg">{{ $authorDetails['name'] }}</p><br>
                <p class="py-2 text-gray-500 text-s">{{ $authorDetails['bio'] }}</p>
                @if (isset($authorDetails['birth_date']))
                    <p class="py-2 text-gray-500 text-s"><span class="font-semibold">Date of Birth:</span> {{ $authorDetails['birth_date'] }}</p>
                @endif
                @if (array_key_exists('top_work', $currentAuthor))
                    <p class="py-2 text-gray-500 text-s"><span class="font-semibold">Top Work:</span> {{ $currentAuthor['top_work'] }}</p>
                @endif
                @if (array_key_exists('work_count', $currentAuthor))
                    <p class="py-2 text-gray-500 text-s"><span class="font-semibold">Work Count:</span> {{ $currentAuthor['work_count'] }}</p>
                @endif
                @if (array_key_exists('top_subjects', $currentAuthor) && is_array($currentAuthor['top_subjects']))
                    <p class="py-2 text-gray-500 text-s"><span class="font-semibold">Top Subjects:</span></p>
                    <ul class="py-2 text-gray-500 text-s list-disc ml-10">
                        @foreach (array_slice($currentAuthor['top_subjects'], 0, 3) as $subject)
                            <li>{{ $subject }}</li>
                        @endforeach
                    </ul>
                @endif
                @if (isset($authorDetails['links']) && is_array($authorDetails['links']))
                    <ul>
                        @foreach ($authorDetails['links'] as $link)
                            <li>
                                <p class="py-2 text-gray-500 text-s font-semibold">{{ $link['title'] }}:
                                    <a class="py-2 text-gray-800 text-s no-underline hover:underline"
                                        href="{{ $link['url'] }}" target="_blank">{{ $link['url'] }}</a>
                                </p>
                            </li>
                        @endforeach
                    </ul>
                @endif
                @if (isset($authorDetails['wikipedia']))
                    <p class="py-2 text-gray-500 text-s font-semibold">Wikipedia: <a
                            class="py-2 text-gray-800 text-s no-underline hover:underline"
                            href="{{ $authorDetails['wikipedia'] }}" target="_blank">{{ $authorDetails['name'] }}</a>
                    </p>
                @endif
                @if (!empty($authorDetails['remote_ids']['amazon']))
                    <p class="py-2 text-gray-500 text-s font-semibold">
                        Look up works of {{ $authorDetails['name'] }} in Amazon:
                        <a class="py-2 text-gray-800 text-s no-underline hover:underline" href="https://www.amazon.com/s?k={{ $authorDetails['remote_ids']['amazon'] }}" target="_blank">
                            https://www.amazon.com/s?k={{ $authorDetails['remote_ids']['amazon'] }}
                        </a>
                    </p>
                @endif
                <?php
                } else {
                    // Display an error message if unable to fetch author details
                    echo 'Error fetching author details.';
                }
                ?>
            @endfor
        </div>
        @else
            <p>No authors found in the API response.</p>
        @endif
    </div>

@endsection
