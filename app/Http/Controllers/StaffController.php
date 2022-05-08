<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Department;
use App\Models\StaffPayment;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Staff::all();
        return view('staff.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $staffDeparts = Department::all();
        return view('staff.create',['staffDeparts'=> $staffDeparts]);

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
        // dd($request->all());
        $staff = new Staff();
        $staff->full_name = $request->input('full_name');
        $staff->departement_id = $request->department_id;


        $image = $request->file('photo')->getClientOriginalExtension();
        $imagename = time().'.'.$image;
        $request->file('photo')->move('img',$imagename);

        // $imgPath = $request->file('photo')->store('public/imgs');
        $staff->photo = $imagename;
        $staff->bio = $request->input('bio');
        $staff->salary_type = $request->input('salary_type');
        $staff->salary_amount = $request->input('salary_amount');
        $staff->save();

        return redirect('admin/staff/create')->with('success', 'Data has been added successfully');
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
        $data = Staff::find($id);
        return view('staff.show', ['data'=> $data]);
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
        $staffDeparts = Department::all();
        // dd($staffDeparts);
        $data = Staff::find($id);
        // dd($data);
        return view('staff.edit', ['data'=> $data, 'staffDeparts'=> $staffDeparts]);
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
        $staff = Staff::find($id);
        $staff->full_name = $request->input('full_name');
        $staff->departement_id = $request->department_id;
        if($request->hasFile('photo'))
        {
            //store and storeAs methods will store the image in storage/app/public/myfolder
            // $imgPath = $request->file('photo')->store('public/imgs');

            $img = $request->file('photo')->getClientOriginalExtension();
            $imagename = time().'.'.$img;
            //move method move the image to public/myfolder
            $request->file('photo')->move('img',$imagename);
            $staff->photo = $imagename;
            $staff->save();

        }
        else{
            // $imgPath = $request->file('prev_photo');
            $imagename = $request->prev_photo;
        }

        $staff->photo = $imagename;
        $staff->save();

        // $imgPath = $request->file('photo')->store('public/imgs');
        $staff->bio = $request->input('bio');
        $staff->photo = $imagename;
        $staff->salary_type = $request->input('salary_type');
        $staff->salary_amount = $request->input('salary_amount');
        $staff->save();
        return redirect('admin/staff/'.$id. '/edit')->with('success', 'Data has been updated successfully');
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
        Staff::where('id', $id)->delete();
        return redirect('admin/staff')->with('success', 'Data has been deleted successfully');
    }

    //all payment to a staff
    public function all_payments(Request $request,$staff_id)
    {
        //
        $data = StaffPayment::where('staff_id',$staff_id)->get();
        // dd($data);
        $staff = Staff::find($staff_id);
        return view('staffpayment.index',['staff_id'=>$staff_id,'data'=>$data,'staff'=>$staff]);
    }

    //add payment to a staff
    public function add_payment($staff_id)
    {
        //
        $data = Staff::find($staff_id);
        return view('staffpayment.create',['staff_id'=>$staff_id,'data'=>$data]);
    }

    //save payment to a staff
    public function save_payment($staff_id, Request $request)
    {
        //

        $staff =new  StaffPayment();
        // dd($staff_id);
        $staff->staff_id = $staff_id;
        $staff->amount = $request->input('amount');
        $staff->payment_date = $request->input('amount_date');
        $staff->save();

        return redirect('admin/staff/payment/'.$staff_id.'/add')->with('success', 'Data has been added successfully');
    }
    //delete payment to a staff
    public function delete_payment($id, $staff_id)
    {
        //
        // dd('hey');
        StaffPayment::where('id', $id)->delete();
        return redirect('admin/staff/payments/'.$staff_id)->with('success', 'Data has been deleted successfully');
    }
}
