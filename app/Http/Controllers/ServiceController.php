<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Service::all();
        return view('service.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('service.create');
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
        $request->validate([
            'title' => 'required',
            'small_desc' => 'required',
            'detail_desc' => 'required',
            'photo' => 'required',
        ]);
        $service = new Service();
        $service->title = $request->input('title');
        $service->small_desc = $request->input('small_desc');
        $service->detail_desc = $request->input('detail_desc');

        $image = $request->file('photo')->getClientOriginalExtension();
        $imagename = time().'.'.$image;
        $request->file('photo')->move('img',$imagename);

        // $imgPath = $request->file('photo')->store('public/imgs');
        $service->photo = $imagename;
        $service->save();

          return redirect('admin/service/create')->with('success', 'Data has been added successfully');

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
        $data = Service::find($id);
        // dd($data);
        return view('service.show', ['data'=> $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Service::find($id);
        return view('service.edit', ['data'=> $data]);
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
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'small_desc' => 'required',
            'detail_desc' => 'required',
            'photo' => 'required',
        ]);
        $service = Service::find($id);
        $service->title = $request->input('title');
        $service->small_desc = $request->input('small_desc');
        $service->detail_desc = $request->input('detail_desc');

        $image = $request->file('photo')->getClientOriginalExtension();
        $imagename = time().'.'.$image;
        $request->file('photo')->move('img',$imagename);

        // $imgPath = $request->file('photo')->store('public/imgs');
        $service->photo = $imagename;
        $service->save();

          return redirect('admin/service/create')->with('success', 'Data has been updated successfully');

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
        Service::where('id', $id)->delete();
        return redirect('admin/service')->with('success', 'Service has been deleted successfully');

    }
}
