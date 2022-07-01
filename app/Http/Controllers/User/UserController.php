<?php

namespace App\Http\Controllers\User;

use App\LogActivity;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return redirect('/');
    }
}
