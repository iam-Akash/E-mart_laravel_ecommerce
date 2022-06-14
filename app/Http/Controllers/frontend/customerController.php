<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class customerController extends Controller
{
    public function userDashboard(){
        return view('frontend.user.dashboard');
    }
    public function userAddress(){
        return view('frontend.user.address');
    }
    public function userDetails(){
        return view('frontend.user.accountDetails');
    }
    public function userOrder(){
        return view('frontend.user.order');
    }

    public function userAddressAdd(Request $request , $id){
        $this->validate($request, [
            'address'=> 'required|string|max:255',
            'city'=>'required|string|max:255',
            'state'=>'nullable|string|max:255',
            'postcode'=>'required|string|max:255',
            'country'=>'required|string|max:255',
        ]);

        $user= User::where('id', $id)->update([
        'address'=>$request->address, 
        'city'=>$request->city,
        'state'=>$request->state,
        'postcode'=>$request->postcode,
        'country'=>$request->country,
        ]);

        if($user){
        return redirect()->back()->with('success', 'Address added successfully');
        }
        else{
            return redirect()->back()->with('error', 'something went wrong');
        }
       
    }
    public function userShippingAddressAdd(Request $request , $id){
        $this->validate($request, [
            'ship_address'=> 'required|string|max:255',
            'ship_city'=>'required|string|max:255',
            'ship_state'=>'nullable|string|max:255',
            'ship_postcode'=>'required|string|max:255',
            'ship_country'=>'required|string|max:255',
        ]);
        $user= User::where('id', $id)->update([
            'ship_address'=>$request->ship_address, 
            'ship_city'=>$request->ship_city,
            'ship_state'=>$request->ship_state,
            'ship_postcode'=>$request->ship_postcode,
            'ship_country'=>$request->ship_country,
           
        ]);
        if($user){
        return redirect()->back()->with('success', 'Shipping address added successfully');
        }
        else{
            return redirect()->back()->with('error', 'something went wrong');
        }
    }

    public function userAccountUpdate(Request $request , $id){
            if($request->old_password == null && $request->new_password ==null && $request->new_password_confirm==null){
                $this->validate($request, [
                    'full_name'=> 'required|max:255|string',
                    'username'=> 'required|max:255|string|unique:users,username,'.$id,
                    'phone'=> 'required|numeric',
                ]);

                $user= User::where('id', $id)->update([
                    'full_name'=>$request->full_name,
                    'username'=>$request->username,
                    'phone'=>$request->phone,
                ]);

                if($user){
                     return redirect()->back()->with('success', 'Account details updated successfully');
                }
                else{
                     return redirect()->back()->with('error', 'something went wrong');
                }
                }
            else{
                 $this->validate($request, [
                    'full_name'=> 'required|max:255|string',
                    'username'=> 'required|max:255|string|unique:users,username,'.$id,
                    'phone'=> 'required|numeric',
                    'old_password' => 'required',
                    'new_password' => 'required|min:4|max:255',
                    'new_password_confirm' => 'required|same:new_password',

                ]);

                $user_password= Auth::user()->password;
                
                if(Hash::check($request->old_password, $user_password)){
                    if(!Hash::check($request->new_password, $user_password )){
                         $user= User::where('id', $id)->update([
                        'full_name'=>$request->full_name,
                        'username'=>$request->username,
                        'phone'=>$request->phone,
                        'password'=> Hash::make($request->new_password),
                ]);

                if($user){
                     return redirect()->back()->with('success', 'Account details updated successfully');
                }
                else{
                     return redirect()->back()->with('error', 'something went wrong');
                }
                    }else{
                    return redirect()->back()->with('error', "Naw password cannot be same as old password");
                    }
                }
                else{
                    return redirect()->back()->with('error', "Current password didn't match");
                }
            }
    }
}
