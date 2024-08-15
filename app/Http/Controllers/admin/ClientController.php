<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Admin;
use App\Models\admin\Client;
use Illuminate\Support\Facades\Hash;
use App\Models\admin\Media;
use File;
use Image;
use DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(){
        $this->clients = Client::orderBy('item_no')->get();
    }
    

    public function index()
    {
        $data = ['clients' =>  $this->clients];
        return view('adm.pages.client.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('adm.pages.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('image'));
        $request->validate([
            'name' => 'required|max:255'
        ]);

        if($request->status){
            $status = 1;
        }else{
            $status = 0;
        }

        $image_name = uploadTinyImageThumb($request);
        $client = new Client;
        $client->name = $request->name;
        $client->image = $image_name;
        $client->url = $request->url;
        $client->short_description = $request->short_description;
        // $client->client_images = $image_name;
        $client->note = $request->note;
        $client->admin_id = session('LoggedUser')->id;
        $client->status = $status;
               
        $save = $client->save();
        $lastId = $client->id;
        if($save){

            $multipleImage = $request->file('images');
            /*print_r($request->all());
            exit();*/
            if (isset($multipleImage)) {
                foreach($request->file('images') as $index => $imageData){
                    $media = new Media;
                    $media->media_id = $lastId;
                    $media->image_type = 'clients';
                    $media->image_alt = $request->alt[$index];
                    $media->image_title = $request->title[$index];
                    $image_name2 = $imageData;
                    $media->image = $image_name2;
                    $save = $media->save();
                }
            }
            if ($request->close == "1") {
                session()->put('success','Client Added...');
                return(redirect(route('admin.close')));
            } else {
                return back()->with('success', 'Client Added...');
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
        $client = Client::find($id);
        if(!isset($client)){
            return redirect(route('client.index'));
        }
        $media = DB::table('media')->where('media_id', $id)->where('image_type', 'clients')->get();
        
        $data = ['client' =>  Client::find($id), 'clients' => $this->clients,'media' =>  $media];
        
        return view('adm.pages.client.edit', $data);
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
        
        if($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }

        if($request->file('image')){
            $image_name = uploadTinyImageThumb($request);
            deleteBulkImage($request->old_image);
        }else{
            $image_name = $request->old_image;
        }

        $client = Client::find($id);
        $client->name = $request->name;
        $client->note  = $request->note ;  
        $client->image = $image_name;
        $client->url = $request->url;
        $client->short_description = $request->short_description;
        // $client->client_images = $client_images;
        $client->status = $status;     
          
        $save = $client->save();

        if($save){
            $multipleImage = $request->file('images');
            
            if (isset($multipleImage)) {
                foreach($request->file('images') as $index => $imageData){
                    $media = new Media;
                    $media->media_id = $lastId;
                    $media->image_type = 'clients';
                    $media->image_alt = $request->alt[$index];
                    $media->image_title = $request->title[$index];
                    $image_name2 = uploadMultipleImageThumb($imageData);
                    $media->image = $image_name2;
                    $save = $media->save();
                }
            }

            if ($request->close == "1") {
                session()->put('success','Client Updated...');
                return(redirect(route('admin.close')));
            } else {
                return back()->with('success', 'Client Updated...');
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

    public function destroy(Client $client)
    {
        // dd($client)
        $delete = $client->delete();
        if($delete){
            deleteBulkImage($client->image);
            return back()->with('success', 'Client Deleted...');
        }else{
            return back()->with('fail', 'Something went wrong, try again later...');
        }

    }
}
