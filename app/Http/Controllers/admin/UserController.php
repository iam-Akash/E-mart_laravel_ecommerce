<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::latest()->get();
        return view('backend.user.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name'=>'string|required|min:2|max:50',
            'username'=>'string|required|unique:users,username',
            'password'=>'required|min:6|confirmed',
            'email'=>'required|email|unique:users,email',
            'phone'=>'nullable|numeric',
            'address'=>'string|nullable',
            'role'=>'required|in:vendor,customer,admin',
            'status'=>'required|in:active,inactive',
            'photo'=>'required',
        ]);

        $data= $request->all();

        $data['password']= Hash::make($request->password);
        $status=User::create($data);
        if($status){
            return redirect()->route('user.index')->with('success', 'User successfully created.');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong.');
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
        $user=User::find($id);
        if($user){
            return view('backend.user.edit', ['user'=>$user]);
        }
        else{
            return back()->with('error', 'User does not found.');
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
        $user=User::find($id);
        if($user){
            $this->validate($request, [
                'full_name'=>'string|required|min:2|max:50',
                'username'=>'string|required|unique:users,username,'.$id,
                'password'=>'required|min:6|confirmed',
                'email'=>'required|email|unique:users,email,'.$id,
                'phone'=>'nullable|numeric',
                'address'=>'string|nullable',
                'role'=>'required|in:vendor,customer,admin',
                'status'=>'required|in:active,inactive',
                'photo'=>'required',
            ]);

            $data= $request->all();

            $data['password']= Hash::make($request->password);
            $status=$user->fill($data)->save();
            if($status){
                return redirect()->route('user.index')->with('success', 'User successfully updated.');
            }
            else{
                return redirect()->back()->with('error', 'Something went wrong.');
            }
        }
        else{
            return redirect()->route('user.index')->with('error', 'User does not found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userStatus(Request $request) {
        if ($request->mode=='true') {
            DB::table('users')->where('id', $request->id)->update(['status'=> 'active']);
            return response()->json(['msg'=> 'User activated successfully', 'status'=> 'Activated', 'process'=> true]);
        }

        else {
            DB::table('users')->where('id', $request->id)->update(['status'=> 'inactive']);
            return response()->json(['msg'=> 'User inactivated successfully', 'status'=> 'Inctivated', 'process'=> true]);
        }
    }

    public function userDelete(Request $request) {
        $user=User::find($request->id);

        if ($user) {
            $user->delete();
            $user_count=User::all()->count();
            return response()->json(['msg'=> 'Successfully deleted', 'user_count'=> $user_count, 'process'=> true]);
        }

        else {
            return response()->json(['error'=> 'Something went wrong', 'process'=> false]);
        }
    }
    public function updatedStatus(Request $request){
        $user_status=User::where('id',$request->id)->value('status');
        if($user_status){
            return response()->json(['msg'=>'user found', 'process'=> true, 'data'=> $user_status]);
        }else{
            return response()->json(['msg'=>'user not found', 'process'=> false, 'data'=> '']);
        }
    }
}
