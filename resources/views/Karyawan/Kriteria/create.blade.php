@extends('Admin.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Kriteria</h4>

          <div class="row">
            <div class="col-12 col-lg-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Tambah Data Kriteria</h5>
                </div>
                <form action="{{url('Admin/kriteria')}}" method="post" enctype="multipart/form-data" style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px">
                  @csrf
                  <div class="container">
                    <div class="row">
                      <div class="mt-3 col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Kode Kriteria</label>
                        <input type="text" class="form-control" name="kode" value="{{$kode}}" id="exampleFormControlInput1" readonly>
                      </div>
                      <div class="mt-3 col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Nama Kriteria</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="exampleFormControlInput1">
                        @error('nama')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mt-3 col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kriteria</label>
                        <select class="form-select" name="jenis" aria-label="Default select example">
                          <option hidden>Pilih Jenis Kriteria</option>
                          <option value="Benefit">Benefit</option>
                          <option value="Cost">Cost</option>
                        </select>
                      </div>
                      <div class="row mt-3 m-auto">
                        <button class="btn btn-primary border-0 w-25" style="margin-left: auto;"><i class="fa fa-check-square"></i> Simpan</button>
                      </div>
                    </div>
                  </div>
                  </form>
              </div>
            </div>
          </div>

@endsection