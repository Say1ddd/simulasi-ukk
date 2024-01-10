<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangMasuk = BarangMasuk::all();

        return view('barangmasuk.index', compact('barangMasuk'));
        return DB::table('barang_masuk')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('barangmasuk.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_masuk' => 'required',
            'qty_masuk' => 'required',
            'barang_id' => 'required',
        ]);

        BarangMasuk::create($request->all());

        return redirect()->route('barangmasuk.index')
            ->with('success', 'Barang Masuk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $barangMasuk)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        return view('barangmasuk.show', compact('barangMasuk', 'barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        $barangs = Barang::all();
        return view('barangmasuk.edit', compact('barangMasuk', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $this->validate($request, [
            'tgl_masuk' => 'required',
            'qty_masuk' => 'required',
            'barang_id' => 'required',
        ]);

        $barangMasuk->update($request->all());

        return redirect()->route('barangmasuk.index')
            ->with('success', 'Barang Masuk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        $barangMasuk->delete();
        return redirect()->route('barangmasuk.index')
            ->with('success', 'Barang Masuk Berhasil Dihapus');
    }
}
