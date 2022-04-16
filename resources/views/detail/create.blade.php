@extends('layout.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Detail Kategori</h3>
          <div class="card-tools">
            <a href="{{ route('detail.index') }}" class="btn btn-sm btn-danger">
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
          <form action="{{ route('detail.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group"> 
              <label for="category_id">Kategori Produk</label>
              <select name="category_id" id="category_id" class="form-control">
                <option value="">Pilih Kategori</option> 
                 @foreach($itemkategori as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->category_name }}</option>
                @endforeach
              </select> 
            </div>
            <!-- <div class="form-group">
              <label for="category_id">Id Kategori</label>
              <input type="text" name="category_id" id="category_id" class="form-control">
            </div> -->
            <div class="form-group"> 
              <label for="product_id">Produk</label>
              <select name="product_id" id="product_id" class="form-control">
                <option value="">Pilih Produk</option> 
                 @foreach($itemproduk as $product)
                <option value="{{ $product->id }}">{{ $product->produk_name }}</option>
                @endforeach
              </select> 
            </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection