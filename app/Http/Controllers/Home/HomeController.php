<?php

namespace SAI\Http\Controllers\Home;

use Illuminate\Http\Request;
use SAI\Http\Controllers\Controller;

class HomeController extends Controller
{
    	public function index()
	{
		return view('home');
	}
}
