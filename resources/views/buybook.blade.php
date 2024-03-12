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

   
@endsection
