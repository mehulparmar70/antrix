<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'sliders' =>  Slider::orderBy('slider_no')->get()
        ];
        return view('adm.pages.slider.index', $data);
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
            'image' => 'image|mimes:jpg,png,jpeg,webp'
        ]);

        $slider_no = Slider::orderBy('slider_no', 'desc')->first();

        if($slider_no){
            $slider_no =  $slider_no->slider_no + 1;
        }else{
            $slider_no = 1;
        }
        
        if($request->status){
            $status = 1;
        }else{
            $status = 0;
        }
        

        $image_name = uploadTinyImageThumb($request);
        $slider = new Slider;
        $slider->slider_no = $slider_no;
        $slider->title = $request->title;
        $slider->image = $image_name;
        $slider->description = $request->description;
        $slider->url = $request->url;
        $slider->youtube_embed = $request->youtube_embed;

        $slider->meta_title  = $request->meta_title;
        $slider->meta_keyword  = $request->meta_keyword;
        $slider->meta_description  = $request->meta_description;
        
        $slider->status = $status;
        
        $save = $slider->save();

        if($save){
            $slider_list = Slider::find($slider->id);
            $slider_list->slider_no = $slider_no;
            $slider_list->save();
            if ($request->close == "1") {
                session()->put('success','Slider Added...');
                return(redirect(route('admin.close')));
            } else {
                return back()->with('success', 'Slider Added...');
            }
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
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
        // dd($id);

        $slider =  Slider::find($id);

        $data = [
            'sliders' =>  Slider::orderBy('slider_no')->get(),
            'slider' =>  $slider
        ];
        if($slider){
            return view('adm.pages.slider.edit', $data);
        }else{
            return redirect(route('slider.index'))->with('fail', 'Slider Not Available...');
        }

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
        
        // dd($request->input());
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,webp',
        ]);

        if($request->file('image')){
            $image_name = uploadTinyImageThumb($request);
        }else{
            $image_name = $request->old_image;
        }

        $slider_no = Slider::orderBy('slider_no', 'desc')->first();

        if($request->status){
            $status = 1;
        }else{
            $status = 0;
        }

        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->image = $image_name;
        $slider->description = $request->description;
        $slider->url = $request->url;
        $slider->youtube_embed = $request->youtube_embed;

        $slider->meta_title  = $request->meta_title;
        $slider->meta_keyword  = $request->meta_keyword;
        $slider->meta_description  = $request->meta_description;
        
        $slider->status = $status;
        // $slider->admin_id = session('LoggedUser')->id;
        
        $save = $slider->save();


        if($save){
            if ($request->close == "1") {
                session()->put('success','Slider Updated...');
                return(redirect(route('admin.close')));
            } else {
                return back()->with('success', 'Slider Updated...');
            }
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        // dd($slider->id);
        deleteBulkImage($slider->image);
        $slider = $slider->delete();
        if($slider){
            return back()->with('success', 'Slider Deleted...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }

    public function update_list_no($id){
                 
  	    $i=1;
  		foreach ($data as $key => $value) {
                $slider = Slider::find($value);
                $slider->slider_no = $i;
                $slider->save();
			$i++;
		}
    }
    
}
