<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Pages;
use Intervention\Image\Facades\Image;

class PageController extends Controller
{
    public function productPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'product_page')->first(),
        ];
        return view('adm.pages.home-editor.product-page', $data);
    }

    public function aboutPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'about_page')->first(),
        ];
        
        return view('adm.pages.home-editor.about-page', $data);
    }

    public function testimonialPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'testimonial_page')->first(),
        ];
        return view('adm.pages.home-editor.testimonial-page', $data);
    }
    
    public function videoPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'video_page')->first(),
        ];
        return view('adm.pages.home-editor.video-page', $data);
    }

    public function blogPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'blog_page')->first(),
        ];
        return view('adm.pages.home-editor.blog-page', $data);
    }

    public function partenrsPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'partenr_page')->first(),
        ];
        return view('adm.pages.home-editor.partners-page', $data);
    }
    public function contactPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'contact_page')->first(),
        ];
        return view('adm.pages.home-editor.contact-page', $data);
    }
    public function casestudiesPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'casestudies_page')->first(),
        ];
        return view('adm.pages.home-editor.casestudies-page', $data);
    }
    public function newsletterPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'newsletter_page')->first(),
        ];
        return view('adm.pages.home-editor.newsletter-page', $data);
    }
    public function industriePageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'industrie_page')->first(),
        ];
        return view('adm.pages.home-editor.industrie-page', $data);
    }
    public function updatesPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'updates_page')->first(),
        ];
        return view('adm.pages.home-editor.updates-page', $data);
    }
    public function clientPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'client_page')->first(),
        ];
        return view('adm.pages.home-editor.client-page', $data);
    }
    public function awardsPageEditor(){
        $data = [
            'pageData' =>  Pages::where('type', 'award_page')->first(),
        ];
        return view('adm.pages.home-editor.awards-page', $data);
    }

    // public function pageEditorStore(Request $request){
        
    //     // dd($request);
    //     /*dd($request->all());
    //     exit();*/
        
    //     $page_title = $request->page_title;
    //     $ifExist = Pages::where('type', $request->type)->first();

    //     if($ifExist){
    //         if($request->file('image')){
    //             $image_name = uploadTinyImageThumb($request);
    //             // print_r($image_name.'---');
    //             // exit();
    //             deleteBulkImage($request->old_image);
    //         }else{
    //             $image_name = $request->old_image;
    //         }
    //         // print_r($image_name.'---12');
    //         // exit();
    //     // dd($request->file('image'));
    //         $pageEditor = Pages::find($ifExist->id);
    //         $pageEditor->type = $request->type;
    //         $pageEditor->description = $request->description;
    //         $pageEditor->url = $request->url;
    //         $pageEditor->featured_image = $image_name;
            
    //         $pageEditor->image_alt = $request->image_alt;      
    //         $pageEditor->image_title = $request->image_title;   

    //         $pageEditor->search_index = $request->search_index;   
    //         $pageEditor->search_follow = $request->search_follow;   
    //         $pageEditor->canonical_url = $request->canonical_url;   
    //         $pageEditor->page_title = isset($page_title)?$page_title:NULL;
            
    //         $pageEditor->meta_title  = $request->meta_title;
    //         $pageEditor->meta_keyword  = $request->meta_keyword;
    //         $pageEditor->meta_description  = $request->meta_description;
    //         $pageEditor->status = 1;
    //         $save = $pageEditor->save();
    //         if($save){
             
    //             if ($request->close == "1") {
    //                 $pageType = $request->type;
    //                 $pos = strpos($pageType, '_');
    //                 $pageType = substr($pageType, 0, $pos === false ? strlen($pageType) : $pos);
    //                 session()->put('success',$pageType.' Details Updated...');
    //                 // return(redirect(route('admin.close')));
    //                 return response()->json(['success' => true, 'message' => $message]);
    //             } else {
    //                 // exit();
    //                 return back()->with('success', $request->type.' Details Updated...');
    //             }
    //         }else{
    //             return back()->with('fail', 'Something went wrong, try again later...');
    //         }
    //     }
    //     else{
    //         if($request->file('image')){
    //             $image_name = uploadTinyImageThumb($request);
    //         }else{
    //             $image_name = $request->old_image;
    //         }

    //         // dd($image_name);
    //         $pageEditor = new Pages;
    //         $pageEditor->type = $request->type;
    //         $pageEditor->description = $request->description;
    //         $pageEditor->url = $request->url;
    //         $pageEditor->featured_image = $image_name;

    //         $pageEditor->image_alt = $request->image_alt;      
    //         $pageEditor->image_title = $request->image_title;   

    //         $pageEditor->meta_title  = $request->meta_title;
    //         $pageEditor->meta_keyword  = $request->meta_keyword;
    //         $pageEditor->meta_description  = $request->meta_description;
    //         $pageEditor->status = 1;
    //         $save = $pageEditor->save();
    //         if($save){
    //             if ($request->close == "1") {
    //                 $pageType = $request->type;
    //                 $pos = strpos($pageType, '_');
    //                 $pageType = substr($pageType, 0, $pos === false ? strlen($pageType) : $pos);
    //                 session()->put('success',$pageType.' Details Added...');
    //                 // return(redirect(route('admin.close')));
    //                 return response()->json(['success' => true, 'message' => $message]);
    //             } else {
    //                 return back()->with('success', $request->type.' Details Added...');
    //             }
    //         }else{
    //             return back()->with('fail', 'Something went wrong, try again later...');
    //         }
    //     }
    // }

    public function pageEditorStore(Request $request) {
    
        // Get the page title from the request
        $page_title = $request->page_title;
        
        // Check if a page with the given type already exists
        $ifExist = Pages::where('type', $request->type)->first();
    
        if ($ifExist) {
            // Check if a new image is uploaded
            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = time() . '_' . $image->getClientOriginalName();
    
                // Compress and save the image
                $image_path = public_path('images/' . $image_name);
                Image::make($image)
                    ->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save($image_path, 75); // 75% quality
    
                // Delete the old image if it exists
                if ($request->old_image && file_exists(public_path('images/' . $request->old_image))) {
                    unlink(public_path('images/' . $request->old_image));
                }
            } else {
                // If no new image is uploaded, use the old image
                $image_name = $request->old_image;
            }
    
            // Update the existing page with new data
            $pageEditor = Pages::find($ifExist->id);
            $pageEditor->type = $request->type;
            $pageEditor->description = $request->description;
            $pageEditor->url = $request->url;
            $pageEditor->featured_image = $image_name;
            $pageEditor->image_alt = $request->image_alt;
            $pageEditor->image_title = $request->image_title;
            $pageEditor->search_index = $request->search_index;
            $pageEditor->search_follow = $request->search_follow;
            $pageEditor->canonical_url = $request->canonical_url;
            $pageEditor->page_title = isset($page_title) ? $page_title : NULL;
            $pageEditor->meta_title = $request->meta_title;
            $pageEditor->meta_keyword = $request->meta_keyword;
            $pageEditor->meta_description = $request->meta_description;
            $pageEditor->status = 1;
            
            $save = $pageEditor->save();
    
            if ($save) {
                if ($request->close == "1") {
                    $pageType = $request->type;
                    $pos = strpos($pageType, '_');
                    $pageType = substr($pageType, 0, $pos === false ? strlen($pageType) : $pos);
                    session()->put('success', $pageType . ' Details Updated...');
                    return back()->with('success', $request->type . ' Details Updated...');
                } else {
                    return back()->with('success', $request->type . ' Details Updated...');
                }
            } else {
                return back()->with('fail', 'Something went wrong, try again later...');
            }
        } else {
            // If no page exists, create a new one
            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = time() . '_' . $image->getClientOriginalName();
    
                // Compress and save the image
                $image_path = public_path('images/' . $image_name);
                Image::make($image)
                    ->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save($image_path, 75); // 75% quality
            } else {
                $image_name = $request->old_image;
            }
    
            $pageEditor = new Pages;
            $pageEditor->type = $request->type;
            $pageEditor->description = $request->description;
            $pageEditor->url = $request->url;
            $pageEditor->featured_image = $image_name;
            $pageEditor->image_alt = $request->image_alt;
            $pageEditor->image_title = $request->image_title;
            $pageEditor->meta_title = $request->meta_title;
            $pageEditor->meta_keyword = $request->meta_keyword;
            $pageEditor->meta_description = $request->meta_description;
            $pageEditor->status = 1;
    
            $save = $pageEditor->save();
    
            if ($save) {
                if ($request->close == "1") {
                    $pageType = $request->type;
                    $pos = strpos($pageType, '_');
                    $pageType = substr($pageType, 0, $pos === false ? strlen($pageType) : $pos);
                    session()->put('success', $pageType . ' Details Added...');
                    return response()->json(['success' => true, 'message' => $pageType . ' Details Added...']);
                } else {
                    return back()->with('success', $request->type . ' Details Added...');
                }
            } else {
                return back()->with('fail', 'Something went wrong, try again later...');
            }
        }
    }
    

    // public function pageEditorStore(Request $request) {
    
    //     // Get the page title from the request
    //     $page_title = $request->page_title;
        
    //     // Check if a page with the given type already exists
    //     $ifExist = Pages::where('type', $request->type)->first();
    
    //     if ($ifExist) {
    //         // Check if a new image is uploaded
    //         if ($request->file('image')) {
    //             $image = $request->file('image');
    //             $image_name = time() . '_' . $image->getClientOriginalName();
    //             $image->move(public_path('images'), $image_name);  // Save the image to the 'images' directory
    
    //             // Delete the old image if it exists
    //             if ($request->old_image && file_exists(public_path('images/' . $request->old_image))) {
    //                 unlink(public_path('images/' . $request->old_image));
    //             }
    //         } else {
    //             // If no new image is uploaded, use the old image
    //             $image_name = $request->old_image;
    //         }
    
    //         // Update the existing page with new data
    //         $pageEditor = Pages::find($ifExist->id);
    //         $pageEditor->type = $request->type;
    //         $pageEditor->description = $request->description;
    //         $pageEditor->url = $request->url;
    //         $pageEditor->featured_image = $image_name;
    //         $pageEditor->image_alt = $request->image_alt;
    //         $pageEditor->image_title = $request->image_title;
    //         $pageEditor->search_index = $request->search_index;
    //         $pageEditor->search_follow = $request->search_follow;
    //         $pageEditor->canonical_url = $request->canonical_url;
    //         $pageEditor->page_title = isset($page_title) ? $page_title : NULL;
    //         $pageEditor->meta_title = $request->meta_title;
    //         $pageEditor->meta_keyword = $request->meta_keyword;
    //         $pageEditor->meta_description = $request->meta_description;
    //         $pageEditor->status = 1;
            
    //         $save = $pageEditor->save();
    
    //         if ($save) {
    //             if ($request->close == "1") {
    //                 $pageType = $request->type;
    //                 $pos = strpos($pageType, '_');
    //                 $pageType = substr($pageType, 0, $pos === false ? strlen($pageType) : $pos);
    //                 session()->put('success', $pageType . ' Details Updated...');
    //                 return back()->with('success', $request->type . ' Details Updated...');
    //             } else {
    //                 return back()->with('success', $request->type . ' Details Updated...');
    //             }
    //         } else {
    //             return back()->with('fail', 'Something went wrong, try again later...');
    //         }
    //     } else {
    //         // If no page exists, create a new one
    //         if ($request->file('image')) {
    //             $image = $request->file('image');
    //             $image_name = time() . '_' . $image->getClientOriginalName();
    //             $image->move(public_path('images'), $image_name);  // Save the image to the 'images' directory
    //         } else {
    //             $image_name = $request->old_image;
    //         }
    
    //         $pageEditor = new Pages;
    //         $pageEditor->type = $request->type;
    //         $pageEditor->description = $request->description;
    //         $pageEditor->url = $request->url;
    //         $pageEditor->featured_image = $image_name;
    //         $pageEditor->image_alt = $request->image_alt;
    //         $pageEditor->image_title = $request->image_title;
    //         $pageEditor->meta_title = $request->meta_title;
    //         $pageEditor->meta_keyword = $request->meta_keyword;
    //         $pageEditor->meta_description = $request->meta_description;
    //         $pageEditor->status = 1;
    
    //         $save = $pageEditor->save();
    
    //         if ($save) {
    //             if ($request->close == "1") {
    //                 $pageType = $request->type;
    //                 $pos = strpos($pageType, '_');
    //                 $pageType = substr($pageType, 0, $pos === false ? strlen($pageType) : $pos);
    //                 session()->put('success', $pageType . ' Details Added...');
    //                 return response()->json(['success' => true, 'message' => $pageType . ' Details Added...']);
    //             } else {
    //                 return back()->with('success', $request->type . ' Details Added...');
    //             }
    //         } else {
    //             return back()->with('fail', 'Something went wrong, try again later...');
    //         }
    //     }
    // }
    
}
