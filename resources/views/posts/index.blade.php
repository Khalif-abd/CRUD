@extends('layouts.app')

@section('title', 'Посты')

@section('content')
    <a href="{{route('post.create')}}" class="btn btn-primary">Добавить пост</a>
    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table-striped table-dark mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя поста</th>
            <th scope="col">Описание</th>
            <th scope="col">Просмотры</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->views}}</td>
            <td class="table-buttons">
                <a href="{{route('post.show', $post->id)}}" class="btn btn-secondary ">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{route('post.edit', $post->id)}}" class="btn btn-secondary ">
                    <i class="fa fa-pencil" ></i>
                </a>
                <form method="POST" action="{{route('post.destroy', $post->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary ">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>
@endsection
