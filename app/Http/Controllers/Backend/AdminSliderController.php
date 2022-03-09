<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
class AdminSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
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
            "name" => 'string',
            "name_fa" => 'string',
            "image" => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $image = $request->file('image');
        $image_name = time() . "." . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/' . $image_name);
        $save_url = 'upload/slider/' . $image_name;

        Slider::create([
            "name" => $request->name,
            "name_fa" => $request->name_fa,
            "description" => $request->description,
            "description_fa" => $request->description_fa,
            "image" => $save_url,
            "status" => $request->status == 1 ? 1 : 0 ,
        ]);

        $nofit = [
            'message' => "Slider Created Successfully",
            "alert-type" => 'success',
        ];
        return redirect()->route('admin.sliders.index')->with($nofit);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            "name" => 'string',
            "name_fa" => 'string',
            "image" => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        if ($request->file('image')) {

            unlink($slider->image);
            $image = $request->file('image');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/sliders/' . $image_name);
            $save_url = 'upload/sliders/' . $image_name;

            $slider->update([
                "name" => $request->name,
                "name_fa" => $request->name_fa,
                "description" => $request->description,
                "description_fa" => $request->description_fa,
                "image" => $save_url,
                "status" => $request->status == 1 ? 1 : 0 ,
            ]);

        }else{
            $slider->update([
                "name" => $request->name,
                "name_fa" => $request->name_fa,
                "description" => $request->description,
                "description_fa" => $request->description_fa,
                "status" => $request->status == 1 ? 1 : 0 ,
            ]);
        }

        $nofit = [
            'message' => "Slider Updated Successfully",
            "alert-type" => 'success',
        ];
        return redirect()->route('admin.sliders.index')->with($nofit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        unlink($slider->image);
        $slider->delete();
        $nofit = [
            'message' => "Slider Deleted Successfully",
            "alert-type" => 'success',
        ];

        return redirect()->route('admin.sliders.index')->with($nofit);
    }
}
