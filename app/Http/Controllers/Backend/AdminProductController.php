<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Image;
class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $request->file('image');
        $image_name = time() . "." . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/' . $image_name);
        $save_url = 'upload/products/' . $image_name;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub_category_id' => $request->sub_sub_category_id,
            'name' => $request->name,
            'name_fa' => $request->name_fa,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'slug_fa' => str_replace(' ', '-', $request->name_fa),
            'code' => $request->code,
            'qty' => $request->qty,
            'tags' => $request->tags,
            'tags_fa' => $request->tags_fa,
            'size' => $request->size,
            'size_fa' => $request->size_fa,
            'color' =>$request->color ,
            'color_fa' => $request->color_fa,
            'selling_prize' => $request->selling_prize,
            'discount' => $request->discount,
            'excerpt' => $request->excerpt,
            'excerpt_fa' => $request->excerpt_fa,
            'description' => $request->description,
            'description_fa' => $request->description_fa,
            'image' => $save_url,
            'hot_deals' => $request->hot_deals == 1 ? 1 : 0,
            'featured' => $request->featured == 1 ? 1 : 0,
            'special_offer' => $request->special_offer == 1 ? 1 : 0 ,
            'special_deal' => $request->special_deal == 1 ? 1 : 0,
            'status' => $request->status == 1 ? 1 : 0,

     ]);


        foreach ($request->multi_img as $image){
            $image_name = time() . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/multi' . $image_name);
            $save_url = 'upload/products/multi' . $image_name;
            MultiImg::create([
               'product_id'=>$product_id,
                'image'=>$save_url
            ]);
        }
        $nofit = [
            'message' => "SubCategory Created Successfully",
            "alert-type" => 'success',
        ];
        return redirect()->route('admin.products.index')->with($nofit);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subCategories = SubCategory::latest()->get();
        $subSubCategories = SubSubCategory::latest()->get();

        $multiImgs = MultiImg::where('product_id',$product->id)->get();
        return view('admin.products.edit', compact('multiImgs','product','subCategories','subSubCategories','categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/' . $image_name);
            $save_url = 'upload/products/' . $image_name;
        }else{
            $save_url = $product->image;
        }
        $product->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub_category_id' => $request->sub_sub_category_id,
            'name' => $request->name,
            'name_fa' => $request->name_fa,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'slug_fa' => str_replace(' ', '-', $request->name_fa),
            'code' => $request->code,
            'qty' => $request->qty,
            'tags' => $request->tags,
            'tags_fa' => $request->tags_fa,
            'size' => $request->size,
            'size_fa' => $request->size_fa,
            'color' =>$request->color ,
            'color_fa' => $request->color_fa,
            'selling_prize' => $request->selling_prize,
            'discount' => $request->discount,
            'excerpt' => $request->excerpt,
            'excerpt_fa' => $request->excerpt_fa,
            'description' => $request->description,
            'description_fa' => $request->description_fa,
            'image' => $save_url,
            'hot_deals' => $request->hot_deals == 1 ? 1 : 0,
            'featured' => $request->featured == 1 ? 1 : 0,
            'special_offer' => $request->special_offer == 1 ? 1 : 0 ,
            'special_deal' => $request->special_deal == 1 ? 1 : 0,
            'status' => $request->status == 1 ? 1 : 0,

        ]);

        $nofit = [
            'message' => "Product Updated Successfully",
            "alert-type" => 'success',
        ];
        return redirect()->route('admin.products.index')->with($nofit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        foreach ($product->multiImages as $img){
            unlink($img->image);
        }
        unlink($product->image);
        $product->delete();

        $notif = [
            'message' => 'Product Deleted successfully',
            'alert-info' => 'success',
        ];
        return redirect()->back()->with($notif);
    }
}
