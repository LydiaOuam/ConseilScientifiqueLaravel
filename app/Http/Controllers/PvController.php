<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Decision;
use PDF;
class PvController extends Controller
{
    public function decision()
    {
        $dec = Decision::all();
        return view('decision',compact('dec'));
    }

    public function downdecision()
    {
        $dec = Decision::all();
        $pdf = PDF::loadView('decision',compact('dec'));
        return $pdf->download('decision.pdf');
    }
}
