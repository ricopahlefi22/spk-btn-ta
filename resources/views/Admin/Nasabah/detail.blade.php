@extends('Admin.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Nasabah Pemohon</h4>

          <div class="row">
            <div class="col-12 col-lg-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Data Nasabah Pemohon</h5>
                </div>
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <div class="mt-3 col-md-3">
                        <img src="{{url('storage')}}/{{$nasabah->pas_foto}}">
                      </div>
                      <div class="mt-3 col-md-9">
                        <label for="exampleFormControlInput1" class="form-label">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control" name="ttl" id="exampleFormControlInput1" required>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

@endsection

