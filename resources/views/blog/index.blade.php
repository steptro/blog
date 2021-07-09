@extends('app')

@section('title', 'Home')

@section('content')
    <div class="flex flex-col sm:flex-row mb-12">
        <div class="w-full">
            <img src="{{ asset('img/stephan.jpg') }}" class="mx-auto rounded-full mb-4 sm:mb-0 h-48 hidden sm:block"/>
        </div>
        <div class="sm:ml-6 self-center">
            I am Stephan Tromer, a software engineer at Deloitte Netherlands. In this blog, I will be sharing my experiences in the world of software engineering. My goal for this blog is for you to learn something new which might help you in the software engineering world. During my day-to-day work I am primarily working with Java and Spring Boot using a distributed systems architecture.

            <div class="text-4xl mt-4 flex justify-center">
                <a href="https://github.com/steptro" title="GitHub" rel="noreferrer" class="mr-4 text-github-gray hover:text-gray-400" target="_blank"><i class="fab fa-github"></i></a>
                <a href="https://twitter.com/StephanTromer" title="Twitter" ref="noreferrer" class="text-twitter-blue hover:text-gray-400" target="_blank"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>

    @foreach($posts as $post)
        <article class="mb-8 rounded shadow-xl border p-5">
            <a class="no-underline leading-loose mb-4" href="{{ route('blog.show', $post->slug) }}">
                <h2 class="leading-normal text-2xl lg:text-3xl mb-0">{{ $post->title }}</h2>

                <div class="flex text-sm font-light text-gray-400">
                    <span>Updated: {!! $post->updated_at->formatLocalized('%e %B %Y') !!}</span>
                    <span class="mx-2">-</span>
                    <span>{{ ceil(str_word_count(strip_tags($post->body)) / 200) }} min read</span>
                </div>

                <p class="mt-5 leading-tight">{!! $post->excerpt !!}</p>

                <div class="flex mt-4">
                    @foreach($post->tags as $tag)
                        <span class="mr-2 text-xs rounded-full bg-gray-100 py-1 px-2">#{{ $tag->name }}</span>
                    @endforeach
                </div>
            </a>
        </article>
    @endforeach
@endsection
