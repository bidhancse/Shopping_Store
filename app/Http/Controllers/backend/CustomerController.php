<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use DB;
Use Image;
Use Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function customermessage()
    {
        $CustomerMessage = DB::table('customermessage')->get();
        return view ('admin.customer.customermessage', compact('CustomerMessage'));
    }
}
