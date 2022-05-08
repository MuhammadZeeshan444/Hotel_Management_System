<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;
use App\Models\RoomType;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Customer::all();
        return view('customer.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roomtype = Customer::all();
        return view('customer.create',['roomtype'=> $roomtype]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'mobile' => 'required',
        ]);
        $cutomer = new Customer();
        $cutomer->full_name = $request->input('full_name');
        $cutomer->email = $request->input('email');
        $cutomer->password = sha1($request->input('password'));
        $cutomer->mobile = $request->input('mobile');
        $cutomer->address = $request->input('address');

        // $image = $request->file('photo')->getClientOriginalExtension();
        // $imagename = time().'.'.$image;
        // $request->file('photo')->move('img',$imagename);

        // // $imgPath = $request->file('photo')->store('public/imgs');
        // $cutomer->photo = $imagename;
        $cutomer->save();

        $ref = $request->ref;
        if($ref == "front")
        {
        return redirect('register')->with('success', 'Data has been added');

        }

        return redirect('admin/customer/create')->with('success', 'Data has been added successfully');
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
        $data = Customer::find($id);
        // dd($data);
        return view('customer.show', ['data'=> $data]);
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
        $roomtype = RoomType::all();
        $data = Customer::find($id);
        return view('customer.edit', ['data'=> $data, 'roomtype'=> $roomtype]);
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
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'mobile' => 'required',
        ]);
        $cutomer = Customer::find($id);
        $cutomer->full_name = $request->input('full_name');
        $cutomer->email = $request->input('email');
        $cutomer->password = $request->input('password');
        $cutomer->mobile = $request->input('mobile');
        $cutomer->address = $request->input('address');

        if($request->hasFile('photo'))
        {
            //store and storeAs methods will store the image in storage/app/public/myfolder
            // $imgPath = $request->file('photo')->store('public/imgs');

            $img = $request->file('photo')->getClientOriginalExtension();
            $imagename = time().'.'.$img;
            //move method move the image to public/myfolder
            $request->file('photo')->move('img',$imagename);
            $cutomer->photo = $imagename;
            $cutomer->save();

        }
        else{
            // $imgPath = $request->file('prev_photo');
            $imagename = $request->prev_photo;
        }

        $cutomer->photo = $imagename;
        $cutomer->save();

        return redirect('admin/customer/'.$id. '/edit')->with('success', 'Data has been updated successfully');
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
        Customer::where('id', $id)->delete();
        return redirect('admin/customer')->with('success', 'Data has been deleted successfully');
    }
    //login
    public function login()
    {
       return view(('frontlogin'));
    }
    //check login
    public function customer_login(Request $request)
    {
       $email = $request->email;
       $pwd = sha1($request->password);

        $detail = Customer::where(['email'=> $email, 'password'=> $pwd])->count();
        if($detail > 0){
        $detail = Customer::where(['email'=> $email, 'password'=> $pwd])->get();
            session(['customerlogin' => true,  'data' => $detail]);
            return redirect('/');
        }
        else{
            return redirect('login')->with('error', 'Invalid email or password!!');
        }
    }
    //login
    public function register()
    {
        return view(('register'));

    }

    //logout
    public function logout()
    {
        session()->forget('customerlogin', 'data');
        return redirect('login');

    }
}
