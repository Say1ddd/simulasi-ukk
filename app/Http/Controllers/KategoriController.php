<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function count()
    {
        $CountKategori = Kategori::count();
        $CountBarang = Barang::count();
        $CountBarangMasuk = BarangMasuk::count();
        $COuntBarangKeluar = BarangKeluar::count();

        return view('dashboard', compact('CountKategori', 'CountBarang', 'CountBarangMasuk', 'CountBarangKeluar'));
    }

    public function index() {
        $Kategori = Kategori::all();
        return view('kategori.index', compact('Kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = array('blank' => 'Pilih Kategori',
                        'M'=>'Modal',
                        'A'=>'Alat',
                        'BHP'=>'Bahan Habis Pakai',
                        'BTHP'=>'Bahan Tidak Habis Pakai');

        return view('kategori.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
            'kategori' => 'required | in:M,A,BHP,BTHP',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
            'kategori' => 'required | in:M,A,BHP,BTHP',
        ]);

        $kategori->update($request->all());
        return redirect()->route('kategori.index')
            ->with(['success' => 'Kategori berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        try {
            $barangCount = Barang::where('kategori_id', $kategori->id)->count();

            if ($barangCount > 0) {
                return back()->with(['error' => 'Kategori tidak bisa dihapus karena masih memiliki barang.']);
            }

            $kategori = Kateogi::findOrFail($id);
            $kategori->delete();

            return redirect()->route('kategori.index')
                ->with(['success' => 'Kategori berhasil dihapus']);
        } catch (QueryException $e) {
            throw $e;
        }
    }
}
