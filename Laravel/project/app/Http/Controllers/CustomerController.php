<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\customer;
use Illuminate\Http\Request;

use Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data=customer::all();
        return view('admin.manage_user',["customers_arr"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=country::all();
        return view('website.signup',["arr_cuuntries"=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new customer;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->gender=$request->gender;
        $data->hobby=implode(",",$request->hobby);
        $data->mobile=$request->mobile;
        $data->cid=$request->cid;

        // image upload
        $img=$request->file('img');		
		$filename=time().'_img.'.$img->getClientOriginalExtension();
		$img->move('website/img/customer/',$filename);  // use move for move image in public/images		
        $data->img=$filename;
       
        $data->save();
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer,$id)
    {
        $data=customer::find($id);
		$data->delete();
		return redirect('/manage_user');
    }
}
