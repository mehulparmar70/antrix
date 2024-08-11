<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\admin\Media;

use Intervention\Image\Facades\Image;
// use Image;
use File;
use DB; 
use Session;
// use Illuminate\Support\Facades\Auth;

use Auth;


class MediaApiController extends Controller
{
    public function index(){
        header("Access-Control-Allow-Origin: *");
             
        $getPosts = DB::table('media')
        ->orderBy('media.id','desc')
        ->get();

        return response()->json($getPosts);

    }

    public function getProductImages($id){
        header("Access-Control-Allow-Origin: *");
        $getPosts = DB::table('media')
        ->orderBy('media.id','desc')
        ->where('media_id',$id)
        ->get();

        return response()->json($getPosts);
    }

    public function updateProductImage(Request $request){
        // dd($request->input());
        $media = Media::find($request->id);
        $media->id = $request->id;
        $media->image_alt = $request->image_alt;
        $media->image_title = $request->image_title;
        if($media->save()){        
            return 'Product Image Data Saved';
        }else{
            return 'something went wrong, try again later.';    
        }

    }

    
    public function mediaStore(Request $request){
        
        header("Access-Control-Allow-Origin: *");
        $image = $request->file('image');
            
        $input['imagename'] = time().'_'.rand(1111,9999).'.'.$image->extension();
        
        //icon images resize
        // $destinationPath = public_path('../../public_html/web/media/icon');
        $destinationPath = public_path('/web/media/icon');
        $img_icon = Image::make($image->path());
        $img_icon->resize(60, 60, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        
        //xs images resize
        $destinationPath = public_path('/web/media/xs');
        $img_xs = Image::make($image->path());
        $img_xs->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        
        //sm images resize
        $destinationPath = public_path('/web/media/sm');
        $img_sm = Image::make($image->path());
        $img_sm->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        
        //md images resize
        $destinationPath = public_path('/web/media/md');
        $img_md = Image::make($image->path());
        $img_md->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
   
        //original image 
        $destinationPath = public_path('/web/media/lg');
        $image->move($destinationPath, $input['imagename']);
                    
            $media_id = 'med_'.mt_rand(1000, 9999).mt_rand(50000,99999);

                $media = new Media;
                $media->media_id = $request->media_id;
                $media->image_type = $request->image_type;
                $media->image_alt = $request->image_alt;
                $media->image_title = $request->image_title;
                $media->image = $input['imagename'];
                if($media->save()){       
                    return 'success';;
                }else{
                    return 'something went wrong, try again later.';

                }
    }

    public function updateImageData(Request $request){
        header("Access-Control-Allow-Origin: *");

                $media = Media::find($request->id);
                $media->image_alt = $request->image_alt;
                $media->image_title = $request->image_title;

                if($media->save()){        
                    return 'success';
                }else{
                    return 'something went wrong, try again later.';

            }
    }

    
    
    public function mediaDelete(Request $request){
        header("Access-Control-Allow-Origin: *");
        $media = Media::find($request->id);
        
        if($media){
            if(File::exists(public_path('web').'/media/lg/'.$media->image)){
                unlink(public_path('web').'/media/lg/'.$media->image);
                unlink(public_path('web').'/media/md/'.$media->image);
                unlink(public_path('web').'/media/sm/'.$media->image);
                unlink(public_path('web').'/media/xs/'.$media->image);
                unlink(public_path('web').'/media/icon/'.$media->image);
                $media->delete();
                return ['status' => 'success', 'message' => 'Image Deleted...', 'deleted_id' => $request->id];
            }
            else{
                $media->delete();
                return ['failed' => 'success', 'message' => 'Something went wrong, please try again...'];
            }
        }else{
                $media->delete();
                return ['failed' => 'success', 'message' => 'Something went wrong, please try again...'];
        }
    }

    public function imageDelete(Request $request){
        header("Access-Control-Allow-Origin: *");
        $getData = DB::table($request->table)->where('id',$request->id)->get()->toArray();

        if (count($getData) > 0) {
            $fileName = $getData[0]->{$request->field};
            
            if(File::exists(public_path('web').'/media/lg/'.$fileName)){
                unlink(public_path('web').'/media/lg/'.$fileName);
                unlink(public_path('web').'/media/md/'.$fileName);
                unlink(public_path('web').'/media/sm/'.$fileName);
                unlink(public_path('web').'/media/xs/'.$fileName);
                unlink(public_path('web').'/media/icon/'.$fileName);

                 $data = [
                    $request->field => NULL
                ];
                DB::table($request->table)->where('id',$request->id)->update($data);
                session()->put('success','Image Deleted...');
                return ['status' => 'success', 'message' => 'Image Deleted...', 'deleted_id' => $request->id];
            } else{
                session()->put('danger','Something went wrong, please try again...');
               return ['status' => 'error', 'message' => 'Something went wrong, please try again...']; 
            }

        } else {
            session()->put('danger','Something went wrong, please try again...');
            return ['status' => 'error', 'message' => 'Something went wrong, please try again...'];
        }
        /*$media = Media::find($request->id);
        
        if($media){
            if(File::exists(public_path('web').'/media/lg/'.$media->image)){
                unlink(public_path('web').'/media/lg/'.$media->image);
                unlink(public_path('web').'/media/md/'.$media->image);
                unlink(public_path('web').'/media/sm/'.$media->image);
                unlink(public_path('web').'/media/xs/'.$media->image);
                unlink(public_path('web').'/media/icon/'.$media->image);
                $media->delete();
                return ['status' => 'success', 'message' => 'Image Deleted...', 'deleted_id' => $request->id];
            }
            else{
                $media->delete();
                return ['failed' => 'success', 'message' => 'Something went wrong, please try again...'];
            }
        }else{
                $media->delete();
                return ['failed' => 'success', 'message' => 'Something went wrong, please try again...'];
        }*/
    }
}
