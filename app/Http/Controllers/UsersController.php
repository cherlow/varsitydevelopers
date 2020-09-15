<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.myaccount');
    }

    public function trial()
    {
      
        // return auth()->user()->balance;
        // auth()->user()->depositFloat(200);
        // return auth()->user()->balanceFloat;
        // auth()->user()->forceWithdraw(759);
        // return auth()->user()->deposit(200);
        return auth()->user()->transactions;


        // $user= User::find(2);
        // auth()->user()->transfer($user,200);

        // return $user->transactions;



        // dump(auth()->user()->balance);
        // auth()->user()->transfer($user,200);
        


  


        // dump(auth()->user()->balance);

        $task=Task::first();
        // auth()->user()->pay($task);

        $user= User::find(2);
        $task->transfer($user,10,['description' => 'payment from '.$task->user->name.' for '.$task->title.' project id #'.$task->id.'']);

        return $user->transactions;




        //     if(auth()->user()->safePay($task)){
        //         return auth()->user()->balance; 
        //     }
        //   return "insufficient funds";

    }
}
