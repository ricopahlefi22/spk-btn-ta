@extends('Karyawan.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Perhitungan</h4>


              <!-- Hoverable Table rows -->
              <div class="card">
                <h5 class="card-header">Data Perhitungan</h5>
                <div class="container">
                <div class="row">
                    <a href="{{url('Karyawan/tambah-nasabah/create')}}">
                      <div class="btn btn-dark" style="float: right; margin-right: 10px; margin-bottom: 10px"><i class="bx bx-plus"></i> Tambah Data Nasabah</div>
                    </a>
                  </div>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Alternatif</th>
                        <th>Aksi</th>
                        @foreach($list_kriteria as $kriteria)
                        <th>{{$kriteria->nama}}</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($list_perhitungan as $perhitungan)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$loop->iteration}}</strong></td>
                        <td> {{$perhitungan->nasabah->nama}} </td>
                        <td><a href="{{url('Karyawan/tambah-bobot', $perhitungan->id)}}" class="btn btn-warning"><i class="bx bx-plus"></i> Bobot</a></td>

                        @php
                          $list_bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->get()
                        @endphp

                        @foreach($list_bobot as $bobot)
                        <td>{{$bobot->subkriteria->nama}}</td>
                        @endforeach
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