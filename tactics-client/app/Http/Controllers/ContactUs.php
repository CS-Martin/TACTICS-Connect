<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUs extends Controller
{
    public function index()
    {
        return view('contact-us');
    } 
}
