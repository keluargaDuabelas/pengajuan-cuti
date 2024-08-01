<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\JenisCuti;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-pengajuan|edit-pengajuan|delete-pengajuan', ['only' => ['index','show']]);
       $this->middleware('permission:create-pengajuan', ['only' => ['create','store']]);
       $this->middleware('permission:edit-pengajuan', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-pengajuan', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $pengajuan = Pengajuan::where('user_id', Auth::id())->get();
        return view('pengajuan.index', compact('pengajuan'));
    }

    public function create()
    {
        $jenis_cuti = JenisCuti::all();
        return view('pengajuan.create', compact('jenis_cuti'));
    }

    public function store(StorePengajuanRequest $request)
    {
        $lastLeaveSubmission = Pengajuan::where('user_id', Auth::id())
            ->where('created_at', '>=', Carbon::now()->subYear())
            ->first();

        if ($lastLeaveSubmission) {
            return redirect()->back()->withErrors(['error' => 'Anda hanya dapat mengajukan cuti sekali dalam setahun.']);
        }

        Pengajuan::create([
            'user_id' => Auth::id(),
            'jenis_cuti_id' => $request->jenis_cuti_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan cuti berhasil.');
    }

    public function show(Pengajuan $pengajuan)
    {
        return view('pengajuan.show', compact('pengajuan'));
    }

    public function edit(Pengajuan $pengajuan)
    {
        $jenis_cuti = JenisCuti::all();
        return view('pengajuan.edit', compact('pengajuan', 'jenis_cuti'));
    }

    public function update(UpdatePengajuanRequest $request, Pengajuan $pengajuan)
    {
        $pengajuan->update($request->all());

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan cuti berhasil diperbarui.');
    }

    public function destroy(Pengajuan $pengajuan)
    {
        $pengajuan->delete();
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan cuti berhasil dihapus.');
    }

}
