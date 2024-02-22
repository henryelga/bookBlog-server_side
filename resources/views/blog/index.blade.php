@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Blog Posts
            </h1>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    @if (Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a href="/blog/create"
                class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                Create post
            </a>
        </div>
    @endif

    @foreach ($posts as $post)
        <div class="p-4 pb-15 pt-10 mx-20 my-4 flex items-center w-50 group shadow-xl bg-opacity-50">
            <img src="{{ asset('images/' . $post->image_path) }}" width="350" class="mr-4" alt="">

            <div>
                <p class="text-gray-800 text-xs pb-2">By <span class="font-bold italic">{{ $post->user->name }}</span>,
                    Created
                    on {{ date('jS M Y', strtotime($post->updated_at)) }}</p>
                <h2 class="font-extrabold text-gray-600 text-4xl">{{ $post->title }}</h2>
                <p class="mb-3 py-6 text-gray-700 text-s leading-8 font-light">{{ $post->description }}</p>
                <a href="/blog/{{ $post->slug }}"
                    class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Keep
                    Reading</a>
            </div>

            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <div class="ml-auto">
                    <a href="/blog/{{ $post->slug }}/edit"
                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">Edit</a>
                    <form action="/blog/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="text-red-500 pr-3" type="submit">Delete</button>
                    </form>
                </div>
            @endif
        </div>

        {{-- <div
            class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white  shadow-xl bg-opacity-50 hover:rounded-2xl">
            <img src="{{ asset('images/' . $post->image_path) }}" width="700" alt="">

            <p class="py-2 text-gray-800 text-xs">By <span
                    class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on
                {{ date('jS M Y', strtotime($post->updated_at)) }}</p>
            <p class="font-extrabold text-gray-600 text-s">
                {{ $post->title }}
            </p>

            <p class="py-6 text-gray-700 text-s leading-8 font-light">
                {{ $post->description }}
            </p>


            <a href="/blog/{{ $post->slug }}"
                class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Keep Reading
            </a>

            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <span class="float-right">
                    <a href="/blog/{{ $post->slug }}/edit"
                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                        Edit
                    </a>
                </span>

                <span class="float-right">
                    <form action="/blog/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('delete')

                        <button class="text-red-500 pr-3" type="submit">
                            Delete
                        </button>

                    </form>
                </span>
            @endif
        </div> --}}
    @endforeach
@endsection
