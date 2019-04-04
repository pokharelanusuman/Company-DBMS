<?php

namespace App\Http\Controllers;

use App\roles;
use Illuminate\Http\Request;

class BPagesController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:web');
    }

    public function dashboard()
    {
        return view('home');
    }

    public function roles()
    {
        return view('roles');
    }
    public function createrole($id = null)
    {
        if(!$id)
        {
            return view('addroles');
        }else{
            // dd($id);
            $role = roles::findOrFail($id);
            return view('addroles', compact('role'));
        }
        
    }
    // public function updateRole($id)
    // {
    //     $role = roles::findOrFail($id);
    //     if($role)
    //     {
    //         return view('addroles')->withRole('role');
    //     }
    // }
}
