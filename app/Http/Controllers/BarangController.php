<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::paginate(6);
        $posts = Barang::orderBy('kode_barang', 'desc')->paginate(6);
        return view('barang.index', compact('barang'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Barang::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('barang.index')
            ->with('success', 'Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kode_barang)
    {
        //menampilkan detail data dengan menemukan/berdasarkan kode_barang
        $barang = Barang::find($kode_barang);
        return view('barang.detail', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_barang)
    {
         //menampilkan detail data dengan menemukan/berdasarkan kode_barang
         $barang = Barang::find($kode_barang);
         return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_barang)
    {
         //melakukan validasi data
         $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        Barang::find($kode_barang)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('barang.index')
            ->with('success', 'Barang Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_barang)
    {
         //fungsi eloquent untuk menghapus data
         Barang::find($kode_barang)->delete();
         return redirect()->route('barang.index')
             ->with('success', 'Barang Berhasil Dihapus');
    }

    public function search(Request $request){
        $keyword = $request->search;
        $barang = Barang::where('nama_barang', 'like', "%". $keyword . "%")->paginate(5);
        return view(view:'barang.index', data:compact(var_name:'barang'));
    }
}
