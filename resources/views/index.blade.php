@extends('layouts.app')

@section('content')
    {{-- <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Do you want to become a developer?
                </h1>
                <a href="/blog" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Read More
                </a>
            </div>
        </div>
    </div> --}}

    {{-- <div class="m-auto pt-4 sm:m-auto w-4/5 block text-left">
        <h1 class="sm:text-gray-800 text-5xl font-bold text-shadow-md pb-1">
            Book Buzz
        </h1>
    </div> --}}
    <br><br>
    <div class="sm:grid grid-cols-2 gap-10 w-4/5 mx-auto py-15 border-b border-gray-200 p-5 w-[680px] rounded-xl group sm:flex space-x-6 bg-white bg-opacity-50 shadow-xl hover:rounded-2xl">
        <div>
            <img src="https://images.pexels.com/photos/694740/pexels-photo-694740.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                width="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-5/6 block ">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Struggling to be a better web developer?
            </h2>

            <p class="py-8 text-gray-500 text-s">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
            </p>

            <p class="font-extrabold text-gray-600 text-s pb-9">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente magnam vero nostrum! Perferendis eos
                molestias porro vero. Vel alias.
            </p>

            <a href="/blog" class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                Find Out More
            </a>
        </div>
    </div>

    <div class="sm:grid grid-cols-3 gap-10 w-4/5 mx-auto py-15 border-b border-gray-500">
        <div
            class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white shadow-xl bg-opacity-50 hover:rounded-2xl">
            <a href="/blog">
                <img src="https://images.pexels.com/photos/694740/pexels-photo-694740.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                    width="700" alt="">

                <p class="py-2 text-gray-800 text-xs">Date, Time</p>
                <p class="font-extrabold text-gray-600 text-s">
                    Book Name 1
                </p>

                <p class="py-6 text-gray-500 text-s">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
                </p>

            </a>
        </div>

        <div
            class="p-4 col-span-2 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white  shadow-xl bg-opacity-50 hover:rounded-2xl">
            <a href="/blog">
                <img src="https://images.pexels.com/photos/694740/pexels-photo-694740.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                    width="700" alt="">

                <p class="py-2 text-gray-800 text-xs">Date, Time</p>
                <p class="font-extrabold text-gray-600 text-s">
                    Book Name 2
                </p>

                <p class="py-6 text-gray-500 text-s">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
                </p>

            </a>
        </div>

        <div
            class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white  shadow-xl bg-opacity-50 hover:rounded-2xl">
            <a href="/blog">
                <img src="https://images.pexels.com/photos/694740/pexels-photo-694740.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                    width="700" alt="">

                <p class="py-2 text-gray-800 text-xs">Date, Time</p>
                <p class="font-extrabold text-gray-600 text-s">
                    Book Name 3
                </p>

                <p class="py-6 text-gray-500 text-s">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
                </p>

            </a>
        </div>
        <div
            class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white  shadow-xl bg-opacity-50 hover:rounded-2xl">
            <a href="/blog">
                <img src="https://images.pexels.com/photos/694740/pexels-photo-694740.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                    width="700" alt="">

                <p class="py-2 text-gray-800 text-xs">Date, Time</p>
                <p class="font-extrabold text-gray-600 text-s">
                    Book Name 4
                </p>

                <p class="py-6 text-gray-500 text-s">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
                </p>

            </a>
        </div>

        <div
            class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white  shadow-xl bg-opacity-50 hover:rounded-2xl">
            <a href="/blog">
                <img src="https://images.pexels.com/photos/694740/pexels-photo-694740.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                    width="700" alt="">

                <p class="py-2 text-gray-800 text-xs">Date, Time</p>
                <p class="font-extrabold text-gray-600 text-s">
                    Book Name 5
                </p>

                <p class="py-6 text-gray-500 text-s">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
                </p>

            </a>
        </div>

        <div
            class="p-4 col-span-2 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white  shadow-xl bg-opacity-50 hover:rounded-2xl">
            <a href="/blog">
                <img src="https://images.pexels.com/photos/694740/pexels-photo-694740.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                    width="700" alt="">

                <p class="py-2 text-gray-800 text-xs">Date, Time</p>
                <p class="font-extrabold text-gray-600 text-s">
                    Book Name 6
                </p>

                <p class="py-6 text-gray-500 text-s">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
                </p>

            </a>
        </div>

        <div
            class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white  shadow-xl bg-opacity-50 hover:rounded-2xl">
            <a href="/blog">
                <img src="https://images.pexels.com/photos/694740/pexels-photo-694740.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                    width="700" alt="">

                <p class="py-2 text-gray-800 text-xs">Date, Time</p>
                <p class="font-extrabold text-gray-600 text-s">
                    Book Name 7
                </p>

                <p class="py-6 text-gray-500 text-s">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
                </p>

            </a>
        </div>

    </div>

    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
            I'm an expert in...
        </h2>

        <span class="font-extrabold block text-4xl py-1">
            Ux Design
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Project Management
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Digital Strategy
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Backend Development
        </span>
    </div>

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque exercitationem saepe enim veritatis, eos
            temporibus quaerat facere consectetur qui.
        </p>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-yellow-700 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    PHP
                    Make this into a photo carousel, with quotes from books, using php or smtng
                </span>

                <h3 class="text-xl font-bold py-10">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas necessitatibus dolorum error culpa
                    laboriosam. Enim voluptas earum repudiandae consequuntur ad? Expedita labore aspernatur facilis quasi
                    ex? Nemo hic placeat et?
                </h3>

                <a href=""
                    class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find Out More
                </a>
            </div>
        </div>
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" alt="">
        </div>
    </div>
@endsection
