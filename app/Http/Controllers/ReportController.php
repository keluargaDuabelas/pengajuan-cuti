<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function filter(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $data = Pengajuan::whereBetween('created_at', [$startDate, $endDate])->get();

        return view('report.index', compact('data'));
    }

    public function export(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        return Excel::download(new DataExport($startDate, $endDate), 'report data pengajuan.xlsx');
    }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
