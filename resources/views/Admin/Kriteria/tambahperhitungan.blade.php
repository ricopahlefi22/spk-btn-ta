@extends('Admin.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Kriteria</h4>

          <div class="row">
            <div class="col-12 col-lg-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-2">Tambah Nilai Skala Kriteria</h5>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                      <p>Catatan Nilai Skala :</p>
                        <p>
                          1 --Sama Pentingnya <br>
                          3 --Agak Penting <br>
                          5 --Cukup Penting <br>
                          7 --Lebih Penting <br>
                          9 --Sama Penting
                        </p>
                      </div>
                      <div class="col-md-6">
                        @foreach($list_kriteria as $kriteria)
                        <p>{{$kriteria->kode}} - {{$kriteria->nama}}</p>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <form action="{{url('Admin/perhitungan-kriteria')}}" method="post" enctype="multipart/form-data" style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px">
                  @csrf
                  <div class="container">
                    <div class="table-responsive text-nowrap">
                      <table class="table table-bordered">
                          <tr>
                            <td> </td>
                          @foreach($list_kriteria as $kriteria)
                            <td>{{$kriteria->kode}}</td>
                          @endforeach
                          </tr>
                          @foreach($list_kriteria as $kriteria1)
                          <tr>
                              <td>{{$kriteria1->kode}}</td>
                              @foreach($list_kriteria as $kriteria)
                                <td>
                                  <input type="text" value="{{$kriteria1->id}}" name="id_kriteria_1" hidden>
                                  <input type="text" name="id_kriteria_2" value="{{$kriteria->id}}" hidden>
                                  <input class="form-control" type="text" name="skala">
                                </td>
                              @endforeach
                          </tr>
                          @endforeach
                      </table>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                  </div>
                  </form>
              </div>
            </div>
          </div>

@endsection