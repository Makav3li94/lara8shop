<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
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
        $request->validate([
            "name" => 'required|string',
            "name_fa" => 'required|string',
            "image" => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ], [
            'name.required' => 'Please Input brand En name',
            'name_fa.required' => 'لطفا اسم فارسی دسته را وارد کنید.'
        ]);

        $image = $request->file('image');
        $image_name = time() . "." . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/categories/' . $image_name);
        $save_url = 'upload/categories/' . $image_name;

        Category::create([
            "name" => $request->name,
            "name_fa" => $request->name_fa,
            "slug" => strtolower(str_replace(' ', '-', $request->name)),
            "slug_fa" => strtolower(str_replace(' ', '-', $request->name_fa)),
            "image" => $save_url,
        ]);

        $nofit = [
            'message' => "Brand Created Successfully",
            "alert-type" => 'success',
        ];
        return redirect()->route('admin.categories.index')->with($nofit);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
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
        $request->validate([
            "name" => 'required|string',
            "name_fa" => 'required|string',
            "image" => 'mimes:jpeg,jpg,png,gif|max:10000',
        ], [
            'name.required' => 'Please Input brand En name',
            'name_fa.required' => 'لطفا اسم فارسی برند را وارد کنید.'
        ]);

        if ($request->file('image')) {

            unlink($category->image);
            $image = $request->file('image');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/categories/' . $image_name);
            $save_url = 'upload/categories/' . $image_name;

            $category->update([
                "name" => $request->name,
                "name_fa" => $request->name_fa,
                "slug" => strtolower(str_replace(' ', '-', $request->name)),
                "slug_fa" => strtolower(str_replace(' ', '-', $request->name_fa)),
                "image" => $save_url,
            ]);

        }else{
            $category->update([
                "name" => $request->name,
                "name_fa" => $request->name_fa,
                "slug" => strtolower(str_replace(' ', '-', $request->name)),
                "slug_fa" => strtolower(str_replace(' ', '-', $request->name_fa)),
            ]);
        }

        $nofit = [
            'message' => "Category Updated Successfully",
            "alert-type" => 'success',
        ];
        return redirect()->route('admin.categories.index')->with($nofit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        unlink($category->image);
        $category->delete();
        $nofit = [
            'message' => "Category Deleted Successfully",
            "alert-type" => 'success',
        ];

        return redirect()->route('admin.categories.index')->with($nofit);
    }
}
