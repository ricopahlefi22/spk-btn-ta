@extends('Karyawan.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Perhitungan</h4>


              <!-- Hoverable Table rows -->
              <div class="card">
                <h5 class="card-header">Data Perhitungan</h5>
                <div class="container">
                <div class="row">
                    <a href="{{url('Karyawan/perhitungan/create')}}">
                      <div class="btn btn-dark" style="float: right; margin-right: 10px; margin-bottom: 10px"><i class="bx bx-plus"></i> Tambah Data Alternatif</div>
                    </a>
                  </div>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Alternatif</th>
                        @foreach($list_kriteria as $kriteria)
                        <th>{{$kriteria->nama}}</th>
                        @endforeach
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($list_perhitungan as $perhitungan)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$perhitungan->id_nasabah}}</strong></td>
                        <td> kjdf </td>

                        <td> afj</td>

                        <td>
                          <div class="row">
                            <div class="btn-group">
                              <a href="{{url('Karyawan/perhitungan/edit', $perhitungan->id)}}">
                                <button class="btn btn-primary" style="margin-right: 5px"><i class="bx bx-edit-alt"></i></button>
                              </a>
                              <form action="{{url('Karyawan/perhitungan', $perhitungan->id)}}" method="post" class="form-inline" onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger"><i class="bx bx-trash"></i></button>
                              </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
              <!--/ Hoverable Table rows -->

              <hr class="my-5" />

@endsection