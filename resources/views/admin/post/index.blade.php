@extends('layouts.admin')
@section('content')
    <div>
        <hr>
        <div class="mr-3">
            <form  action="{{ route('admin.post.index') }}">
                <input type="text" name="title" placeholder="title" value="{{ request()->get('title') }}">
                <input type="text" name="content" placeholder="content" value="{{ request()->get('content') }}">
                <input type="text" name="category_id" placeholder="category_id" value="{{ request()->get('category_id') }}">
                <input type="submit" class="btn btn-primary">
                <a class="btn btn-primary" href="{{ route('admin.post.index') }}">Сбросить</a>

            </form>
        </div>
        <hr>
        @foreach($posts as $post)
            <div><a href="{{ route('admin.post.show', $post->id) }}">{{$post->id}}. {{$post->title}}</a></div>
        @endforeach
        <div class="mt-3">
            {{$posts->withQueryString()->links() }}
        </div>
            <div>
                <a href="{{ route('admin.post.create') }}" class="btn btn-primary mb-3">Добавить</a>
            </div>
    </div>
@endsection
