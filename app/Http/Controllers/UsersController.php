<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.myaccount');
    }

    public function trial(){
        // return auth()->user()->balance;
        // auth()->user()->deposit(200);
        // return auth()->user()->balance;
        // auth()->user()->forceWithdraw(300);
        // return auth()->user()->deposit(200);
return auth()->user()->transactions;
    //     $task=Task::first();
    //     if(auth()->user()->safePay($task)){
    //         return auth()->user()->balance; 
    //     }
    //   return "insufficient funds";
     
    }
}
