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

    

@endsection
