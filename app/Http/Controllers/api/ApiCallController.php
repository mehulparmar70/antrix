<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\admin\Media;
use App\Models\admin\Contactus;
use DB;
use Session;

class ApiCallController extends Controller
{
    public function sendContact(Request $request){
        // return($request->all());

        // New code for captcha
        // checkEmailFilter();

        $emailArray = explode(", ",checkEmailFilter()->email);
        
        if( in_array( $request->email ,$emailArray ) )
        {
            return ['status' => 'fail', 'message' => $request->email.'found'];
        }
        else{
            if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['token_response'])){
                // return ($request->input());
                $url='https://www.google.com/recaptcha/api/siteverify';
                $secret='6Leh9bkUAAAAAOyJzjm921a2KlmNuiBZ5OzkD0cX';
                $recaptcha_response=$_POST['token_response'];
                
                $requestRecaptcha = file_get_contents($url . '?secret=' . $secret . '&response=' . $recaptcha_response);
                $response = json_decode($requestRecaptcha);
                
                if($response->success==true && $response->score >= 0.5){
                    $to = 'sales@giantinflatables.in';

                    sendMailNotification('contact_inquiry', $to, 'Inquiry From: '.$request->name,
                        ['name'=>$request->name,
                        'phone'=>$request->phone,
                        'email' => $request->email,
                        'country' => $request->country,
                        'msg' => $request->message,
                        'page_url' => $request->page_url,
                    ]);

                    $add = new contactus;
                    $add->full_name = $request->name;
                    $add->country = $request->country;
                    $add->phone_no = $request->phone;
                    $add->email = $request->email;
                    $add->message = $request->msg;
                    $add->page_url = $request->page_url;
                    $add->status = 'success';
                    $add->save();
                    return back()->with('success', 'Thank you for showing interest in our work and sending 
                    us the quote request. We will get back to you within 24 hours.');
                    return('success');
                    return ['status' => 'success', 'message' => 'Thank you for showing interest in our work and sending 
                    us the quote request. We will get back to you within 24 hours.'];
                }
                else{
                    
                  
                    $add = new contactus;
                    $add->full_name = $request->name;
                    $add->country = $request->country;
                    $add->phone_no = $request->phone;
                    $add->email = $request->email;
                    $add->message = $request->msg;
                    $add->page_url = $request->page_url;
                    $add->status = 'fail';
                    $add->save();
                    return back()->with('fail', 'Thank you for showing interest in our work and sending 
                    us the quote request. We will get back to you within 24 hours.');
                    return('success');
                    return ['status' => 'fail', 'message' => 'Thank you for showing interest in our work and sending 
                    us the quote request. We will get back to you within 24 hours.'];   
                }   
            }
        }


        // return checkEmailFilter();


        // // return ($request->input());
     

        // $to = 'sales@giantinflatables.in';

        // sendMailNotification('contact_inquiry', $to, 'Inquiry From: '.$request->name,
        //         ['name'=>$request->name, 'phone'=>$request->phone,
        //         'email' => $request->email,
        //         'country' => $request->country,
        //         'msg' => $request->message,
        //         'page_url' => $request->page_url,

        // ]);

        // return back()->with('success', 'Contact Inquiry Sent...');
    }


    public function sendContactEnquiry(Request $request){

        // dd('send Product enquiry');

        // dd($request->input());
        // mail@giantinflatables.in
            $to = 'sales@giantinflatables.in';

            sendMailNotification('enquire', $to, 'Enquire From: '.$request->name,
                 ['name'=>$request->name,
                  'phone'=>$request->phone,
                  'email' => $request->email,
                  'country' => $request->country,
                  'title' => $request->title,
                  'image' => $request->image,
                  'product_url' => $request->product_url,
                  'page_url' => $request->page_url,
                  'msg' => $request->message
            ]);

            // check for failed ones
        if (Mail::failures()) {
            // return failed mails
            return new Error(Mail::failures()); 
        }

        // else do redirect back to normal
        return('success');
        return back()->with('success', 'Contact Inquiry Sent...');
    }

    public function testMail(){

        sendMailNotification('comment', 'sales@giantinflatables.in', 'Comment From '. 'Contact Page',
                ['name'=>'Admin','client_name' => 'Mahesh Bhai', 'msg' => 'Testing Mail',
                'task_name' => 'Sending Mail', 'satus' => 1,
                'url' => 'https://www.giantinflatables.in', 
        ]);

        return back()->with('success', 'Contact Inquiry Sent...');
    }
    public function UploadMultipleImage(Request $request){
        /*print_r($request->file('image'));
        exit();*/
        foreach($request->file('image') as $index => $imageData){
            // print_r($request->alt);
            $media = new Media;
            $media->media_id = $request->media_id;
            $media->image_type = $request->image_type;
            $media->image_alt = $request->alt[$index];
            $media->image_title = $request->title[$index];
            $image_name2 = uploadMultipleImageThumb($imageData);
            $media->image = $image_name2;
            $save = $media->save();
        }
        if($save){       
            if(isset($request->isAjax)){
                Session::put('success', 'Image Filed Uploaded...');
                return (['status' => 'success', 'message' => 'Image Filed Uploaded...']);
            } else {
                Session::put('success', 'Image Filed Uploaded...');
                return back()->with('success', 'Image Filed Uploaded...');
            }
            // return back()->with('success', 'Images Uploaded...');
        }else{
            
            if(isset($request->isAjax)){
                Session::put('fail', 'something went wrong, try again later.');
                return (['status' => 'fail', 'message' => 'something went wrong, try again later.']);
            } else {
                return back()->with('fail', 'something went wrong, try again later.');
            }

        }
    }

    public function updateMultipleImageField($id, Request $request){

        $update = DB::table('media')->where('id', $id)
            ->update(['image_title' =>$request->title, 'image_alt' =>$request->alt]);


        if($update){       
            return back()->with('success', 'Image Filed Uploaded...');
            // return (['status' => 'success', 'message' => 'Image fields are Updated...']);
        }else{
            return (['status' => 'failed', 'message' => 'Something went wrong, Try again...']);

        }
    }
}
