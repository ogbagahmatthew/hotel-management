<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\Categories;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return response()->json($category, 200)->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return response()->json($category, 201)->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validatedData = $this->validate($request, [
        'title'         => 'required|min:3|max:255',
        'slug'          => 'required|min:3|max:255|unique:posts',
        'image'         => 'sometimes|image',
        'category_id'   => 'required|numeric',
        'description'   => 'required|min:3'
    ]);

    $validatedData['user_id'] = Auth::id();
    $validatedData['slug'] = Str::slug($validatedData['slug'], '-');

    $post = Post::create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($post->user_id != Auth::id()) {
            return redirect()->back();
          }
    
          $categories = Category::with('children')->whereNull('parent_id')->get();
    
          return response()->json($category, 201)->withPost($post)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($category->children) {
            foreach ($category->children()->with('posts')->get() as $child) {
                foreach ($child->posts as $post) {
                    $post->update(['category_id' => NULL]);
                }
            }
            
            $category->children()->delete();
        }

        foreach ($category->posts as $post) {
            $post->update(['category_id' => NULL]);
        }

        $category->delete();

        return response()->json($category, 200);
    }
}
