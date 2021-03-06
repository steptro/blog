@extends('app')

@section('title', $post->title)

@push('meta')
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $post->excerpt }}" />
    <meta property="og:image" content="{{ url('/') . $post->featured_image }}" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:site_name" content="stephantromer.dev" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
@endpush

@section('content')
    <section>
        <article class="content leading-loose font-sans">
            <figure>
                <img src="{{ $post->featured_image }}" />
                <figcaption class="text-xs mt-2 text-gray-400">{{ $post->featured_image_caption }}</figcaption>
            </figure>

            <h1 class="font-serif leading-normal text-4xl pt-4 mb-0">{{ $post->title }}</h1>
            <div class="flex text-sm font-light text-gray-400">
                <span>Updated: {!! $post->updated_at->formatLocalized('%e %B %Y %H:%M') !!}</span>
                <span class="mx-2">-</span>
                <span>{{ ceil(str_word_count(strip_tags($post->body)) / 200) }} min read</span>
            </div>

            <div id="content-body" class="prose md:mt-4">
                {!! markdown($post->body) !!}
            </div>
        </article>
    </section>

    <reactions post-id="{{ $post->id }}" likes="{{ $reactions['like'] ?? 0 }}" loves="{{ $reactions['love'] ?? 0 }}"></reactions>
@endsection

@push('scripts')
    <script>
        hljs.configure({
            languages: ['java'],
        });
        hljs.highlightAll();

        const links = document.getElementById('content-body').getElementsByTagName('a');
        for (let i = 0; i < links.length; i++) {
            if (!links[i].href.startsWith('{{ env('APP_URL') }}')) {
                links[i].target = "_blank";
            }
        }
    </script>
@endpush
