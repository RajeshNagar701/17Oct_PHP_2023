<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\customer;
use Illuminate\Http\Request;

use Hash;
use Session;
use cookie;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
		$data=customer::join('countries', 'customers.cid', '=','countries.id')->get(['customers.*', 'countries.cnm']);
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


    public function login(Request $request)
    {
        return view('website.login');
    }
    

    public function loginauth(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email=$request->email;
        $data=customer::where('email',$email)->first(); // select where email=data // get data fetch_object()
        if($data)
        {
            if(Hash::check($request->password,$data->password))
            {
                if($data->status=="Unblock")
                {
                    
                    // cookie
                    setcookie('email',$request->email,time()+30);
                    setcookie('password',$request->password,time()+30);
                    //cookie('email', $data->email, 1440);
                    //cookie('password', $data->password, 1440);

                    // create session
                    // $_SESSION['userid'];

                    session()->put('userid',$data->id);
					session()->put('email',$data->email);
					session()->put('name',$data->name);

                    echo "<script> 
                    alert('Login Suuceess !');
                    window.location='/';
                    </script>";
                    
                  
                }
                else
                {
                    echo "<script> 
                        alert('Blocked !'); 
                        window.location='/login';
                    </script>";
                   
                }
            }
            else
            {
                echo "<script> 
                        alert('Password not match !'); 
                        window.location='/login';
                    </script>";
                   
               
            }
        }
        else
        {
            echo "<script>
                alert('Username does not exits !');
                window.location='/login';
             </script>";
            
        }

    }


    function logout()
    {
        // delete
        session()->pull('userid');
		session()->pull('email');
		session()->pull('name');
		return redirect('/');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|alpha:ascii |max:255',
            'email' => 'required|unique:customers',
            'password' => 'required|min:8|max:12',
            'mobile' => 'required|digits:10',
            'gender' => ['required', 'in:Male,Female'],
            'hobby[]' => 'integer|boolean|min:0|max:2',
            'cid' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

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
	 
	public function profile()
    {
		$id=session()->get('userid');
		//$data=customer::find($id); // if you want get data only ID 
		$data=customer::where('id','=',$id)->first();
        return view('website.profile',["fetch"=>$data]);
    } 
	 
    public function edit(customer $customer,$id)
    {   
		$coutries=country::all();
		$data=customer::find($id);
        return view('website.edit_user',["arr_cuuntries"=>$coutries,"fetch"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer,$id)
    {
        $validated = $request->validate([
            'name' => 'required|alpha:ascii |max:255',
            'email' => 'required',
            'mobile' => 'required|digits:10',
            'gender' => ['required', 'in:Male,Female'],
            'hobby[]' => 'integer|boolean|min:0|max:2',
            'cid' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data=customer::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->gender=$request->gender;
        $data->hobby=implode(",",$request->hobby);
        $data->mobile=$request->mobile;
        $data->cid=$request->cid;

        // image upload
		if($request->hasfile('img'))
		{
			$old_img=$data->img; // get old img for delete
			 
			$img=$request->file('img');		
			$filename=time().'_img.'.$img->getClientOriginalExtension();
			$img->move('website/img/customer/',$filename);  // use move for move image in public/images		
			$data->img=$filename;
			
			unlink('website/img/customer/'.$old_img);
		} 
		
	    $data->update();
        return redirect('/profile');
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
