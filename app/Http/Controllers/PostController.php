<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
// use App\Http\Requests\StorePostRequest;
// use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $category_sort = $request->category_sort;

        if($category_sort) {
            $posts = Post::sortable()->where('category_id', $category_sort)->paginate(100);
        } else {
            $posts = Post::sortable()->paginate(100);
        }

        return view('post.index', ['posts' => $posts, 'categories' => $categories, 'category_sort' => $category_sort]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
    //  * @param  \App\Http\Requests\StorePostRequest  $request
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $addB = $request->addB;

        if ($addB == 'remove') {
            $category = New Category;
            $category->title = $request->category_title;
            $category->description = $request->category_description;
            $category->save();

            $categoryID = $category->id;
        } else {
            $categoryID = $request->post_category_id;
        }

        $post = New Post;

        $post->title = $request->post_title;
        $post->text = $request->post_text;
        $post->category_id = $categoryID;

        $post->save();
        // return "$addB";

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' =>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit', ["categories"=>$categories,'post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
    //  * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->post_title;
        $post->text = $request->post_text;
        $post->category_id = $request->post_category_id;

        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function destroyAjax(Post $post)
    {


        $category_id = $post->category_id;

        $post->delete();

        $postsLeft = Post::where('category_id', $category_id)->get() ;
        $postCount = $postsLeft->count();

        $success = [
            "success" => "The Post deleted successfuly",
            "postCount" => $postCount
        ];
        $success_json = response()->json($success);

        return $success_json;
    }
}
