<?php

namespace App\Http\Controllers\Admin;

use App\Models\slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\slider\addrequest;
use App\Http\Requests\slider\updateslider;
use App\Http\Requests\slider\deleteslider;
use App\Http\Traits\imageTrait;
use RealRashid\SweetAlert\Facades\Alert;


class sliderController extends Controller
{
    use imageTrait;
    public function create()
    {

        return view('Admin/slider/create');
    }
    public function store(addrequest $request)
    {
        $filename = time() . rand() . '.' . $request->image->extension();
        $this->uploadImage($request->image, $filename, 'slider');
        slider::create([
            'image' => $filename,
        ]);
        Alert::success('Success', 'image Added Successfully');
        return redirect()->back();
    }
    public function index()
    {
        $sliders = slider::get();
        return view('Admin/slider/index', compact('sliders'));
    }
    public function edit($sliderid)
    {
        $slider = slider::find($sliderid);
        return view('Admin/slider/edit', compact('slider'));
    }
    function update(updateslider $request)
    {
        $slider = slider::find($request->slider_id);

        if (request()->hasFile('image')) {
            $filename = time() . rand() . '.' . $request->image->extension();
            $old = 'images/slider/' . $slider->image;
            $this->uploadImage($request->image, $filename, 'slider', $old);
        } else {
            $filename = $slider->image;
        }
        $slider->update([
            'image' => $filename
        ]);
        Alert::success('Success', 'image updated Successfully');
        return redirect()->back();
    }
    public function delete(deleteslider $request)
    {
        $slider = slider::find($request->slider_id);
        unlink(public_path('images/slider/' . $slider->image));
        $slider->delete();
        Alert::success('Success', 'image delete Successfully');
        return redirect()->back();
    }
}
