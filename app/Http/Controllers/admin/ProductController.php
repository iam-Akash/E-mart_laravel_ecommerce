<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
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

        $this->validate($request,[
            "title"=> "required|min:2|max:100",
            "summary"=> "required",
            "description"=> "nullable",
            "price"=> "numeric|required",
            "discount"=> "nullable",
            "stock"=> "required",
            "size"=> "nullable",
            "brand_id"=> "nullable|exists:brands,id",
            "parent_category_id"=> "required|exists:categories,id",
            "child_category_id"=> "nullable|exists:categories,id",
            "status"=> "required|in:active,inactive",
            "condition"=> "required|in:new,sale,popular,winter",
            "photo"=> "required",
            "vendor_id"=>'nullable|exists:users,id'
        ]);
        $data=$request->all();

        $slug=Str::slug($request->input('title'));
        $slug_count=Product::where('slug', $slug)->count();
        if($slug_count > 0) {
            $slug=time() . '-'. $slug;
        }
        $data['slug']=$slug;
        // $data['summary']= strip_tags($request->input['summary']);

        $offer_price=$request->price - ($request->price*$request->discount)/100;
        $data["offer_price"]= $offer_price;

        $status= Product::create($data);
        if($status){
            return redirect()->route('product.index')->with('success', 'Product created successfully');
        }
        else{
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


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        if($product){
            return view('backend.product.edit', ['product'=> $product]);
        }
        else{
            return back()->with('error' , 'product not found');
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



        $product=Product::find($id);
        if($product){
            $this->validate($request,[
                "title"=> "required|min:2|max:100",
                "summary"=> "required",
                "description"=> "nullable",
                "price"=> "numeric|required",
                "discount"=> "nullable",
                "stock"=> "required",
                "size"=> "nullable",
                "brand_id"=> "nullable|exists:brands,id",
                "parent_category_id"=> "required|exists:categories,id",
                "child_category_id"=> "nullable|exists:categories,id",
                "status"=> "required|in:active,inactive",
                "condition"=> "required|in:new,sale,popular,winter",
                "photo"=> "required",
                "vendor_id"=>'nullable|exists:users,id'
            ]);
            $data=$request->all();

            $slug=Str::slug($request->input('title'));
            $slug_count=Product::where('slug', $slug)->count();
            if($slug_count > 0) {
                $slug=time() . '-'. $slug;
            }
            $data['slug']=$slug;
            $offer_price=$request->price - ($request->price*$request->discount)/100;
            $data["offer_price"]= $offer_price;

            $status= $product->fill($data)->save();
            if($status){
                return redirect()->route('product.index')->with('success', 'Product updated successfully');
            }
            else{
                return redirect()->back()->with('error', 'Something went wrong');
            }
            }
        else{
            return redirect()->route('product.index')->with('error', 'Product not found');
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

    public function updatedStatus(Request $request){
        $product_status=Product::where('id',$request->id)->value('status');
        if($product_status){
            return response()->json(['msg'=>'Product found', 'process'=> true, 'data'=> $product_status]);
        }else{
            return response()->json(['msg'=>'product not found', 'process'=> false, 'data'=> '']);
        }
    }
}
