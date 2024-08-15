<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'videos' =>  Video::orderBy('item_no')->get()
        ];
        return view('adm.pages.video.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['videos' =>  Video::all()];
        return view('adm.pages.video.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->status);
        $request->validate([
            
            'title' => 'required',
        ]);

        
        $item_no = Video::orderBy('item_no','desc')->first();

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
        
        $youtube1 = "https://www.youtube.com/watch?v=";
        $youtube2 = "https://youtu.be";
        $mystring = $request->youtube_embed;

        // if(strpos($mystring, $youtube1) !== false){
        //     $youtube_embed = str_replace("https://www.youtube.com/watch?v=","https://www.youtube.com/embed/",$request->youtube_embed);
        // }
        // else if(strpos($mystring, $youtube2) !== false){
        //     $youtube_embed = str_replace("https://youtu.be","https://www.youtube.com/embed",$request->youtube_embed);
        // }else{
        //     $youtube_embed = null;
        // }


        $image_name = uploadTinyImageThumb($request);
        $video = new Video;
        $video->title = $request->title;
        $video->item_no = $item_no;
        $video->short_description = $request->short_description;
        $video->video_date = $request->video_date;
        $video->youtube_embed = $request->youtube_embed;

        $video->status = $status;
        $save = $video->save();

        if($save){
            return back()->with('success', 'Video Added...');
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
        $video = Video::find($id);
        $data = [
            'video' =>  $video
        ];

        if($video){
            return view('adm.pages.video.edit', $data);
        }else{
            return redirect(route('video.index'))->with('fail', 'Video Not Available...');
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
        $request->validate([

        ]);

        
        $item_no = Video::orderBy('item_no')->first();

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


        
        $video =  Video::find($id);
        $video->title = $request->title;
        $video->short_description = $request->short_description;
        $video->video_date = $request->video_date;
        $video->youtube_embed = $request->youtube_embed;

        $video->status = $status;
        $save = $video->save();

        if($save){
            return back()->with('success', 'Video Updated...');
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
    public function destroy(Video $video)
    {
        $video = $video->delete();
        if($video){
            return back()->with('success', 'Video Deleted...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }

    public function deleteItem($id)
    {
        $video = Video::find($id);
        if($video){
            deleteTableUrlData($video->id, 'testimonial_link');
            $delete = $video->delete();

            if(isset($delete)){
                deleteBulkImage($video->image);
                return back()->with('success', 'Testimonial Deleted...');
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
