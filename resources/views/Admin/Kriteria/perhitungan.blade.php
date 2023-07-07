@extends('Admin.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Kriteria</h4>


              <!-- Hoverable Table rows -->
              <div class="card">
                  <h5 class="card-header">Perhitungan Kriteria</h5>
                <div class="container">
                      <form action="{{url('Admin/perhitungan-kriteria')}}" method="post" enctype="multipart/form-data">
                      @csrf
                  <div class="form-group mb-5">
                    <div class="row">

                      <div class="mt-3 col-md-3">
                          <label for="exampleFormControlInput1" class="form-label">Jenis Kriteria</label>
                          <select class="form-select" name="kriteria1" aria-label="Default select example">
                            <option hidden>Pilih Kriteria</option>
                            @foreach($list_kriteria as $kriteria)
                            <option value="{{$kriteria->id}}">{{$kriteria->nama}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="mt-3 col-md-3">
                          <label for="exampleFormControlInput1" class="form-label">Pilih Prioritas</label>
                          <select class="form-select" name="skala" aria-label="Default select example">
                            <option hidden>Pilih Jenis Prioritas</option>
                            <option value="1">- Sama Pentingnya</option>
                            <option value="3">- Agak Penting</option>
                            <option value="5">- Cukup Penting Penting</option>
                            <option value="7">- Lebih Penting</option>
                            <option value="9">- Sangat Penting</option>
                          </select>
                        </div>

                        <div class="mt-3 col-md-3">
                          <label for="exampleFormControlInput1" class="form-label">Pilih Kriteria</label>
                          <select class="form-select" name="kriteria2" aria-label="Default select example">
                            <option hidden>Pilih Kriteria</option>
                            @foreach($list_kriteria as $kriteria)
                            <option value="{{$kriteria->id}}">{{$kriteria->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-3" style="margin-top: 45px"> 
                          <button type="submit" class="btn btn-dark">
                            <i class="bx bx-plus"></i> Hitung
                          </button>
                        </div>
                      </div>
                    </div>
                      </form>
                  </div>
                <div class="table-responsive text-nowrap">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> / </th>
                        @foreach($list_kriteria as $kriteria)
                        <th><strong>{{$kriteria->kode}}</strong></th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($list_kriteria as $kriteria)
                      <tr>
                        <td><strong>{{$kriteria->kode}}</strong></td>
                        <td>t</td>
                        <td>y</td>
                        <td>k</td>
                        <td>o</td>
                        <td>t</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Hoverable Table rows -->

              <hr class="my-5" />

@endsection