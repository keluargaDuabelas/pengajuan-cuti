<?php

namespace App\Http\Controllers;

use App\Models\JenisCuti;
use App\Models\Pengajuan;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $pengajuan = Pengajuan::count();
        $jeniscuti = JenisCuti::count();
        $user = User::count();

        return view('home', compact('pengajuan','jeniscuti','user'));

    }
}
