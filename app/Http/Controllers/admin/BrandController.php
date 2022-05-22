<?php

namespace App\Http\Controllers\admin;


use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::latest()->get();
        return view('backend.brand.index', ['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required|max:255',
            'status'=> 'in:active,inactive',

        ]);

        $slug=Str::slug($request->input('title'));
        $slug_count=Brand::where('slug', $slug)->count();

        if ($slug_count > 0) {
            $slug=time() . '-'. $slug;
        }
        
        $brand= new Brand;
        $brand->title=$request->title;
        $brand->slug=$slug;
        $brand->status=$request->status;

        $data= $brand->save();

        if ($data==1) {
            return redirect()->back()->with('success', 'Brand added successfully.');
        }

        else {
            return redirect()->back()->with('error', 'Something went wrong');
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
        $brand=Brand::find($id);
        if($brand){
            return view('backend.brand.edit', ['brand'=>$brand]);
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
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
        $this->validate($request,[
            'title'=> 'required|max:255|min:2',
            'status'=> 'in:active,inactive',

        ]);

        $slug=Str::slug($request->input('title'));
        $slug_count=Brand::where('slug', $slug)->count();

        if ($slug_count > 0) {
            $slug=time() . '-'. $slug;
        }
        
        $brand=Brand::find($id);
        if($brand){
            $brand->title=$request->title;
            $brand->slug=$slug;
            $brand->photo=$request->photo;
            $data=$brand->save();
            if($data){
                return redirect()->route('brand.index')->with('success', 'Brand successfully updated');
            }
            else{
                return redirect()->route('brand.index')->with('error', 'Something went wrong');
            }
           


        }
        else{
            return redirect()->route('brand.index')->with('error', 'Something went wrong');
        }
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

    public function brandStatus(Request $request) {
        if ($request->mode=='true') {
            DB::table('brands')->where('id', $request->id)->update(['status'=> 'active']);
            return response()->json(['msg'=> 'Brand activated successfully', 'status'=> 'Activated', 'process'=> true]);
        }

        else {
            DB::table('brands')->where('id', $request->id)->update(['status'=> 'inactive']);
            return response()->json(['msg'=> 'Brand inactivated successfully', 'status'=> 'Inctivated', 'process'=> true]);
        }
    }

    public function brandDelete(Request $request) {
        $brand=Brand::find($request->id);

        if ($brand) {
            $brand->delete();
            $brand_count=Brand::all()->count();
            return response()->json(['msg'=> 'Successfully deleted', 'brand_count'=> $brand_count, 'process'=> true]);
        }

        else {
            return response()->json(['error'=> 'Something went wrong', 'process'=> false]);
        }
    }
}
