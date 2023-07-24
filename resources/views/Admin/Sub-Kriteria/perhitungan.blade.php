@extends('Admin.template.base')

@section('content')
    <h4 class="fw-bold py-3 mb-4">Subkriteria</h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Perhitungan Subkriteria <strong>{{ $kriteria->nama }}</strong></h5>
        <!-- <div class="container">
                        <a class="btn btn-primary" href="{{ url('Admin/perhitungan-kriteria/create') }}"> Tambah Skala Kriteria</a>
                      </div> -->
        <div class="container">
            <form action="{{ url('Admin/sub-kriteria/perhitungan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-5">
                    <div class="row">

                        <div class="mt-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Pilih Kriteria</label>
                            <select class="form-select" name="id_subkriteria_1" aria-label="Default select example">
                                <option hidden>Pilih Subkriteria</option>
                                @foreach ($list_subkriteria as $subkriteria1)
                                    <option value="{{ $subkriteria1->id }}">{{ $subkriteria1->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Pilih Prioritas</label>
                            <select class="form-select" name="skala" aria-label="Default select example">
                                <option hidden>Pilih Jenis Prioritas</option>
                                <option value="1">- Sama Pentingnya</option>
                                <option value="3">- Agak Penting</option>
                                <option value="5">- Cukup Penting</option>
                                <option value="7">- Lebih Penting</option>
                                <option value="9">- Sangat Penting</option>
                            </select>
                        </div>

                        <div class="mt-3 col-md-3">
                            <label for="exampleFormControlInput1" class="form-label">Pilih Kriteria</label>
                            <select class="form-select" name="id_subkriteria_2" aria-label="Default select example">
                                <option hidden>Pilih Subkriteria</option>
                                @foreach ($list_subkriteria as $subkriteria2)
                                    <option value="{{ $subkriteria2->id }}">{{ $subkriteria2->nama }}</option>
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
                    @foreach ($list_subkriteria as $subkriteria2)
                        <th>{{ $subkriteria2->nama }}</th>
                    @endforeach
                </tr>
                @foreach ($list_subkriteria as $subkriteria1)
                    <tr>
                        <th>{{ $subkriteria1->nama }}</th>
                        @foreach ($list_subkriteria as $subkriteria2)
                            @php
                                $list_perhitungan = App\Models\PerhitunganSubkriteria::where('id_subkriteria_1', $subkriteria1->id)
                                    ->where('id_subkriteria_2', $subkriteria2->id)
                                    ->get();
                            @endphp
                            @foreach ($list_perhitungan as $perhitungan)
                                <td>
                                    {{ $perhitungan->skala }}
                                </td>
                            @endforeach
                        @endforeach
                    </tr>
                @endforeach
                <tr style="background-color: #FFEC00">
                    <td><strong>Jumlah</strong></td>
                    @foreach ($list_subkriteria as $subkriteria2)
                        @php
                            $jumlah_kolom = App\Models\PerhitunganSubkriteria::where('id_subkriteria_2', $subkriteria2->id)->sum('skala');
                        @endphp
                        <td><strong>{{ $jumlah_kolom }}</strong></td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>

    <hr class="my-5" />
    <div class="card">
        <h5 class="card-header">Perhitungan Matriks Nilai Subkriteria (Normalisasi)</h5>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <tr>
                                <td> </td>
                                @foreach ($list_subkriteria as $subkriteria)
                                    <td>{{ $subkriteria->nama }}</td>
                                @endforeach
                            </tr>
                            @foreach ($list_subkriteria as $subkriteria1)
                                <tr>
                                    <td>{{ $subkriteria1->nama }}</td>

                                    @foreach ($list_subkriteria as $subkriteria2)
                                        @php
                                            $list_perhitungan = App\Models\PerhitunganSubkriteria::where('id_subkriteria_1', $subkriteria1->id)
                                                ->where('id_subkriteria_2', $subkriteria2->id)
                                                ->get();

                                            $jumlah_kolom = App\Models\PerhitunganSubkriteria::where('id_subkriteria_2', $subkriteria2->id)->sum('skala');

                                        @endphp
                                        @foreach ($list_perhitungan as $nilai_matriks)
                                            @php
                                                ${'normalisasi' . $subkriteria1->id} = $nilai_matriks->skala / $jumlah_kolom;

                                                if ($subkriteria1->id == $nilai_matriks->id_subkriteria_1) {
                                                    ${'total' . $subkriteria1->id}[] = ${'normalisasi' . $subkriteria1->id};
                                                }
                                            @endphp
                                            <td>
                                                {{ number_format(${'normalisasi' . $subkriteria1->id}, 3) }}
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
                                <td>Prioritas Subkriteria</td>
                            </tr>
                            @foreach ($list_subkriteria as $subkriteria2)
                                @php
                                    ${'prioritas' . $subkriteria2->id} = array_sum(${'total' . $subkriteria2->id}) / $list_subkriteria->count();

                                    $maks[] = ${'prioritas' . $subkriteria2->id};
                                    $max = max($maks);
                                    $prioritas_sub = ${'prioritas' . $subkriteria2->id} / $max;
                                @endphp
                                <tr>
                                    <td>
                                        {{ number_format(array_sum(${'total' . $subkriteria2->id}), 3) }}
                                    </td>
                                    <td> {{ number_format(${'prioritas' . $subkriteria2->id}, 3) }}</td>
                                    <td>{{ number_format($prioritas_sub, 3) }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5" />

    <div class="card">
        <h5 class="card-header">Perhitungan Jumlah Baris</h5>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <tr>
                                <td> </td>
                                @foreach ($list_subkriteria as $subkriteria2)
                                    <td>{{ $subkriteria2->nama }}</td>
                                @endforeach
                            </tr>
                            @foreach ($list_subkriteria as $subkriteria1)
                                <tr>
                                    <td>{{ $subkriteria1->nama }}</td>
                                    @foreach ($list_subkriteria as $subkriteria2)
                                        @php
                                            $list_perhitungan = App\Models\PerhitunganSubkriteria::where('id_subkriteria_1', $subkriteria1->id)
                                                ->where('id_subkriteria_2', $subkriteria2->id)
                                                ->get();
                                        @endphp
                                        @foreach ($list_perhitungan as $perhitungan)
                                            @php
                                                ${'nilai' . $subkriteria1->id} = $perhitungan->skala * (array_sum(${'total' . $subkriteria2->id}) / $list_subkriteria->count());
                                                if ($subkriteria1->id == $perhitungan->id_subkriteria_1) {
                                                    ${'jumlah_baris' . $subkriteria1->id}[] = ${'nilai' . $subkriteria1->id};
                                                }
                                            @endphp
                                            <td>
                                                {{ number_format(${'nilai' . $subkriteria1->id}, 3) }}
                                            </td>
                                        @endforeach
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <tr>
                                <td>Jumlah</td>
                            </tr>
                            @foreach ($list_subkriteria as $subkriteria2)
                                <tr>
                                    <td>
                                        {{ number_format(array_sum(${'jumlah_baris' . $subkriteria2->id}), 3) }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5" />

    <div class="card">
        <h5 class="card-header">Perhitungan Rasio Konsisten</h5>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <table class="table table-bordered">
                        <tr>
                            <td> Subkriteria </td>
                        </tr>
                        @foreach ($list_subkriteria as $subkriteria1)
                            <tr>
                                <td>{{ $subkriteria1->nama }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-3">
                    <table class="table table-bordered">
                        <tr>
                            <td>Jumlah Perbaris</td>
                        </tr>
                        @foreach ($list_subkriteria as $subkriteria2)
                            <tr>
                                <td>
                                    {{ number_format(array_sum(${'jumlah_baris' . $subkriteria2->id}), 3) }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-3">
                    <table class="table table-bordered">
                        <tr>
                            <td>Prioritas</td>
                        </tr>
                        @foreach ($list_subkriteria as $subkriteria2)
                            <tr>
                                <td>
                                    {{ number_format(array_sum(${'total' . $subkriteria2->id}) / $list_subkriteria->count(), 3) }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-3">
                    <table class="table table-bordered">
                        <tr>
                            <td>Hasil</td>
                        </tr>
                        @foreach ($list_subkriteria as $subkriteria2)
                            <tr>
                                <td>
                                    {{ number_format(array_sum(${'jumlah_baris' . $subkriteria2->id}) + array_sum(${'total' . $subkriteria2->id}) / $list_subkriteria->count(), 3) }}

                                    @php
                                        ${'hasil' . $subkriteria2->id} = array_sum(${'jumlah_baris' . $subkriteria2->id}) + array_sum(${'total' . $subkriteria2->id}) / $list_subkriteria->count();

                                        $totalhasil[] = ${'hasil' . $subkriteria2->id};
                                        $maks = array_sum($totalhasil) / $list_subkriteria->count();
                                        $ci = ($maks - $list_subkriteria->count()) / ($list_subkriteria->count() - 1);
                                    @endphp
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <h5 class="card-header">Rasio Konsisten Subkriteria <strong>{{ $kriteria->nama }}</strong></h5>
        <div class="container">
            @php
                if ($list_subkriteria->count() == 9) {
                    $cr = 1.45;
                } elseif ($list_subkriteria->count() == 8) {
                    $cr = 1.41;
                } elseif ($list_subkriteria->count() == 7) {
                    $cr = 1.32;
                } elseif ($list_subkriteria->count() == 6) {
                    $cr = 1.24;
                } elseif ($list_subkriteria->count() == 5) {
                    $cr = 1.12;
                } elseif ($list_subkriteria->count() == 4) {
                    $cr = 0.9;
                } elseif ($list_subkriteria->count() == 3) {
                    $cr = 0.58;
                } else {
                    $cr = 0;
                }

                $konsisten = $ci * $cr;
            @endphp
            <h1>
                {{ number_format($konsisten, 3) }}
                @if ($konsisten < 0.1)
                    (Konsisten)
                @else
                    (Tidak Konsisten)
                @endif
            </h1>
        </div>
    </div>
@endsection
