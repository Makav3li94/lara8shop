<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class AdminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.brand.index', compact('brands'));
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
            "name" => 'required|string',
            "name_fa" => 'required|string',
            "image" => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ], [
            'name.required' => 'Please Input brand En name',
            'name_fa.required' => 'لطفا اسم فارسی برند را وارد کنید.'
        ]);

        $image = $request->file('image');
        $image_name = time() . "." . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brands/' . $image_name);
        $save_url = 'upload/brands/' . $image_name;

        Brand::create([
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
        return redirect()->route('admin.brands.index')->with($nofit);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
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

            unlink($brand->image);
            $image = $request->file('image');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brands/' . $image_name);
            $save_url = 'upload/brands/' . $image_name;

            $brand->update([
                "name" => $request->name,
                "name_fa" => $request->name_fa,
                "slug" => strtolower(str_replace(' ', '-', $request->name)),
                "slug_fa" => strtolower(str_replace(' ', '-', $request->name_fa)),
                "image" => $save_url,
            ]);

        }else{
            $brand->update([
                "name" => $request->name,
                "name_fa" => $request->name_fa,
                "slug" => strtolower(str_replace(' ', '-', $request->name)),
                "slug_fa" => strtolower(str_replace(' ', '-', $request->name_fa)),
            ]);
        }

        $nofit = [
            'message' => "Brand Updated Successfully",
            "alert-type" => 'success',
        ];
        return redirect()->route('admin.brands.index')->with($nofit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        unlink($brand->image);
        $brand->delete();
        $nofit = [
            'message' => "Brand Deleted Successfully",
            "alert-type" => 'success',
        ];

        return redirect()->route('admin.brands.index')->with($nofit);
    }
}
