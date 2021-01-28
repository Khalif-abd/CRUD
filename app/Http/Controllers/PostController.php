<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(PostRequest $request)
    {
        $post = new Post([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'views' => 0,
        ]);

        $post->save();

        return redirect('/post')->with('success', 'Пост успешно добавлен!');

    }


    public function show($id)
    {
        $post = Post::find($id);
        $post->views++;
        $post->save();

        return view('posts.show', compact('post'));

    }


    public function edit($id)
    {
        $post = Post::find($id);
        
        return view('posts.edit', compact('post'));
    }


    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->save();

        return redirect('/post')->with('success', 'Пост успешно отредактирован!');

    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        
        return redirect('/post')->with('success', 'Пост удален!');
    }
}
