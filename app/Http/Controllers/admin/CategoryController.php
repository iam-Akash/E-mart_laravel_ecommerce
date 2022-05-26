<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::latest()->get();
        return view('backend.category.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {   $parent_categories=Category::where('is_parent', 1)->orderBy('title', 'ASC')->get();
        return view('backend.category.create', ['parent_categories'=>$parent_categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->is_parent== ''){
            $request->is_parent=0;
            if($request->parent_id==""){
                return redirect()->back()->with('error', 'Parent category cannot be empty');
            }
        }
        $this->validate($request, [
            'title'=>'string|required',
            'summary'=>'string|nullable',
            'is_parent'=>'sometimes|in:1',
            'parent_id'=>'nullable',
            'status'=>'nullable|in:active,inactive,'
        ]);

        $slug=Str::slug($request->input('title'));
        $slug_count=Category::where('slug', $slug)->count();

        if ($slug_count > 0) {
            $slug=time() . '-'. $slug;
        }

        $category=new Category();
        $category->title=$request->title;
        $category->slug=$slug;
        $category->summary=$request->summary;
        $category->photo=$request->photo;
        $category->status=$request->status;
        $category->is_parent=$request->is_parent;
        $category->parent_id=$request->parent_id;
        $data=$category->save();

        
        if ($data==1) {
            return redirect()->back()->with('success', 'Category created successfully');
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
        $category=Category::find($id);
        $parent_categories=Category::where('is_parent', 1)->orderBy('title', 'ASC')->get();

        return view('backend.category.edit', ['category'=>$category, 'parent_categories'=>$parent_categories]);
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
        
        if($request->is_parent==""){
            $request->is_parent=0;
            if($request->parent_id==""){
                return redirect()->back()->with('error', 'Parent category cannot be empty');
            }
        }
        $this->validate($request, [
            'title'=>'string|required',
            'summary'=>'string|nullable',
            'is_parent'=>'sometimes|in:1',
            'parent_id'=>'nullable',
            'status'=>'nullable|in:active,inactive,'
        ]);

        $slug=Str::slug($request->input('title'));
        $slug_count=Category::where('slug', $slug)->count();

        if ($slug_count > 0) {
            $slug=time() . '-'. $slug;
        }
        $category= Category::find($id);
        if($category){
            $category->title=$request->title;
            $category->slug=$slug;
            $category->summary=$request->summary;
            $category->photo=$request->photo;
            $category->status=$request->status;
            $category->is_parent=$request->is_parent;
            $category->parent_id=$request->parent_id;
            $data=$category->save();
        }

        

        
        if ($data==1) {
            return redirect()->route('category.index')->with('success', 'Category updated successfully');
        }

        else {
            return redirect()->route('category.index')->with('error', 'Something went wrong');
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

    public function categoryStatus(Request $request){
        if ($request->mode=='true') {
            DB::table('categories')->where('id', $request->id)->update(['status'=> 'active']);
            return response()->json(['msg'=> 'Category activated successfully', 'status'=> 'Activated', 'process'=> true]);
        }

        else {
            DB::table('categories')->where('id', $request->id)->update(['status'=> 'inactive']);
            return response()->json(['msg'=> 'Category inactivated successfully', 'status'=> 'Inctivated', 'process'=> true]);
        }
    }

    public function categoryDelete(Request $request){
        
        $category=Category::find($request->id);
        $child_categories= Category::where('parent_id', $request->id)->pluck('id');
        
        if ($category) {
            
            if(count($child_categories)>0){
                
              Category::shiftChild($child_categories);
            }
    
            $category->delete();
            $category_count=Category::all()->count();
            return response()->json(['msg'=> 'Successfully deleted', 'category_count'=> $category_count, 'process'=> true]);
        }

        else {
            return response()->json(['error'=> 'Something went wrong', 'process'=> false]);
        }
    }
}
