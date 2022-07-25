<?php 
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Models\Deposit;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;




    function allWithdrawal(){
        $data = Withdrawal::where('request_by',Auth()->user()->id)->count();
        if($data){
            return $data;
        }
        return 0;
    }

    function allDeposit(){
        $data = Deposit::where('user_id',Auth()->user()->id)->count();
        if($data){
            return $data;
        }
        return 0;
    }

    
?>