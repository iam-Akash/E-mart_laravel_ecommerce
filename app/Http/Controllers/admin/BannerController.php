<?php

namespace App\Http\Controllers\admin;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $banners=Banner::all();
        return view('backend.banner.index', ['banners'=>$banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'nullable',
            'photo'=>'required',
            'status'=>'nullable|in:active,inactive',
            'condition'=>'nullable|in:banner,promote',
        ]);
        
        $slug=Str::slug($request->input('title'));
        $slug_count=Banner::where('slug',$slug)->count();
        if($slug_count>0){
            $slug=time().'-'.$slug;
        }
        $banner= new Banner;
        $banner->title=$request->title;
        $banner->slug=$slug;
        $banner->description=$request->description;
        $banner->photo=$request->photo;
        if(isset($request->status)){
            $banner->status=$request->status;
        }

        if(isset($request->condition)){
            $banner->condition=$request->condition;
        }
        $data= $banner->save();
        if($data == 1){
            return redirect()->route('banner.index')->with('success', 'Banner added successfully.');
        }
        else{
            return redirect()->route('banner.index')->with('error', 'Something went wrong');
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
