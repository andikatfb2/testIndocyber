<?php

namespace App\Http\Controllers;
use\App\mProduk;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class cProduk extends Controller
{
    public function index()
    {
        $data = mProduk::all();
        return view('produk/index', compact('data'));
    }

    public function create()
    {
        return view('produk/create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'image' => ['required','mimes:jpeg,png,jpg','max:5120'],
        ]);
        
        // upload image
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('image'), $imageName);   
       
        // store to database
        $produk = new mProduk;
        $produk->nama_produk = $request->nama_produk;
        $produk->image = $imageName;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->save();
        // return  redirect('produk');
        return redirect()->route('produk.index')->with('success','Produk berhasil di tambahkan...');
    }

    public function show($id)
    {
        $produk = mProduk::find($id);
        return view('produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = mProduk::find($id);
        return view('produk.edit', compact('produk')); 
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'image' => ['required','mimes:jpeg,png,jpg','max:5120'],
        ]);
        
        // upload image
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('image'), $imageName);   
       
        //cek data
        $produk = mProduk::find($id);
        // hapus image dari server
        $image = public_path("image/{$produk->image}");
        if (File::exists($image)) {
            unlink($image);
        }
        // edit data
        $produk->nama_produk = $request->nama_produk;
        $produk->image = $imageName;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->save();
        return redirect()->route('produk.index')->with('success','Produk berhasil di edit...');
    }

    public function destroy($id)
    {
        $produk = mProduk::find($id);
        $image = public_path("image/{$produk->image}");

        if (File::exists($image)) {
            unlink($image);
        }

        $produk->delete();
        return redirect()->route('produk.index')->with('success','Produk berhasil di hapus...');
    }
}
