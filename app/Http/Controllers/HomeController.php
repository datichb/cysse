<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function artiste()
    {
        return view('artiste');
    }

    public function mark()
    {
        return view('mark');
    }

    public function contact()
    {
        return view('contact');
    }

    public function email(Request $request)
    {
        return \Mail::to(request('email'))->send(new Contact(request('fullname'), request('email'), request('message')));
    }
}
