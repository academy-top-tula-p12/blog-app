<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();
        $posts = $user->posts;

        return view("posts.index", [
            "posts" => $posts,
            "user" => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view("posts.create", [
            "categories" => $categories,
            "tags" => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $title = $request->input("title");
        $content = $request->input("content");

        if($request->input("is_published") == "on"){
            $is_published = true;
        }
        else{
            $is_published = false;
        }

        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->is_published = $is_published;

        if($request->file("cover")){
            $post->cover = $request->file("cover")->store("covers", "public");
        };

        $user = Auth::user();
        $post->user()->associate($user);

        $category = Category::find($request->input("category"));
        $post->category()->associate($category);

        $post->save();

        $tags = $request->input("tags");

        foreach($tags as $tag){
            $post->tags()->attach($tag);
        }

        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $post = Post::find($id);
        $category = $post->category;
        $tags = $post->tags;

        return view("posts.show", [
            "post" => $post,
            "category" => $category,
            "tags" => $tags,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view("posts.edit", [
            "post" => $post,
            "categories" => $categories,
            "tags" => $tags,
            "user" => Auth::user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $title = $request->input("title");
        $content = $request->input("content");
        if($request->input("is_published") == "on"){
            $is_published = true;
        }
        else{
            $is_published = false;
        }

        $post = Post::find($id);

        $post->title = $title;
        $post->content = $content;
        $post->is_published = $is_published;

        if($request->file("cover")){
            $post->cover = $request->file("cover")->store("covers", "public");
        };

        $category = Category::find($request->input("category"));
        $post->category()->associate($category);

        $post->save();

        $tags = $request->input("tags");
        $post->tags()->sync($tags);

        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route("posts.index");

    }
}
