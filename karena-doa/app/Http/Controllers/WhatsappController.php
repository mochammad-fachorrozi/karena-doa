<?php

namespace App\Http\Controllers;

use App\Models\Whatsapp;
use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data No. Whatsapp';
        $whatsapps = Whatsapp::all();

        return view('backend.whatsapps.index', [
            'title' => $title,
            'whatsapps' => $whatsapps,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah No. Whatsapp';

        return view('backend.whatsapps.create', [
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'phone'   => 'required',
            // 'status'  => 'required',
        ]);

        Whatsapp::create([
            'phone' => $request->phone,
            'status' => 'optional',
        ]);

        //redirect to index
        return redirect('/whatsapps')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Whatsapp $whatsapp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Whatsapp $whatsapp)
    {
        $title = 'Edit No. Whatsapp';
        $whatsapp = Whatsapp::findOrFail($whatsapp->id);

        return view('backend.whatsapps.edit', [
            'title' => $title,
            'whatsapp' => $whatsapp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Whatsapp $whatsapp)
    {
        $rules = [
            'phone'  => 'required',
            // 'status'  => 'required',
        ];

        // dd($request->name);
        $validatedData = $request->validate($rules);

        Whatsapp::where('id', $whatsapp->id)
            ->update($validatedData);

        return redirect('/whatsapps')->with(['success' => 'Data Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Whatsapp $whatsapp)
    {
        Whatsapp::destroy($whatsapp->id);

        return redirect('/whatsapps')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
