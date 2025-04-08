<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tags = Tag::all();

        return view("tags.index", [
            "tags" => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("tags.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $title = $request->input("title");

        $tag = new Tag();
        $tag->title = $title;

        $tag->save();

        return redirect()->route("tags.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $tag = Tag::find($id);
        $posts = $tag->posts; // ???

        return view("tags.show", [
            "tag" => $tag,
            "posts" => $posts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $tag = Tag::find($id);
        return view("tags.edit", [
            "tag" => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $title = $request->input("title");
        $tag = Tag::find($id);
        $tag->title = $title;

        $tag->save();

        return redirect()->route("tags.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route("tags.index");

    }
}
