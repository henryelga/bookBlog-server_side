@extends('layouts.app')

@section('content')
    <div class="mt-5 pb-6 rounded-xl group space-x-6 bg-white  shadow-xl bg-opacity-50 hover:rounded-2xl mx-20">
        <header class="bg-opacity-75 font-semibold bg-gray-400 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md text-lg">
            Add New Post</header>

        @if ($errors->any())
        <div class="flex">
            <div class="w-3/5 m-auto text-center pt-4">
                {{-- <ul> --}}
                    @foreach ($errors->all() as $error)
                        <p class=" mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                            {{ $error }}
                        </p>
                    @endforeach
                {{-- </ul> --}}
            </div>
        </div>
        @endif

        <div class="m-auto pt-10 pl-20 pr-20">
            <form action="/blog" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="title" placeholder="Title..."
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">

                <textarea name="description" placeholder="Description..."
                    class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

                <div class="bg-grey-lighter pt-15">
                    <label
                        class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                        <span class="mt-2 text-base leading-normal">
                            Select a file
                        </span>
                        <input type="file" name="image" class="hidden">
                    </label>
                </div>

                <button type="submit"
                    class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit Post
                </button>
            </form>
        </div>
    </div>

@endsection
