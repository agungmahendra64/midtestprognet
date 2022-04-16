<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\ProdukImage;
use Illuminate\Support\Facades\DB;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemproduk = Produk::orderBy('created_at', 'desc')->paginate(20);
        $itemimage = ProdukImage::orderBy('created_at', 'desc')->count();;
        $item = Produk::leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
        ->select('products.id','product_images.id as id_image', 'products.produk_name','products.price','products.description','products.product_rate','products.stock','products.weight', 'product_images.image_name')
        ->paginate(20);
        $data = array('title' => 'Produk',
                    'itemproduk' => $itemproduk,
                    'itemimage' => $itemimage,
                    'item' => $item);
        return view('produk.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemkategori = Kategori::orderBy('category_name', 'asc')->get();
        $data = array('title' => 'Form Produk Baru',
                    'itemkategori' => $itemkategori);
        return view('produk.create', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'produk_name' => 'required',
            'description' => 'required',
            'product_rate' => 'required',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        $inputan = $request->all();
        $itemproduk = Produk::create($inputan);
        return redirect()->route('produk.index')->with('success', 'Data berhasil disimpan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemproduk = Produk::findOrFail($id);
        $data = array('title' => 'Foto Produk',
                'itemproduk' => $itemproduk);
        return view('produk.show', $data);
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemproduk = Produk::where('id',$id)->first();
        $data = array('title' => 'Form Edit Produk',
                'itemproduk' => $itemproduk);
        return view('produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'produk_name' => 'required',
            'description' => 'required',
            'product_rate' => 'required',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric'
        ]);
        $itemproduk = Produk::findOrFail($id);
            $inputan = $request->all();
            $itemproduk->update($inputan);
            return redirect()->route('produk.index')->with('success', 'Data berhasil diupdate');
        }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadimage(Request $request) {
        $fileupload = $request->file('image');
        $path = $fileupload->store('foto-produk');
        $inputan = $request->all();
        $inputan['image_name'] = $path;
        $inputan['product_id'] = $request->id;
        \App\Models\ProdukImage::create($inputan);
         return back()->with('success', 'Image berhasil diupload');
    }

    public function deleteimage(Request $request, $id) {
        $itemprodukimage = ProdukImage::findOrFail($id);
        $itemgambar = \App\Models\ProdukImage::where('image_name', $itemprodukimage->foto)->first();
        if ($itemgambar) {
            \Storage::delete($itemgambar->image_name);
            $itemgambar->delete();
        }
        $itemprodukimage->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function destroy($id)
    {
        $itemproduk = Produk::findOrFail($id); 
        if ($itemproduk->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }
    
}