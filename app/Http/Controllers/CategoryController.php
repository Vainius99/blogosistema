<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
// use App\Http\Requests\StoreCategoryRequest;
// use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::sortable()->paginate(20);
        return view("category.index", ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
    //  * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $submitB = $request->submitB;

        $category = new Category;
        $category->title = $request->category_title;
        $category->description = $request->category_description;
        $category->save();


        $postInputCount = count($request->post_title);



        if($submitB == "remove") {

            for($i = 0 ; $i < $postInputCount ; $i++) {
                $post = new Post;
                $post->title = $request->post_title[$i];
                $post->text = $request->post_text[$i];
                $post->category_id = $category->id;
                $post->save();
            }
        }

        return redirect()->route("category.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("category.edit", ["category"=> $category]);
    }

    /**
     * Update the specified resource in storage.
     *
    //  * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->category_title;
        $category->description = $request->category_description;

        $category->save();

        return redirect()->route("category.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("category.index");
    }
}
