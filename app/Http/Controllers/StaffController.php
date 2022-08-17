<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Role;
use App\Models\Deposit;
use App\Models\Position;
use App\Models\Withdrawal;
use App\Rules\MatchOldPassword;
use Image;
use Resize;
use Storage;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    // Staff show
    public function index()
    {
        $query = Position::where('user_name', Auth()->user()->id)->get();
       $response = array(
          "data" => $query,
       );

       return view("staff.index")->with($response);
    }

    public function addDeposit()
    {
       return view("staff.add_deposit");
    }

    public function AllDeposit()
    {
        $query = Deposit::where('user_id', Auth()->user()->id)->get();
       $response = array(
          "data" => $query,
       );
       return view("staff.all_deposit")->with($response);
    }
    // Staff store
    public function storDeposit(Request $request)
    {
        $this->validate($request, [
            "transaction_id" => "string|required|max:30",
            "amount" => "required",
            "deposit_receipt" => "required",
        ]);
        //dd($request->all());

        $res = new Deposit();
        $res->txn_id = $request->transaction_id;
        $res->user_id = Auth()->user()->id;
        $res->amount = $request->amount;
        $res->date_time = date('Y-m-d');

        if (!Storage::disk("public")->has("deposit")) {
            Storage::disk("public")->makeDirectory("deposit");
        }

        if ($request->hasfile("deposit_receipt")) {
            $image = $request->file("deposit_receipt");
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(150, 150);
            $image_resize->save(storage_path("app/public/deposit/" . $filename));
            $res->receipt = "storage/deposit/" . $filename;
        }
        $response = $res->save();

        if ($response) {
            request()
                ->session()
                ->flash("success", "Successfully Deposit !");
        } else {
            request()
                ->session()
                ->flash("error", "Error occurred while adding deposit");
        }
        return redirect()->route("deposit.getdeposit");
    }


    public function addwithdrawal()
    {
       return view("staff.add_withdrawal");
    }

    public function allWithdrawal()
    {
       $query = DB::table("withdrawals")
           ->select('withdrawals.*', 'us.first_name')
           ->leftJoin("users as us", "us.id", "=", "withdrawals.request_by")
           ->where('request_by', Auth()->user()->id)->get();
        $response = array(
          "data" => $query,
       );
       return view("staff.all_withdrawal")->with($response);
    }


    // Staff store
    public function storWithdrawal(Request $request)
    {
        $this->validate($request, [
            "amount" => "required",
            "password" => ['required', new MatchOldPassword],
        ]);
        //dd($request->all());

        $res = new Withdrawal();
        $res->request_id = 'with_'.rand();
        $res->request_by = Auth()->user()->id;
        $res->amount = $request->amount;
        $res->date_time = date('Y-m-d');
        $response = $res->save();

        if ($response) {
            request()
                ->session()
                ->flash("success", "Withdrawal Request Successfully !");
        } else {
            request()
                ->session()
                ->flash("error", "Error occurred while adding deposit");
        }
        return redirect()->route("withdrawal.getwithdrawal");
    }




    // Staff remove

    public function destroy($id)
    {
        $staff = User::find($id);
        if ($staff) {
            $status = $staff->delete();
            if ($status) {
                request()
                    ->session()
                    ->flash("success", "Staff Successfully deleted");
            } else {
                request()
                    ->session()
                    ->flash("error", "Staff can not deleted");
            }
            return redirect()->route("staff.index");
        } else {
            request()
                ->session()
                ->flash("error", "Staff can not found");
            return redirect()->back();
        }
    }

    // edit staff

    public function edit($id)
    {
        $query = Position::where('id', $id)->first();
        return view("staff.edit")->with("position", $query);
    }

}
