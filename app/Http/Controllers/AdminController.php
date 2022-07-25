<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rules\MatchOldPassword;
use Hash;
use Carbon\Carbon;
use Image;
use Resize;
use Storage;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    
    public function profile(){
        $profile=Auth()->user();
        // return $profile;
        return view('layouts.profile')->with('profile',$profile);
    }

    public function profileUpdate(Request $request,$id){

        $res = User::find($request->id);
        if ($request->mode == 'bank_details') {
            $res->bank_name =  $request->input('bank_name');
            $res->account_number  =  $request->input('account_number');
            $res->ifsc_code  =  $request->input('ifsc_code');

        } else {
            $res->first_name =  $request->input('first_name');
            $res->last_name  =  $request->input('last_name');

            if(!Storage::disk('public')->has('profile')){
               Storage::disk('public')->makeDirectory('profile');
            }
           
            if($request->hasfile('image')){
               $image       = $request->file('image');
               $filename    = $image->getClientOriginalName();
               $image_resize = Image::make($image->getRealPath());              
               $image_resize->resize(150, 150);
               $image_resize->save(storage_path('app/public/profile/'.$filename));
               $res->image = 'storage/profile/'.$filename;
            }
        }
           
       $status = $res->save();

        if($status){
            if ($request->mode == 'bank_details ') {
                request()->session()->flash('success','Successfully updated your Account Detail');
            } else {
                request()->session()->flash('success','Successfully updated your profile');
            }
            
        } else{
            request()->session()->flash('error','Please try again!');
        }
        return redirect()->back();
    }


    public function changePassword(){
        return view('layouts.changePassword');
    }

     public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect()->route('dashboard')->with('success','Password successfully changed');
    }


    public function settings(){
        $profile_id=Auth()->user()->id;
        $data = User::where("id", $profile_id)->first();
        return view('layouts.setting')->with('data',$data);
    }

    public function settingsUpdate(Request $request){
        // return $request->all();
        $this->validate($request,[
            'address'=>'required|string',
            'phone'=>'required|string',
        ]);

        $profile_id=Auth()->user()->id;
        $status = User::where("id", $profile_id)->update([
                'address' => $request->input('address'),
                'phone'  => $request->input('phone')
            ]);
        if($status){
            request()->session()->flash('success','Setting successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again');
        }
        return redirect()->route('dashboard');
    }
}
