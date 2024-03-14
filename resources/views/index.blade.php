@extends('layouts.app')

{{-- https://github.com/lukePeavey/quotable --}}
{{-- https://stackoverflow.com/questions/15938543/php-refresh-button-onclick --}}

{{-- get blogs from internet archive and display in main page --}}

<?php

$api_url = 'http://api.quotable.io/random';
$quote = json_decode(file_get_contents($api_url));

?>

{{-- Add content to blog post from php, make a databse with content and push to the blog posts in this page --}}
{{-- Another page can be for authors, or book reviews --}}
{{-- need to format create blog post page, add extra fields, maybe drop down fro genres, category --}}
{{-- format footer --}}


@section('content')
    <br><br>

    <div
        class="sm:grid gap-10 w-4/5 mx-auto py-15 border-b border-gray-200 p-5 rounded-xl group sm:flex space-x-6 bg-white bg-opacity-50 shadow-xl hover:rounded-2xl">
        <div class="text-center">
            <p class="text-lg font-semibold text-gray-800"><?php echo $quote->content; ?></p>
            <p class="text-s py-3 text-gray-600">- <?php echo $quote->author; ?></p>

            <p class="text-s text-gray-600 font-medium py-3">Tags:</p>
            <div class="flex justify-center space-x-2">
                <?php foreach ($quote->tags as $tag) { ?>
                <span class="text-s text-gray-500">#<?php echo $tag; ?></span>
                <?php } ?>
            </div>
            <p class="pt-5"><a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="font-semibold text-m text-blue-500 hover:underline">New
                    Quote</a></p>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-10 w-4/5 mx-auto py-15">
        @foreach ($posts as $post)
            <div class="border-b border-gray-200 p-5 rounded-xl group bg-white bg-opacity-50 shadow-xl hover:rounded-2xl">
                <div>
                    <img src="{{ asset('images/' . $post->image_path) }}" width="700" alt="blog_image">
                </div>
                <div class="text-left mt-5">
                    <h2 class="text-3xl font-extrabold text-gray-600">{{ $post->title }}</h2>
                    <p class="py-8 text-gray-500 text-s">{{ $post->description }}</p>
                </div>
            </div>
        @endforeach
    </div>


    <br><br>
    {{-- <div
        class="sm:grid grid-cols-2 gap-10 w-4/5 mx-auto py-15 border-b border-gray-200 p-5 w-[680px] rounded-xl group sm:flex space-x-6 bg-white bg-opacity-50 shadow-xl hover:rounded-2xl">
        <div>
            <img src="https://s2982.pcdn.co/wp-content/uploads/2023/12/BR_ReadHarder_970x550.jpg.webp" width="700"
                alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-5/6 block ">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Book Riot’s 2024 Read Harder Challenge
            </h2>

            <p class="py-8 text-gray-500 text-s">
                Gather ’round the interwebs, readers. It’s time to announce the 2024 Read Harder Challenge! This year will
                be our tenth hosting Read Harder, and we’ve got some special stuff in store this time around. If you’re a
                Read Harder regular, it’s great to see you again!
            </p>

            <p class="font-extrabold text-gray-600 text-s pb-9">
                Need suggestions for the tasks? Looking for a community to complete the challenge with? Sign up for the Read
                Harder newsletter!
            </p>
        </div>
    </div>

    <div class="sm:grid grid-cols-3 gap-10 w-4/5 mx-auto py-15 border-b border-gray-500">
        <div
            class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white shadow-xl bg-opacity-50 hover:rounded-2xl">
            <a href="/blog">
                <img src="https://s2982.pcdn.co/wp-content/uploads/2024/03/covers-1.jpg.webp" width="700" alt="">

                <p class="py-2 text-gray-800 text-xs">Date, Time</p>
                <p class="font-extrabold text-gray-600 text-s">
                    New World War II Historical Fiction For 2024
                </p>

                <p class="py-6 text-gray-500 text-s">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
                </p>

            </a>
        </div>

        <div
            class="p-4 col-span-2 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white  shadow-xl bg-opacity-50 hover:rounded-2xl">
            <a href="/blog">
                <img src="https://s2982.pcdn.co/wp-content/uploads/2024/03/book-club.png.webp" width="700"
                    alt="">

                <p class="py-2 text-gray-800 text-xs">Date, Time</p>
                <p class="font-extrabold text-gray-600 text-s">
                    13 Book Club Picks For March 2024, From Oprah to NYPL’s Teen Banned Book Club
                </p>

                <p class="py-6 text-gray-500 text-s">
                    Spring is finally here (sorry, allergy havers)! If you enjoy reading outside, now is your time. Stuff
                    your books in a tote and find a lovely spot; take your ereader to a place where you can people watch and
                    read
                </p>

            </a>
        </div>

        <div
            class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white  shadow-xl bg-opacity-50 hover:rounded-2xl">
            <a href="/blog">
                <img src="https://s2982.pcdn.co/wp-content/uploads/2024/03/Baldurs-Gate-promo-image.png.webp" width="700"
                    alt="">

                <p class="py-2 text-gray-800 text-xs">Date, Time</p>
                <p class="font-extrabold text-gray-600 text-s">
                    8 Ridiculously-Good Fantasy Books Like Baldur’s Gate
                </p>

                <p class="py-6 text-gray-500 text-s">
                    It was a hard-won campaign, but you did it. You nurtured a character from the start — made a backstory,
                    rolled the dice, chose your feats, and equipped your character.
                </p>

            </a>
        </div>
        <div
            class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white  shadow-xl bg-opacity-50 hover:rounded-2xl">
            <a href="/blog">
                <img src="https://s2982.pcdn.co/wp-content/uploads/2024/02/March-2024-childrens-new-releases-768x432.jpg.webp"
                    width="700" alt="">

                <p class="py-2 text-gray-800 text-xs">Date, Time</p>
                <p class="font-extrabold text-gray-600 text-s">
                    10 Of The Best New Children’s Books Out
                </p>

                <p class="py-6 text-gray-500 text-s">
                    The weather is getting warmer, and the flowers are blooming, which makes March a great month for reading
                    outside (though if you have allergies like me, maybe pack a box of tissues with you!).
                </p>

            </a>
        </div>

        <div
            class="p-4 items-center justify-center w-[680px] rounded-xl group sm:flex space-x-6 bg-white  shadow-xl bg-opacity-50 hover:rounded-2xl">
            <a href="/blog">
                <img src="https://s2982.pcdn.co/wp-content/uploads/2024/03/a-court-of-thorns-and-roses-700-x-375.jpeg.webp"
                    width="700" alt="">

                <p class="py-2 text-gray-800 text-xs">Date, Time</p>
                <p class="font-extrabold text-gray-600 text-s">
                    WTH is Up with ACOTAR?
                </p>

                <p class="py-6 text-gray-500 text-s">
                    No matter what you think of the subject matter, or the genre, or the writing style — when a bunch of
                    people feel so strongly not just about the book, but the experience of reading the book….it’s worth
                    consideration.
                </p>

            </a>
        </div>


    </div> --}}

    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
            Top Genres
        </h2>

        <span class="font-extrabold block text-4xl py-1">
            Fiction
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Mystery
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Thriller
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Romance
        </span>
    </div>

    {{-- <div class="text-center py-15">
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
    </div> --}}
@endsection
