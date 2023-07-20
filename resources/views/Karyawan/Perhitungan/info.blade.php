@extends('Karyawan.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Penilaian Nasabah</h4>


              <!-- Hoverable Table rows -->
              <div class="card">
                <h5 class="card-header">Data Penilaian</h5>
                <div class="container">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Nama Alternatif</th>
                          @foreach($list_kriteria as $kriteria)
                          <th>{{$kriteria->nama}}</th>
                          @endforeach
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        @foreach($list_perhitungan as $perhitungan)
                        <tr>
                          <td> {{$perhitungan->nasabah->nama}} </td>

                          @php
                            $list_bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->get()
                          @endphp

                          @foreach($list_bobot as $bobot)
                          <td>{{$bobot->subkriteria->nama}} {{$bobot->id_subkriteria}}</td>
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

                        <!-- Prioritas Kriteria -->
                        <table class="table table-bordered">
                            @foreach($list_kriteria as $kriteria)
                            @php
                              $jumlah_kolom_1 = App\Models\PerhitunganKriteria::where('id_kriteria_2', $kriteria->id)->sum('skala');
                            @endphp
                            @endforeach
                            @foreach($list_kriteria as $kriteria1)
                                @foreach($list_kriteria as $kriteria)
                                @php
                                  $list_perhitungan = App\Models\PerhitunganKriteria::where('id_kriteria_1', $kriteria1->id)->where('id_kriteria_2', $kriteria->id)->get();

                                  $jumlah_kolom = App\Models\PerhitunganKriteria::where('id_kriteria_2', $kriteria->id)->sum('skala');
                                  
                                @endphp
                                  @foreach($list_perhitungan as $nilai_matriks)
                                  @php
                                    ${"normalisasi".$kriteria1->id} = $nilai_matriks->skala/$jumlah_kolom;

                                    if($kriteria1->id == $nilai_matriks->id_kriteria_1){

                                    ${"total".$kriteria1->id}[] = ${"normalisasi".$kriteria1->id};
                                  }
                                  @endphp

                                  @endforeach
                                @endforeach
                            @endforeach
                            @foreach($list_kriteria as $kriteria)
                            <tr>
                              <td> {{number_format(array_sum(${"total".$kriteria->id}) / $list_kriteria->count(), 3)}} {{$kriteria->id}}</td>
                            </tr>
                            @endforeach
                        </table>

              <hr class="my-5" />

              

@endsection