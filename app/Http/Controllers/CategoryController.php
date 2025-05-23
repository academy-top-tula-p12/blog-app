<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::all();

        return view("categories.index", [
            "categories" => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $title = $request->input("title");

        $category = new Category();
        $category->title = $title;

        $category->save();

        return redirect()->route("categories.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $category = Category::find($id);
        $posts = $category->posts; // ???

        return view("categories.show", [
            "category" => $category,
            "posts" => $posts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $category = Category::find($id);
        return view("categories.edit", [
            "category" => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $title = $request->input("title");
        $category = Category::find($id);
        $category->title = $title;

        $category->save();

        return redirect()->route("categories.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route("categories.index");
    }
}
