<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\View\View;
use App\Models\Application;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function index(Request $request)
    {
        $admins = User::where('role','admin')->get();
        return view('system.dashboard', ['admins'=>$admins]);
    }
    function showSearchForm(Request $request): View
    {
        return view('system.dashboard');
    }
    function search(Request $request)
    {
        $user = User::where('email',$request->email)->where('role','!=','sys')->first();
        return view('system.dashboard',['user'=>$user]);
    }
    function toggleAdmin(Request $request) {
        $user = User::find($request->id);
        $user->role = $user->role == 'admin'?'user':'admin';
        $user->save();
        return redirect("/system/dashboard");
    }
    function toggleSusspend(Request $request) {
        $user = User::find($request->id);
        if($request->action == 'susspend'){
            $user->susspended = 1;
        }elseif( $request->action == 'unsusspend'){
            $user->susspended = 0;
        }
        $user->save();
        return redirect('/system/dashboard');
    }

    function report(Request $request) {
        $applied = Application::all();
        $approved = Application::where('status','approved')->get();
        $rejected = Application::where('status','rejected')->get();
        $pending = Application::where('status','pending')->get();
        return view('system.dashboard',['users'=>User::where('role','user')->get(),'applied'=>count($applied),'approved'=>count($approved),'rejected'=>count($rejected),'pending'=>count($pending)]);
    }

}
