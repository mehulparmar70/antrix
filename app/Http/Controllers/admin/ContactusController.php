<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Contactus;
use Illuminate\Http\Request;
use Session;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->contactus = Contactus::orderBy('id', 'DESC')->get();
    }

    public function index()
    {
        $data = ['contactus' =>  $this->contactus];
        return view('adm.pages.contact.index', $data);
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
        $add = new contactus();

        $add->full_name = $request->full_name;
        $add->country = $request->country;
        $add->phone_no = $request->phone_no;
        $add->email = $request->email;
        $add->message = $request->message;

        $add->save();

        return redirect(route('contact'));
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
        // dd($contact);

        $delete = Contactus::destroy($id);
        if ($delete) {
            return back()->with('success', 'Contactus Deleted...');
        } else {
            return back()->with('fail', 'Something went wrong, try again later...');
        }
    }
}
