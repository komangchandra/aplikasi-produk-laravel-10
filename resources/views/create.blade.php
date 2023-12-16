@extends('layouts.main')

@section('titlepage', 'Tambah Data Produk')

@section('container')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Produk</h1>

    <div class="row">
      <div class="col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Produk</h6>
          </div>
          <div class="card-body">
            <form action="/products" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label class="fw-semibold">Nama Produk</label>
                <input type="text" class="form-control @error('name')is-invalid @enderror" name="name"
                  value="{{ old('name') }}">
                @error('name')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="mb-3">
                <label class="fw-semibold">Kategori Produk</label>
                <input type="text" class="form-control" name="category" value="{{ old('category') }}">
              </div>

              <div class="mb-3">
                <label class="fw-semibold">Harga Produk</label>
                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
              </div>

              <div class="mb-3">
                <label class="fw-semibold">Deskripsi Produk</label>
                <textarea class="form-control" name="description" rows="5" value="{{ old('description') }}"></textarea>
              </div>

              <div class="mb-3">
                <label class="fw-semibold form-label" value="{{ old('image') }}">Uplode Foto</label>
                <input class="form-control" type="file" name="image">
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-warning">Riset</button>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
@endsection
