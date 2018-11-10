<?php

namespace App\Http\Controllers;

use Auth;

class EventController extends Controller
{
    public function index()
    {
        if (Auth::user()->roleid == 11) {
            $bypass = true;
        } else {
            $bypass = false;
        }

        return view('dashboard.menu.input', ['bypass'=>$bypass]);
    }
}
