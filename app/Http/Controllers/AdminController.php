<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
       // $this->middleware('CheckRole');
      //  $this->middleware('auth');
    }

    public function index()
    {
        echo 'ijij';
    }
}
