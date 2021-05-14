@extends('app')

@section('title', $post->title)

@section('content')
    <section>
        <article class="content leading-loose font-sans">
            <h1 class="font-serif leading-normal text-4xl pt-4 mb-0">{{ $post->title }}</h1>
            <div class="flex text-sm font-light text-gray-400">
                <span>Updated: {!! $post->updated_at->formatLocalized('%e %B %Y %H:%I') !!}</span>
                <span class="mx-2">-</span>
                <span>{{ ceil(str_word_count(strip_tags($post->body)) / 200) }} min read</span>
            </div>

            <div class="prose md:mt-4">
                {!! parsedown($post->body) !!}
            </div>
        </article>
    </section>
@endsection

@push('scripts')
    <script>
        hljs.highlightAll();
    </script>
@endpush
