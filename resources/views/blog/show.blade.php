@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-left pt-15">
        <div class="py-5 border-t-2 border-gray-500">
            <h1 class="text-6xl">
                {{ $post->title }}
            </h1>
        </div>
        <span class="text-gray-500">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on
            {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>
    </div>

    <div class="w-4/5 m-auto pt-20">

        <div class="flex justify-center">
            <img src="{{ asset('images/' . $post->image_path) }}" width="200" class="mr-4 rounded-xl" alt="">
        </div>
        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{ $post->description }}
        </p>
    </div>
@endsection
