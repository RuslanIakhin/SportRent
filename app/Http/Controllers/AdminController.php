<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function control_panel() 
    {
        return view('admin.control_panel');
    }

    public function ads() 
    {
        return view('admin.ads');
    }

    public function lease_transaction() 
    {
        return view('admin.lease_transaction');
    }

    public function controversial_situations() 
    {
        return view('admin.controversial_situations');
    }
}
