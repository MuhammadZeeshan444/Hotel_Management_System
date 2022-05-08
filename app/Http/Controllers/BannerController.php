<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Banner::all();
        return view('banner.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('banner.create');

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
            'banner_src' => 'required|image',
            'alt_text' => 'required',
            'publish_status' => 'required'
        ]);
        $banner = new Banner();
        $banner->alt_text = $request->alt_text;
        $banner->publish_status = $request->publish_status;

        $image = $request->file('banner_src')->getClientOriginalExtension();
        $imagename = time().'.'.$image;
        $request->file('banner_src')->move('img',$imagename);

        // $imgPath = $request->file('photo')->store('public/imgs');
        $banner->banner_src = $imagename;
        $banner->save();

        return redirect('admin/banner/create')->with('success', 'Banner has been added successfully');
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
        $data = Banner::find($id);
        // dd($data);
        return view('banner.show', ['data'=> $data]);
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
        $data = Banner::find($id);
        return view('banner.edit', ['data'=> $data]);
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
            'prev_photo' => 'required',
            'alt_text' => 'required',
        ]);
        $banner = Banner::find($id);
        $banner->alt_text = $request->alt_text;
        $banner->publish_status = $request->publish_status;

        if($request->hasFile('banner_src'))
        {
            //store and storeAs methods will store the image in storage/app/public/myfolder
            // $imgPath = $request->file('photo')->store('public/imgs');

            $img = $request->file('banner_src')->getClientOriginalExtension();
            $imagename = time().'.'.$img;
            //move method move the image to public/myfolder
            $request->file('banner_src')->move('img',$imagename);
            $banner->banner_src = $imagename;
        }
        else{
            // $imgPath = $request->file('prev_photo');
            $imagename = $request->prev_photo;
        }

        $banner->save();

        return redirect('admin/banner/'.$id. '/edit')->with('success', 'Banner has been updated successfully');
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
        Banner::where('id', $id)->delete();
        return redirect('admin/banner')->with('success', 'Banner has been deleted successfully');
    }

}
