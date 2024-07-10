<x-layout>
    <x-slot:title name="title">
        {{ $post->subject }} | My blog
    </x-slot>

    <x-header />

    <h1>記事ID:{{ $post->id }}</h1>
    <p>現在日付：{{ $today }}</p>
    <p>内容：{{ $post->content }}</p>
</x-layout>