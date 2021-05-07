@extends('app')

@section('title', $post->title)

@section('content')
    <section>
        <article class="content leading-loose font-sans">
            <h1 class="font-serif leading-normal text-4xl pt-4 mb-0">{{ $post->title }}</h1>
            <time class="text-sm md:text-base text-gray-400">{!! $post->publish_date->formatLocalized('%d %B %Y %H:%I:%S') !!}</time>

            <div class="prose md:mt-4">
                {!! parsedown($post->body) !!}
            </div>
        </article>
    </section>
@endsection
