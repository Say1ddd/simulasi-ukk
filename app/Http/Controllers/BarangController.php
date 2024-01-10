<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Barang = Barang::all();
        return view('barang.index', compact('Barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Kategori = Kategori::all();
        return view('barang.create', compact('Kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'merk' => 'required',
                'seri' => 'required',
                'spesifikasi' => 'required',
                'stok' => 'required',
                'kategori_id' => 'required',
            ]);

            $requestData = $request->all();
            $requestData['stok'] = $request->input('stok', 0);

            Barang::create($requestData);

            return redirect()->route('barang.index')
                ->with(['success', 'Barang berhasil ditambahkan.']);
        } catch (QueryException $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $Kategori = Kategori::all();
        return view('barang.edit', compact('barang', 'Kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $this->validate($request, [
            'merk' => 'required',
            'seri' => 'required',
            'spesifikasi' => 'required',
            'stok' => 'required',
            'kategori_id' => 'required',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')
            ->with(['success', 'Barang berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        if (DB::table('barang_masuk')->where('barang_id', $barang->id)->exists() || DB::table('barang_keluar')->where('barang_id', $barang->id)->exists()) {
            return redirect()->route('barang.index')
                ->with(['error', 'Barang tidak bisa dihapus karena sudah pernah ada transaksi.']);
        } else {
            $Barang = Barang::findOrFail($barang->id);
            $Barang->delete();
            return redirect()->route('barang.index')
                ->with(['success', 'Barang berhasil dihapus.']);
        }
    }
}
