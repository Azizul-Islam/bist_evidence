<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $update_category = null;
        if(!blank(request()->category_id)){
            $update_category = Category::findOrFail(request()->category_id);
        }
        $categories = Category::latest()->paginate(10);
        $data = Category::getCategories(true);
        $parent_categories = Category::generateCategories($data);
        return view('admin.categories.index',compact('categories','parent_categories','update_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|string|unique:categories,name',
            'parent_id' => 'nullable',
            'status' => 'nullable'
        ]);
        $data['name'] = $data['category_name'];
        $slug = Str::slug($data['name']);
        $slug_count = Category::where('slug',$slug)->count();
        if($slug_count > 0){
            $slug = time()."_".$data['name'];
        }
        $data['slug'] = $slug;

        Category::create($data);
        return redirect()->back()->with('success','Category created success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'category_name' => 'required|string|unique:categories,name,'.$category->id,
            'parent_id' => 'nullable',
            'status' => 'nullable'
        ]);
        $data['name'] = $data['category_name'];

        $category->update($data);
        return redirect()->route('categories.index')->with('info','Category updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
