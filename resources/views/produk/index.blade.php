@extends('layout.dashboard')
@section('content')

<div class="container-fluid">
  <!-- table produk -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Produk</h4>
          <div class="card-tools">
            <a href="{{ route('produk.create') }}" class="btn btn-sm btn-primary">
              Baru
            </a>
          </div>
        </div>
        
        <div class="card-body">
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
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Rating</th>
                  <th>Stok</th>
                  <th>Berat(g)</th>
                  <th>Foto</th>                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($itemproduk as $produk)
                <tr>
                  <td>
                  {{ ++$no }}
                  </td> 
                  <td>
                  {{ $produk->produk_name }}
                  </td>
                  <td>
                  {{ number_format($produk->price, 2) }}
                  </td>
                  <td>
                  {{ $produk->description }}
                  </td>
                  <td>
                  {{ $produk->product_rate }}
                  </td>
                  <td>
                  {{ $produk->stock }}
                  </td> 
                  <td>  
                  {{ number_format($produk->weight, 2) }}
                  </td>
                  <td>
                  @if ($itemimage != 0) 
                    @foreach($item as $foto)
                      <img src="{{ \Storage::url($foto->image_name) }}" width='150px' class="img-thumbnail">
                      <div class="col col-lg-3 col-md-3 mb-2">
                          <form action="{{ url('/produkimage/'.$foto->id_image) }}" method="post" style="display:inline;">
                              @csrf
                              {{ method_field('delete') }}
                              <button type="submit" class="btn btn-sm btn-danger mb-2">
                              Hapus
                              </button>                    
                          </form>
                          </div>
                      @endforeach
                  
                  @endif
                  
                  <div class="form-group">
                        <form action="{{ url('/produkimage') }}" method="post" enctype="multipart/form-data" class="form-inline">
                        @csrf
                            <div class="form-group">
                                <input type="file" name="image" id="image">
                                <input type="hidden" name="id" value={{ $produk->id }}>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                        </td>  
                    </td>
                    <td>
                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Edit
                    </a>
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="post" style="display:inline;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-sm btn-danger mb-2">
                        Hapus
                      </button>                    
                    </form>
                   

                </tr>
                @endforeach
              </tbody>
            </table>
            {!! $item->render() !!}          
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
