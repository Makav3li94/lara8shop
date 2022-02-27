<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Image;

class AdminSubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('admin.sub_sub_category.index', compact('categories','subcategories','subsubcategories'));
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
            "category_id" => 'required|numeric',
            "sub_category_id" => 'required|numeric',
            "name" => 'required|string',
            "name_fa" => 'required|string',
            "image" => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ], [
            'name.required' => 'Please Input brand En name',
            'name_fa.required' => 'لطفا اسم فارسی دسته را وارد کنید.'
        ]);

        $image = $request->file('image');
        $image_name = time() . "." . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/subsubcategories/' . $image_name);
        $save_url = 'upload/subsubcategories/' . $image_name;

        SubSubCategory::create([
            "category_id" => $request->category_id,
            "sub_category_id" => $request->sub_category_id,
            "name" => $request->name,
            "name_fa" => $request->name_fa,
            "slug" => strtolower(str_replace(' ', '-', $request->name)),
            "slug_fa" => strtolower(str_replace(' ', '-', $request->name_fa)),
            "image" => $save_url,
        ]);

        $nofit = [
            'message' => "Sub SubCategory Created Successfully",
            "alert-type" => 'success',
        ];
        return redirect()->route('admin.subsubcategories.index')->with($nofit);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubSubCategory $subSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subsubCategory = SubSubCategory::findOrfail($id);
        $categories = Category::latest()->get();
        return view('admin.sub_sub_category.edit', compact('subsubCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subsubCategory = SubSubCategory::findOrfail($id);
        $request->validate([
            "category_id" => 'required|numeric',
            "sub_category_id" => 'required|numeric',
            "name" => 'required|string',
            "name_fa" => 'required|string',
            "image" => 'mimes:jpeg,jpg,png,gif|max:10000',
        ], [
            'name.required' => 'Please Input brand En name',
            'name_fa.required' => 'لطفا اسم فارسی دسته را وارد کنید.'
        ]);


        if ($request->file('image')) {

            unlink($subsubCategory->image);
            $image = $request->file('image');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/subcategories/' . $image_name);
            $save_url = 'upload/subcategories/' . $image_name;


            $subsubCategory->update([
                "category_id" => $request->category_id,
                "sub_category_id" => $request->sub_category_id,
                "name" => $request->name,
                "name_fa" => $request->name_fa,
                "slug" => strtolower(str_replace(' ', '-', $request->name)),
                "slug_fa" => strtolower(str_replace(' ', '-', $request->name_fa)),
                "image" => $save_url,
            ]);

        } else {
            $subsubCategory->update([
                "category_id" => $request->category_id,
                "sub_category_id" => $request->sub_category_id,
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
        return redirect()->route('admin.subsubcategories.index')->with($nofit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subsubCategory = SubSubCategory::findOrfail($id);
        unlink($subsubCategory->image);
        $subsubCategory->delete();
        $nofit = [
            'message' => "Sub subCategory Deleted Successfully",
            "alert-type" => 'success',
        ];

        return redirect()->route('admin.subsubcategories.index')->with($nofit);
    }

    public function ajax($category_id){
        $subCategories = SubCategory::where('category_id',$category_id)->pluck('name','id');
        return $subCategories;
    }
}
