<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\StoreRequest;
use App\Http\Requests\Admin\Slider\UpdateRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //
    public function index()
    {
        $ListSliders = Slider::paginate(10);
        return view('/admin/sliders/index', [
            'data' => $ListSliders,
        ]);
    }
    
    public function create()
    {
        return view('admin/sliders/create');
    }
    public function store(StoreRequest $request)
    {
        $data = request()->except('_token');
        $result = Slider::create($data);
        return redirect()->route('admin.sliders.index');
    }
    public function edit(Slider $slider)
    {
        return view('admin/Sliders/edit', [
            'data' => $slider,
        ]);
    }
    public function update(UpdateRequest $request, Slider $slider)
    {
        $data = request()->except('_token');
        $slider->update($data);

        return redirect()->route('admin.sliders.index');
    }
    public function delete(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index');
    }
}
