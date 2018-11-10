<?php

namespace App\Http\Controllers;

use App\Kegiatan;

class HomeController extends Controller
{
    public function index()
    {
        if (session('roleid') == 11 || session('roleid') == 10 || session('roleid') == 12) {
            return redirect('dashboard');
        }

        $kegiatanApproved = (new Kegiatan())->approved();
        // dd($kegiatanApproved);

        return view('home', compact('kegiatanApproved'));
    }
}
