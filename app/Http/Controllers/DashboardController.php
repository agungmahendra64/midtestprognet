<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use DB;

class DashboardController extends Controller
{
    public function index(Request $request) {
            $jumlahproduk = DB::table('products')
            ->COUNT('id');
            $itemproduk = Produk::orderBy('created_at', 'desc')->paginate(20);
            $data = array('title' => 'Produk',
                        'itemproduk' => $itemproduk,
                        'jumlahproduk' => $jumlahproduk);
            return view('index', $data)->with('no', ($request->input('page', 1) - 1) * 20)->with('not', ($request->input('page', 1) - 1) * 20);
    }
}