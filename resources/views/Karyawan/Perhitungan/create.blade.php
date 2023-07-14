@extends('Karyawan.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Perhitungan</h4>

          <div class="row">
            <div class="col-12 col-lg-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Tambah Nasabah Yang Akan Diproses</h5>
                </div>
                <form action="{{url('Karyawan/tambah-nasabah')}}" method="post" enctype="multipart/form-data" style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px">
                  @csrf
                  <div class="container">
                    <div class="row">
                      <div class="mt-3 col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">Pilih Nasabah Yang Akan Proses</label>
                        <select class="form-select @error('id_nasabah') is-invalid @enderror" name="id_nasabah" aria-label="Default select example">
                          <option hidden>Pilih Nasabah</option>
                          @foreach($list_nasabah as $nasabah)
                          <option value="{{$nasabah->id}}">{{$nasabah->nama}}</option>
                          @endforeach
                        </select>
                        @error('id_nasabah')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <!-- <div class="mt-3 col-md-6">
                      @foreach($list_kriteria as $kriteria)
                      <div class="row">
                        <label for="exampleFormControlInput1" class="form-label">Pilih Kriteria</label>
                        <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{$kriteria->id}}">
                          {{$kriteria->nama}}
                        </button>
                      </div>
                      @endforeach
                      </div> --><!-- 
                      <div class="mt-3 col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Nama Kriteria</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="exampleFormControlInput1">
                        @error('nama')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div> -->
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


<!-- Modal -->
<!-- @foreach($list_kriteria as $kriteria)
<div class="modal fade" id="exampleModal{{$kriteria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Subkriteria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{url('Karyawan/tambah-subkriteria')}}" method="post" enctype="multipart/form-data">
          @csrf
        <label for="exampleFormControlInput1" class="form-label">{{$kriteria->nama}}</label>
          <select class="form-select mb-4" name="id_subkriteria" aria-label="Default select example">
            <option hidden>Pilihan Kriteria</option>
            @php
            $list_subkriteria = App\Models\Subkriteria::where('kriteria_id', $kriteria->id)->get();
            @endphp
            @foreach($list_subkriteria as $subkriteria)
            <option value="{{$subkriteria->id}}">{{$subkriteria->nama}}</option>
            @endforeach
          </select>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
        </form>
    </div>
  </div>
</div>
@endforeach -->