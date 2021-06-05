<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagerieController extends Controller
{

    public function create()
    {
         return view('/contact');
    }

    public function store(Request $request)
    {
        dd($req);
         return view('/contact');
    }


}

