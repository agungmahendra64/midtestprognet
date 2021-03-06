@extends('layout.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Produk</h3>
          <div class="card-tools">
            <a href="{{ route('produk.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
          <form action="{{ route('produk.update', $itemproduk->id) }}" method="post">
            {{ method_field('patch') }}
            @csrf
            <div class="form-group">
              <label for="produk_name">Nama Produk</label>
              <input type="text" name="produk_name" id="produk_name" class="form-control" value={{ $itemproduk->produk_name }}>
            </div>
               
            <div class="form-group">
              <label for="product_rate">Rating Produk</label>
              <input type="text" name="product_rate" id="product_rate" class="form-control" value={{ $itemproduk->product_rate }}>
            </div>
            <div class="form-group">
              <label for="price">Harga Produk</label>
              <input type="text" name="price" id="price" class="form-control" value={{ $itemproduk->price }}>
            </div>
            <div class="form-group">
              <label for="description">Deskripsi Produk</label>
              <textarea type="text" name="description" id="description" cols="30" rows="5" class="form-control">{{ $itemproduk->description }}</textarea>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="stock">Stok</label>
                  <input type="text" name="stock" id="stock" class="form-control" value={{ $itemproduk->stock }}>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="weight">Berat(g)</label>
                  <input type="text" name="weight" id="weight" class="form-control" value={{ $itemproduk->weight }}>
                </div>
              </div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
