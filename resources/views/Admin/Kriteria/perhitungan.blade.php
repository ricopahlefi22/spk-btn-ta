@extends('Admin.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Kriteria</h4>


              <!-- Hoverable Table rows -->
              <div class="card">
                  <h5 class="card-header">Perhitungan Kriteria</h5>
                  <!-- <div class="container">
                    <a class="btn btn-primary" href="{{url('Admin/perhitungan-kriteria/create')}}"> Tambah Skala Kriteria</a>
                  </div> -->
                <div class="container">
                      <form action="{{url('Admin/perhitungan-kriteria')}}" method="post" enctype="multipart/form-data">
                      @csrf
                  <div class="form-group mb-5">
                    <div class="row">

                      <div class="mt-3 col-md-3">
                          <label for="exampleFormControlInput1" class="form-label">Jenis Kriteria</label>
                          <select class="form-select" name="id_kriteria_1" aria-label="Default select example">
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
                            <option value="0.33">- Agak Tidak Penting</option>
                            <option value="0.2">- Cukup Tidak Penting</option>
                            <option value="0.14">- Lebih Tidak Penting</option>
                            <option value="0.11">- Sangat Tidak Penting</option>
                          </select>
                        </div>

                        <div class="mt-3 col-md-3">
                          <label for="exampleFormControlInput1" class="form-label">Pilih Kriteria</label>
                          <select class="form-select" name="id_kriteria_2" aria-label="Default select example">
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
                          @php
                            $list_perhitungan = App\Models\PerhitunganKriteria::where('id_kriteria_1', $kriteria1->id)->where('id_kriteria_2', $kriteria->id)->get();
                          @endphp
                            @foreach($list_perhitungan as $perhitungan)
                            <td>
                              {{$perhitungan->skala}}
                            </td>
                            @endforeach
                          @endforeach
                      </tr>
                      @endforeach
                      <tr style="background-color: #FFEC00">
                        <td><strong>Jumlah</strong></td>
                        @foreach($list_kriteria as $kriteria)
                        @php
                          $jumlah_kolom_1 = App\Models\PerhitunganKriteria::where('id_kriteria_2', $kriteria->id)->sum('skala');
                        @endphp
                        <td><strong>{{$jumlah_kolom_1}}</strong></td>
                        @endforeach
                      </tr>
                  </table>
                </div>
              </div>
              <!--/ Hoverable Table rows -->

              <hr class="my-5" />
              <div class="card">
                  <h5 class="card-header">Perhitungan Matriks Nilai Kriteria (Normalisasi)</h5>
                <div class="row">
                  <div class="col-md-8">
                  <!-- <div class="container">
                    <a class="btn btn-primary" href="{{url('Admin/perhitungan-kriteria/create')}}"> Tambah Skala Kriteria</a>
                  </div> -->
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
                              @php
                                $list_perhitungan = App\Models\PerhitunganKriteria::where('id_kriteria_1', $kriteria1->id)->where('id_kriteria_2', $kriteria->id)->get();

                                $jumlah_kolom = App\Models\PerhitunganKriteria::where('id_kriteria_2', $kriteria->id)->sum('skala');
                                
                              @endphp
                                @foreach($list_perhitungan as $nilai_matriks)
                                @php
                                  $normalisasi = $nilai_matriks->skala/$jumlah_kolom;
                                  $jumlah = $normalisasi;
                                @endphp
                                  <td>
                                    {{number_format($normalisasi,3)}} {{$nilai_matriks->id_kriteria_1}}
                                  </td>
                                @endforeach
                              @endforeach
                          @endforeach
                          </tr>
                      </table>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="table-responsive text-nowrap">
                      <table class="table table-bordered">
                          <tr>
                            <td>Jumlah</td>
                            <td>Prioritas</td>
                          </tr>
                          <tr>
                            <td>sfa</td>
                          </tr>
                          <tr>
                            <td>jskf</td>
                          </tr>
                          <tr>
                            <td>ajkfs</td>
                          </tr>
                          <tr>
                            <td>alksf</td>
                          </tr>
                          <tr>
                            <td>akjsf</td>
                          </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

@endsection