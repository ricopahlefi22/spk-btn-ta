@extends('Admin.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Sub Kriteria {{$kriteria->kode}} - {{$kriteria->nama}}</h4>

          <div class="row">
            <div class="col-12 col-lg-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Tambah Data Subkriteria</h5>
                </div>
                <form action="{{url('Admin/sub-kriteria')}}" method="post" enctype="multipart/form-data" style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px">
                  @csrf
                  <div class="container">
                    <div class="row">
                        <input type="text" class="form-control" name="kriteria_id" value="{{$kriteria->id}}" id="exampleFormControlInput1" readonly hidden>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Nama Subkriteria</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="exampleFormControlInput1">
                        @error('nama')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Bobot</label>
                        <select class="form-select" name="bobot" aria-label="Default select example">
                          <option hidden>Pilih Bobot</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
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