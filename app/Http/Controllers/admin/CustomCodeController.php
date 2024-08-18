<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\CustomCode;



class CustomCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            // 'sliders' =>  Slider::orderBy('slider_no')->get()

        ];
        return view('adm.pages.custom-code.custom-js', $data);
    }

    public function customJs()
    {
        $data = [
            'headerJs' =>  CustomCode::where('type', 'header-code')->first(),
            'footerJs' =>  CustomCode::where('type', 'footer-code')->first(),

        ];
        return view('adm.pages.custom-code.custom-js', $data);
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
        // dd($request->input());


        $ifExist = CustomCode::where('type', $request->type)->first();

        if($ifExist){

        // dd($request->file('image'));
            $customCode = CustomCode::find($ifExist->id);
            $customCode->description = $request->description;
            $save = $customCode->save();
            if($save){
                return back()->with('success', $request->type.' Details Updated...');
            }else{
                return back()->with('fail', 'Something went wrong, try again later...');
            }
        }
        else{
            if($request->file('image')){
                $image_name = uploadImageThumb($request);
            }else{
                $image_name = $request->old_image;
            }

            $customCode = new CustomCode;
            $customCode->type = $request->type;
            $customCode->description = $request->description;
            $save = $customCode->save();
            if($save){
                return back()->with('success', $request->type.' Details Added...');
            }else{
                return back()->with('fail', 'Something went wrong, try again later...');
            }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
