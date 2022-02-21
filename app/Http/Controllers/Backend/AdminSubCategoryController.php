<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Image;

class AdminSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.sub_category.index', compact('categories'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "category_id" => 'required|numeric',
            "name" => 'required|string',
            "name_fa" => 'required|string',
            "image" => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ], [
            'name.required' => 'Please Input brand En name',
            'name_fa.required' => 'لطفا اسم فارسی دسته را وارد کنید.'
        ]);

        $image = $request->file('image');
        $image_name = time() . "." . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/subcategories/' . $image_name);
        $save_url = 'upload/subcategories/' . $image_name;

        SubCategory::create([
            "category_id" => $request->category_id,
            "name" => $request->name,
            "name_fa" => $request->name_fa,
            "slug" => strtolower(str_replace(' ', '-', $request->name)),
            "slug_fa" => strtolower(str_replace(' ', '-', $request->name_fa)),
            "image" => $save_url,
        ]);

        $nofit = [
            'message' => "SubCategory Created Successfully",
            "alert-type" => 'success',
        ];
        return redirect()->route('admin.subcategories.index')->with($nofit);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCategory = SubCategory::findOrfail($id);
        $categories = Category::latest()->get();
        return view('admin.sub_category.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::findOrfail($id);
        $request->validate([
            "category_id" => 'required|numeric',
            "name" => 'required|string',
            "name_fa" => 'required|string',
            "image" => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ], [
            'name.required' => 'Please Input brand En name',
            'name_fa.required' => 'لطفا اسم فارسی دسته را وارد کنید.'
        ]);


        if ($request->file('image')) {

            unlink($subCategory->image);
            $image = $request->file('image');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/subcategories/' . $image_name);
            $save_url = 'upload/subcategories/' . $image_name;


            $subCategory->update([
                "category_id" => $request->category_id,
                "name" => $request->name,
                "name_fa" => $request->name_fa,
                "slug" => strtolower(str_replace(' ', '-', $request->name)),
                "slug_fa" => strtolower(str_replace(' ', '-', $request->name_fa)),
                "image" => $save_url,
            ]);

        } else {
            $subCategory->update([
                "category_id" => $request->category_id,
                "name" => $request->name,
                "name_fa" => $request->name_fa,
                "slug" => strtolower(str_replace(' ', '-', $request->name)),
                "slug_fa" => strtolower(str_replace(' ', '-', $request->name_fa)),
            ]);
        }


        $nofit = [
            'message' => "SubCategory Created Successfully",
            "alert-type" => 'success',
        ];
        return redirect()->route('admin.subcategories.index')->with($nofit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory = SubCategory::findOrfail($id);
        unlink($subCategory->image);
        $subCategory->delete();
        $nofit = [
            'message' => "subCategory Deleted Successfully",
            "alert-type" => 'success',
        ];

        return redirect()->route('admin.subcategories.index')->with($nofit);
    }
}
