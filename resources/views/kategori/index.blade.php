@extends('layout.dashboard')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Kategori Produk</h4>
          <div class="card-tools">
            <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary">
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
          @if(count($errors) > 0)
            @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
            @endforeach
          @endif
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemkategori as $kategori)
                <tr>
                  <td>
                  {{ ++$no }}
                  </td>
                  <td>
                  {{ $kategori->category_name }}
                  </td>
                  <td>
                  {{ $kategori->description }}
                  </td>                  <td>
                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Edit
                    </a>
                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="post" style="display:inline;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-sm btn-danger mb-2">
                        Hapus
                      </button>                    
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            {{ $itemkategori->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection