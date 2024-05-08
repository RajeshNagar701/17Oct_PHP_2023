<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Hash;
use Session;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function adminloginauth(Request $request)
    {
        $validated = $request->validate([
            'anm' => 'required',
            'apass' => 'required',
        ]);
        $anm=$request->anm;
        $data=admin::where('anm',$anm)->first(); // select where email=data // get data fetch_object()
        if($data)
        {
            if(Hash::check($request->apass,$data->apass))
            {
              
                    // cookie
                    if($request->rem)
                    {
                        setcookie('anm',$request->anm,time()+30);
                        setcookie('apass',$request->apass,time()+30);
                    }
                    // create session
                    // $_SESSION['userid'];

                    session()->put('adminid',$data->id);
					session()->put('anm',$data->anm);
					session()->put('apass',$data->apass);

                    echo "<script> 
                    alert('Login Suuceess !');
                    window.location='/dashboard';
                    </script>";
                
            }
            else
            {
                echo "<script> 
                        alert('Password not match !'); 
                        window.location='/adminlogin';
                    </script>";
                   
               
            }
        }
        else
        {
            echo "<script>
                alert('Username does not exits !');
                window.location='/adminlogin';
             </script>";
            
        }

    }


    function adminlogout()
    {
        // delete
        session()->pull('adminid');
		session()->pull('anm');
		session()->pull('apass');
		return redirect('/adminlogin');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
