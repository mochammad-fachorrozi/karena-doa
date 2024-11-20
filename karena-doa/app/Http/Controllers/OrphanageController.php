<?php

namespace App\Http\Controllers;

use App\Models\Orphanage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrphanageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Panti';
        $orphanages = Orphanage::all();

        return view('backend.orphanages.index', [
            'title' => $title,
            'orphanages' => $orphanages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Data Panti';

        return view('backend.orphanages.create', [
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'about1'    => 'required',
            'about2'    => 'required',
            'image1'    => 'required|image|mimes:png,jpg,jpeg,webp|max:1024',
            'image2'    => 'required|image|mimes:png,jpg,jpeg,webp|max:1024',
            'vision'    => 'required',
            'mission'   => 'required',
            'image3'    => 'required|image|mimes:png,jpg,jpeg,webp|max:10242',
            'qris'      => 'required|image|mimes:png,jpg,jpeg,webp|max:10242',
            'vision'    => 'required',
        ]);

        //upload image
        $image1 = $request->file('image1');
        $image1->storeAs('public/orphanages', $image1->hashName());
        $image2 = $request->file('image2');
        $image2->storeAs('public/orphanages', $image2->hashName());
        $image3 = $request->file('image3');
        $image3->storeAs('public/orphanages', $image3->hashName());
        $qris = $request->file('qris');
        $qris->storeAs('public/orphanages', $qris->hashName());

        Orphanage::create([
            'about1'     => $request->about1,
            'about2'     => $request->about2,
            'image1'     => $image1->hashName(),
            'image2'     => $image2->hashName(),
            'vision'     => $request->vision,
            'mission'     => $request->mission,
            'image3'     => $image3->hashName(),
            'qris'      => $qris->hashName(),
            'youtube'     => $request->youtube,
        ]);

        //redirect to index
        return redirect('/orphanages')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Orphanage $orphanage)
    {
        $title = 'Lihat Data Panti';
        $orphanage = Orphanage::findOrFail($orphanage->id);

        return view('backend.orphanages.edit', [
            'title' => $title,
            'orphanage' => $orphanage,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orphanage $orphanage)
    {
        $title = 'Edit Data Panti';
        $orphanage = Orphanage::findOrFail($orphanage->id);

        return view('backend.orphanages.edit', [
            'title' => $title,
            'orphanage' => $orphanage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orphanage $orphanage)
    {
        $this->validate($request, [
            'about1'    => 'required',
            'about2'    => 'required',
            'image1'    => 'image|mimes:png,jpg,jpeg,webp|max:1024',
            'image2'    => 'image|mimes:png,jpg,jpeg,webp|max:1024',
            'vision'    => 'required',
            'mission'   => 'required',
            'image3'    => 'image|mimes:png,jpg,jpeg,webp|max:1024',
            'qris'      => 'image|mimes:png,jpg,jpeg,webp|max:1024',
            'youtube'    => 'required',
        ]);

        //get data orphanage by ID
        $orphanage = Orphanage::findOrFail($orphanage->id);

        if ($request->file('image1') != "") {
            //hapus old image1
            Storage::disk('local')->delete('public/orphanages/' . $orphanage->image1);

            //upload new image1
            $image1 = $request->file('image1');
            $image1->storeAs('public/orphanages', $image1->hashName());
            $orphanage->update([
                'image1'     => $image1->hashName(),
            ]);
        }
        if ($request->file('image2') != "") {
            //hapus old image2
            Storage::disk('local')->delete('public/orphanages/' . $orphanage->image2);

            //upload new image2
            $image2 = $request->file('image2');
            $image2->storeAs('public/orphanages', $image2->hashName());
            $orphanage->update([
                'image2'     => $image2->hashName(),
            ]);
        }
        if ($request->file('image3') != "") {
            //hapus old image3
            Storage::disk('local')->delete('public/orphanages/' . $orphanage->image3);

            //upload new image3
            $image3 = $request->file('image3');
            $image3->storeAs('public/orphanages', $image3->hashName());
            $orphanage->update([
                'image3'     => $image3->hashName(),
            ]);
        }
        if ($request->file('qris') != "") {
            //hapus old qris
            Storage::disk('local')->delete('public/orphanages/' . $orphanage->qris);

            //upload new qris
            $qris = $request->file('qris');
            $qris->storeAs('public/orphanages', $qris->hashName());
            $orphanage->update([
                'qris'     => $qris->hashName(),
            ]);
        }

        $orphanage->update([
            'about1'     => $request->about1,
            'about2'     => $request->about2,
            'vision'     => $request->vision,
            'mission'     => $request->mission,
            'youtube'     => $request->youtube,
        ]);

        return redirect('/orphanages')->with(['success' => 'Data Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orphanage $orphanage)
    {
        Storage::disk('local')->delete('public/orphanages/' . $orphanage->image1);
        Storage::disk('local')->delete('public/orphanages/' . $orphanage->image2);
        Storage::disk('local')->delete('public/orphanages/' . $orphanage->image2);
        orphanage::destroy($orphanage->id);

        return redirect('/orphanages')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
