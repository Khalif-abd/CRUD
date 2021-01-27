@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->description }}</p>

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

            <p class="text-secondary float-right">{{ $post->views}} <i class="fa fa-eye" ></i></p>
        </div>
    </div>
@endsection
