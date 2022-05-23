<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::latest()->get();
        return view('backend.product.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
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
    public function productStatus(Request $request) {
        if ($request->mode=='true') {
            DB::table('products')->where('id', $request->id)->update(['status'=> 'active']);
            return response()->json(['msg'=> 'Product activated successfully', 'status'=> 'Activated', 'process'=> true]);
        }

        else {
            DB::table('products')->where('id', $request->id)->update(['status'=> 'inactive']);
            return response()->json(['msg'=> 'Product inactivated successfully', 'status'=> 'Inctivated', 'process'=> true]);
        }
    }

    public function productDelete(Request $request) {
        $product=Product::find($request->id);

        if ($product) {
            $product->delete();
            $product_count=Product::all()->count();
            return response()->json(['msg'=> 'Successfully deleted', 'product_count'=> $product_count, 'process'=> true]);
        }

        else {
            return response()->json(['error'=> 'Something went wrong', 'process'=> false]);
        }
    }

    public function getChildCategory($id){
        $category= Category::find($id);
        if($category){
            $child_category=Category::getChildCategory($id);
            if(count($child_category)>0){
                return response()->json(['msg'=> 'Sub category found' , 'process'=>true, 'data'=>$child_category]);
            }
            else{
                return response()->json(['msg'=> 'Sub category not found' , 'process'=>false, 'data'=>'']);
            }
        }
        else{
            return response()->json(['msg'=> 'Category not found' , 'process'=>false, 'data'=>'']);
        }
    }
}
