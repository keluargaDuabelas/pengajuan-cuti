<?php

namespace App\Http\Controllers;

use App\Models\JenisCuti;
use App\Http\Requests\StoreJenisCutiRequest;
use App\Http\Requests\UpdateJenisCutiRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class JenisCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-jenis-cuti|edit-jenis-cuti|delete-jenis-cuti', ['only' => ['index','show']]);
       $this->middleware('permission:create-jenis-cuti', ['only' => ['create','store']]);
       $this->middleware('permission:edit-jenis-cuti', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-jenis-cuti', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('jenis-cutis.index', [
            'jenis_cuti' => JenisCuti::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jenis-cutis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisCutiRequest $request): RedirectResponse
    {
        JenisCuti::create($request->all());
        return redirect()->route('jenis-cuti.index')
                ->withSuccess('New jenis-cuti is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisCuti $jenis_cuti): View
    {
        return view('jenis-cutis.show', [
            'jenis_cuti' => $jenis_cuti
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisCuti $jenis_cuti): View
    {
        return view('jenis-cutis.edit', [
            'jenis_cuti' => $jenis_cuti
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisCutiRequest $request, JenisCuti $jenis_cuti): RedirectResponse
    {
        $jenis_cuti->update($request->all());
        return redirect()->route('jenis-cuti.index')
        ->withSuccess('jenis-cuti is Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisCuti $jenis_cuti): RedirectResponse
    {
        $jenis_cuti->delete();
        return redirect()->route('jenis-cuti.index')
                ->withSuccess('jenis-cuti is deleted successfully.');
    }
}
