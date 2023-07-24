@extends('Karyawan.template.base')
@section('content')
    <!-- Prioritas Kriteria -->
    <table class="table table-bordered">
        @foreach ($list_kriteria as $kriteria1)
            @foreach ($list_kriteria as $kriteria)
                @php
                    $list_perhitungan3 = App\Models\PerhitunganKriteria::where('id_kriteria_1', $kriteria1->id)
                        ->where('id_kriteria_2', $kriteria->id)
                        ->get();

                    $jumlah_kolom = App\Models\PerhitunganKriteria::where('id_kriteria_2', $kriteria->id)->sum('skala');

                @endphp
                @foreach ($list_perhitungan3 as $nilai_matriks)
                    @php
                        ${'normalisasi' . $kriteria1->id} = $nilai_matriks->skala / $jumlah_kolom;

                        if ($kriteria1->id == $nilai_matriks->id_kriteria_1) {
                            ${'prioritasKriteria' . $kriteria1->id}[] = ${'normalisasi' . $kriteria1->id};
                        }
                    @endphp
                @endforeach
            @endforeach
        @endforeach
    </table>

    <h4 class="fw-bold py-3 mb-4">Penilaian Nasabah</h4>

    <div class="card">
        <h5 class="card-header">Data Penilaian</h5>
        <div class="container">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Alternatif</th>
                            @foreach ($list_kriteria as $kriteria)
                                <th>{{ $kriteria->nama }}</th>
                            @endforeach

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($list_perhitungan as $perhitungan)
                            <tr>
                                <td> {{ $perhitungan->nasabah->nama }} </td>

                                @php
                                    $list_bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->orderBy('id_subkriteria')->get();
                                @endphp

                                @foreach ($list_bobot as $bobot)
                                    <td> {{ $bobot->subkriteria->nama }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr class="my-5" />

    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Data Penilaian</h5>
        <div class="container">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Alternatif</th>
                            @foreach ($list_kriteria as $kriteria)
                                <th>{{ $kriteria->nama }}</th>

                                @foreach ($kriteria->subkriteria as $subkriteria1)
                                    @foreach ($kriteria->subkriteria as $subkriteria2)
                                        @php
                                            $list_perhitungan1 = App\Models\PerhitunganSubkriteria::where('id_subkriteria_1', $subkriteria1->id)
                                                ->where('id_subkriteria_2', $subkriteria2->id)
                                                ->get();

                                            $jumlah_kolom = App\Models\PerhitunganSubkriteria::where('id_subkriteria_2', $subkriteria2->id)->sum('skala');

                                        @endphp
                                        @foreach ($list_perhitungan1 as $nilai_matriks)
                                            @php
                                                ${'normalisasi' . $subkriteria1->id} = $nilai_matriks->skala / $jumlah_kolom;

                                                if ($subkriteria1->id == $nilai_matriks->id_subkriteria_1) {
                                                    ${'total' . $subkriteria1->id}[] = ${'normalisasi' . $subkriteria1->id};
                                                }
                                            @endphp
                                        @endforeach
                                    @endforeach
                                    @php
                                        ${'prioritas' . $subkriteria1->id} = array_sum(${'total' . $subkriteria1->id}) / $kriteria->subkriteria->count();

                                        $maks[] = ${'prioritas' . $subkriteria1->id};
                                        $max = max($maks);
                                        ${'prioritasSubkriteria' . $subkriteria1->id} = ${'prioritas' . $subkriteria1->id} / $max;
                                    @endphp
                                @endforeach
                            @endforeach
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($list_perhitungan as $perhitungan)
                            <tr>
                                <td> {{ $perhitungan->nasabah->nama }} </td>

                                @php
                                    $list_bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->orderBy('id_subkriteria')->get();
                                @endphp

                                @foreach ($list_bobot as $bobot)
                                    <td>
                                        {{ number_format((${'prioritasSubkriteria' . $bobot->subkriteria->id} * array_sum(${'prioritasKriteria' . $bobot->subkriteria->kriteria->id})) / $list_kriteria->count(), 3) }}
                                    </td>

                                    @php
                                        ${'totalPenilaian' . $perhitungan->nasabah->id}[] = (${'prioritasSubkriteria' . $bobot->subkriteria->id} * array_sum(${'prioritasKriteria' . $bobot->subkriteria->kriteria->id})) / $list_kriteria->count();
                                    @endphp
                                @endforeach
                                <td>{{ number_format(array_sum(${'totalPenilaian' . $perhitungan->nasabah->id}), 3) }}</td>
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
