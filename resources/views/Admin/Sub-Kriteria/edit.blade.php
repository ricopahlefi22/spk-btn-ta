@extends('Admin.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Sub Kriteria</h4>

          <div class="row">
            <div class="col-12 col-lg-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Edit Data Subkriteria</h5>
                </div>
                <form action="{{url('Admin/sub-kriteria')}}" method="post" enctype="multipart/form-data" style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px">
                  @csrf
                  @method("PUT")
                  <div class="container">
                    <div class="row">
                        <input type="text" class="form-control" name="kriteria_id" value="{{$subkriteria->kriteria_id}}" id="exampleFormControlInput1" readonly hidden>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Nama Subkriteria</label>
                        <input type="text" class="form-control" name="nama" value="{{$subkriteria->nama}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Bobot</label>
                        <input type="text" class="form-control" name="bobot" value="{{$subkriteria->bobot}}" id="exampleFormControlInput1">
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