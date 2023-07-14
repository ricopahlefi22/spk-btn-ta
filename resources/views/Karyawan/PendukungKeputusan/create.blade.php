@extends('Admin.template.base')
@section('content')

<div class="container">
  <div class="row"> 
    <div class="col-md-12 mt-5">
      <div class="card">
        <div  class="card-header">
          <b>Tambah Data Bobot</b>
        </div>
          <div class="card-body">
            <form action="{{url('Admin/produk')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="" class="control-label"><b>Nama</b></label>
              <input type="text" class="form-control" name="nama">
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="" class="control-label"><b>Foto</b></label>
                  <input type="file" class="form-control" name="foto" accept="image/*">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="" class="control-label"><b>Harga</b></label>
                  <input type="text" class="form-control" name="harga">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="" class="control-label"><b>Berat</b></label>
                  <input type="text" class="form-control" name="berat">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="" class="control-label"><b>Stok</b></label>
                  <input type="text" class="form-control" name="stok">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="control-label"><b>Deskripsi</b></label>
              <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
            </div>
            <button class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@endsection