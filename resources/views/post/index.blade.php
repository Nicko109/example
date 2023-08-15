@extends('layouts.main')
@section('content')
    <hr>
    <div class="mr-3">
        <form  action="{{ route('post.index') }}">
            <input type="text" name="title" placeholder="title" value="{{ request()->get('title') }}">
            <input type="text" name="content" placeholder="content" value="{{ request()->get('content') }}">
            <input type="text" name="category_id" placeholder="category_id" value="{{ request()->get('category_id') }}">
            <input type="submit" class="btn btn-primary">
            <a class="btn btn-primary" href="{{ route('post.index') }}">Сбросить</a>

        </form>
    </div>
    <hr>
    <div>
        @foreach($posts as $post)
            <div><a href="{{ route('post.show', $post->id) }}">{{$post->id}}. {{$post->title}}</a></div>
        @endforeach
    </div>
    <hr>
    <div class="mt-3">
        <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Добавить</a>
    </div>
    <hr>
    <div class="mt-3">
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
