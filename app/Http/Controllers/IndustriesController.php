<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Industries;
use App\Models\admin\Media;
use DB;

class IndustriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = [
            'testimonials' =>  Industries::orderBy('item_no')->get()
        ];
        return view('adm.pages.industries.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['testimonials' =>  Industries::all()];
        return view('adm.pages.industries.create',$data);
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
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        

        $item_no = Industries::orderBy('item_no', 'desc')->first();

        if($item_no){
            $item_no =  $item_no->item_no + 1;
        }else{
            $item_no = 1;
        }
        

        if($request->status){
            $status = 1;
        }else{
            $status = 0;
        }

        $image_name = uploadTinyImageThumb($request);
        $testimonial = new Industries;
        $testimonial->item_no = $item_no;
        $testimonial->title = $request->name;
        $testimonial->short_description = $request->short_description;
        $testimonial->image = $image_name;

        $testimonial->image_alt = $request->image_alt;      
        $testimonial->page_link = $request->page_link;      
        $testimonial->image_title = $request->image_title;  
        /*$testimonial->gallery = substr(trim($gallery), 0, -1);
        $testimonial->gallery_alt = substr(trim($gallery_alt), 0, -1);
        $testimonial->gallery_title = substr(trim($gallery_title), 0, -1);*/
        
        // $testimonial->youtube_embed = $request->youtube_embed;
        $testimonial->slug = $request->slug;
        
        $testimonial->status = $status;
        $save = $testimonial->save();
        $lastId = $testimonial->id;
        if($save){
            
            $multipleImage = $request->file('images');
            
            if (isset($multipleImage)) {
                foreach($request->file('images') as $index => $imageData){
                    $media = new Media;
                    $media->media_id = $lastId;
                    $media->image_type = 'industries';
                    $media->image_alt = $request->alt[$index];
                    $media->image_title = $request->title[$index];
                    $image_name2 = uploadMultipleImageThumb($imageData);
                    $media->image = $image_name2;
                    $save = $media->save();
                }
            }
            if(isset($_REQUEST['onscreenCms']) && $_REQUEST['onscreenCms'] == 'true'){
                session()->put('success','Data Added...');
                return(redirect(route('admin.close')));
            } else {
                return back()->with('success', 'Data Added...');
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
        $testimonial = Industries::find($id);
        
        $media = DB::table('media')->where('media_id', $id)->where('image_type', 'industries')->get();
        
        $data = [
            'testimonial' =>  $testimonial,
            'media' =>  $media,
        ];

        if($testimonial){
            return view('adm.pages.industries.edit', $data);
        }else{
            return redirect(route('industries.index'))->with('fail', 'Data Not Available...');
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

        /*$request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,webp',
        ]);*/

        $gallery = $gallery_alt = $gallery_title = '';
        $item_no = Industries::orderBy('item_no', 'desc')->first();
        if($item_no){
            $item_no =  $item_no->item_no + 1;
        }else{
            $item_no = 1;
        }

        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        if($request->file('image')){
            // dd($request->old_image);
            $image_name = uploadTinyImageThumb($request);
            deleteBulkImage($request->old_image);
        }else{
            $image_name = $request->old_image;
        }



        /*if($request->file('images')){
            foreach($request->file('images') as $index => $imageData){
                $image_name2 = uploadMultipleImageThumb($imageData);
                $gallery_alt .= $request->img_alt[$index].',';
                $gallery_title .= $request->img_title[$index].',';
                $gallery .= $image_name2.',';
            }
        } else {
            foreach($request->old_gallery as $index => $imageData){
                $gallery_alt .= $request->img_alt[$index].',';
                $gallery_title .= $request->img_title[$index].',';
                $gallery .= $imageData.',';
            }
        }*/
        
        $testimonial =  Industries::find($id);
        // $testimonial->client_name = $request->client_name;
        $testimonial->title = $request->name;
        $testimonial->page_link = $request->page_link;
        $testimonial->short_description = $request->short_description;
        $testimonial->full_description= $request->full_description;
        $testimonial->image = $image_name;
        $testimonial->image_alt = $request->image_alt;      
        $testimonial->image_title = $request->image_title;  
        $testimonial->gallery = substr(trim($gallery), 0, -1);
        $testimonial->gallery_alt = substr(trim($gallery_alt), 0, -1);
        $testimonial->gallery_title = substr(trim($gallery_title), 0, -1);

        // $testimonial->youtube_embed = $request->youtube_embed;
        $testimonial->slug = $request->slug;
        
        $testimonial->status = $status;
        $save = $testimonial->save();

        if($save){
            if($request->file('images')){
                foreach($request->file('images') as $index => $imageData){
                    $media = new Media;
                    $media->media_id = $id;
                    $media->image_type = 'industries';
                    $media->image_alt = $request->alt[$index];
                    $media->image_title = $request->title[$index];
                    $image_name2 = uploadMultipleImageThumb($imageData);
                    $media->image = $image_name2;
                    $save = $media->save();
                    
                }
            }
            // return back()->with('success', 'Data Updated...');
            if(isset($_REQUEST['onscreenCms']) && $_REQUEST['onscreenCms'] == 'true'){
                session()->put('success','Data Updated...');
                return(redirect(route('admin.close')));
            } else {
                return back()->with('success', 'Data Updated...');
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
    public function destroy(Testimonials $testimonial)
    {
        // dd($testimonial);
        
        deleteTableUrlData($testimonial->id, 'testimonial_link');

        $delete = $testimonial->delete();
        
        if($delete){
            deleteBulkImage($testimonial->image);
            return back()->with('success', 'Data Deleted...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }


        // $video = $video->delete();
        // if($video){
        //     return back()->with('success', 'Video Deleted...');
        // }else{
        //     return back()->with('fail', 'Something went wrong, try again later...');
        // }

    }

    public function deleteItem(Request $request,$id)
    {
            $testimonial = Industries::find($id);
            if($testimonial){
            deleteTableUrlData($testimonial->id, 'testimonial_link');
            $delete = $testimonial->delete();
            if($delete){
                deleteBulkImage($testimonial->image);
                // return back()->with('success', 'Data Deleted...');
                if($request->ajax())
                {
                    return response()->json(['success' => 'Content Deleted Successfully']);
                } else {
                    session()->put('success','Content Deleted Successfully');
                }
            }
            else{
                return back()->with('fail', 'Something went wrong, try again later...');
            }
        }
        else{
            return redirect(route('index'));
        }
    }
}
