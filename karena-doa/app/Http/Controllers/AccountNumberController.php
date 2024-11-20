<?php

namespace App\Http\Controllers;

use App\Models\AccountNumber;
use Illuminate\Http\Request;

class AccountNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data No. Rekening';
        $accountNumbers = AccountNumber::all();

        return view('backend.account-numbers.index', [
            'title' => $title,
            'accountNumbers' => $accountNumbers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah No. Rekening';

        return view('backend.account-numbers.create', [
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bank_name'   => 'required',
            'bank_account'   => 'required',
            'name'   => 'required',
        ]);

        AccountNumber::create($validatedData);

        //redirect to index
        return redirect('/account-numbers')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(AccountNumber $accountNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccountNumber $accountNumber)
    {
        $title = 'Edit No. Rekening';
        $accountNumber = AccountNumber::findOrFail($accountNumber->id);

        return view('backend.account-numbers.edit', [
            'title' => $title,
            'accountNumber' => $accountNumber,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccountNumber $accountNumber)
    {
        $rules = [
            'bank_name'  => 'required',
            'bank_account'  => 'required',
            'name'  => 'required',
        ];

        // dd($request->name);
        $validatedData = $request->validate($rules);

        AccountNumber::where('id', $accountNumber->id)
            ->update($validatedData);

        return redirect('/account-numbers')->with(['success' => 'Data Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountNumber $accountNumber)
    {
        AccountNumber::destroy($accountNumber->id);

        return redirect('/account-numbers')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
