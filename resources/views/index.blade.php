@extends('layout.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">

    <div class="col-6 col-lg-3">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$jumlahproduk}}</h3>

          <p>Produk</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
      </div>
    </div>
   
  </div>
  <!-- table produk baru -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Produk</h4>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
           <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Gambar</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Stok</th>
                  <th>Harga</th>
                  <th>Berat(kg)</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

          @foreach($itemproduk as $produk)
                <tr>
                  <td>
                  {{ ++$not }}
                  </td>
                  <td>
                    @if($produk->foto != null)
                    <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" width='150px' class="img-thumbnail">
                    @endif
                  </td>
                  <td>
                  {{ $produk->kode_produk }}
                  </td>
                  <td>
                  {{ $produk->nama_produk }}
                  </td>
                  <td>
                  {{ $produk->qty }} {{ $produk->satuan }}
                  </td>
                  <td>
                  {{ number_format($produk->harga, 2) }}
                  </td>
                  <td>
                  {{ number_format($produk->berat, 2) }}
                  </td>
                  <td>
                  {{ $produk->status }}
                  </td>
                  </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
       
      </div>
    </div>
  </div>
</div>
@endsection

