@extends('app')

@section('title', 'Home')

@section('content')
    <div class="flex flex-col sm:flex-row mb-12">
        <div class="w-full">
            <img src="{{ asset('img/stephan.jpg') }}" class="mx-auto rounded-full mb-4 sm:mb-0 h-48 hidden sm:block"/>
        </div>
        <div class="sm:ml-6 self-center">
            I am Stephan Tromer, a software engineer at Deloitte Netherlands. In this blog, I will be sharing my experiences in the world of software engineering. My goal for this blog is for you to learn something new and help you in the software engineering world.
        </div>
    </div>

    @foreach($posts as $post)
        <article class="mb-8 border-lighter rounded shadow p-5">
            <a class="no-underline leading-loose text-grey-darkest mb-4" href="{{ route('blog.show', $post->slug) }}">
                <h2 class="leading-normal md:text-xl lg:text-4xl mb-0">{{ $post->title }}</h2>

                <div class="flex text-sm font-light text-gray-400">
                    <span class="">{!! $post->publish_date->formatLocalized('%e %B %Y') !!}</span>
                    <span class="mx-2">-</span>
                    <span class="">{{ ceil(str_word_count(strip_tags($post->body)) / 200) }} min read</span>
                </div>

                <p class="mt-2 text-lg">{!! $post->excerpt !!}</p>

                <div class="flex mt-4">
                    @foreach($post->tags as $tag)
                        <span class="mr-2 text-xs rounded-full bg-gray-100 py-1 px-2">#{{ $tag->name }}</span>
                    @endforeach
                </div>
            </a>
        </article>
    @endforeach
@endsection
