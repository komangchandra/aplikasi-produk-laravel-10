@extends('layouts.main')

@section('titlepage', 'Data Produk')

@section('container')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Produk</h1>

    @if (session('success'))
      <div class="alert alert-success col-lg-4">
        {{ session('success') }}
      </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row d-flex">
          <div class="col-9">
            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
          </div>
          <div class="col-3">
            <a class="btn btn-primary btn-sm" href="/products/create"><i class="fas fa-fw fa-plus"></i> Tambah data</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori Produk</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori Produk</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>
              @forelse ($products as $product)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->category }}</td>
                  <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                  <td>
                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="" class="img-table">
                  </td>
                  <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                      action="{{ route('products.destroy', $product->id) }}" method="POST">
                      <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark"><i
                          class="fa fa-eye"></i></a>
                      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i
                          class="fa fa-pencil-alt"></i></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <div class="alert alert-danger">
                  Data Produk belum Tersedia.
                </div>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <div class="container">{{ $products->links() }}</div>
    </div>
  </div>
@endsection
