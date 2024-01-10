<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangKeluar = BarangKeluar::all();

        return view('barangkeluar.index', compact('barangKeluar'));
        return DB::table('barang_keluar')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('barangkeluar.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_keluar' => 'required',
            'qty_keluar' => 'required',
            'barang_id' => 'required',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($request->qty_keluar > $barang->stok) {
            return back()->with('error', 'Stok tidak cukup!');
        }

        BarangKeluar::create([
            'tgl_keluar' => $request->tgl_keluar,
            'qty_keluar' => $request->qty_keluar,
            'barang_id' => $request->barang_id,
        ]);

        $barang->update([
            'stok' => $barang->stok - $request->qty_keluar,
        ]);

        return redirect()->route('barangkeluar.index')
            ->with('success', 'Barang Keluar Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        return view('barangkeluar.show', compact('barangKeluar', 'barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        $barangs = Barang::all();
        return view('barangkeluar.edit', compact('barangKeluar', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $this->validate($request, [
            'tgl_keluar' => 'required',
            'qty_keluar' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $barang = Barang::findOrFail($request->barang_id);

                    if ($value > $barang->stok) {
                        $fail('Stok tidak cukup!');
                    }
                }
            ],
            'barang_id' => 'required',
        ]);

        $QtyKeluar = $barangKeluar->qty_keluar;

        $barangKeluar->update($request->all());

        $stock = $QtyKeluar - $request->qty_keluar;

        $barang = $barangKeluar->barang;
        $barang->stok += $stock;
        $barang->save();

        return redirect()->route('barangkeluar.index')
            ->with('success', 'Barang Keluar Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        $barangKeluar->delete();
        return redirect()->route('barangkeluar.index')
            ->with('success', 'Barang Keluar Berhasil Dihapus');
    }
}
