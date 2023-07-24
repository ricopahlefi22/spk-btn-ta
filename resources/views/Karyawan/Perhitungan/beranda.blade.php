@extends('Karyawan.template.base')
@section('content')
    <h4 class="fw-bold py-3 mb-4">Penilaian Nasabah</h4>


    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Data Penilaian</h5>
        <div class="container">
            <div class="row">
                <a href="{{ url('Karyawan/tambah-nasabah/create') }}">
                    <div class="btn btn-dark" style="float: right; margin-right: 10px; margin-bottom: 10px"><i
                            class="bx bx-plus"></i> Tambah Data Nasabah</div>
                </a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    @foreach ($list_perhitungan as $perhitungan)
                        @php
                            $list_bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->orderBy('id_subkriteria')->get();

                            $bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->first();
                        @endphp
                    @endforeach
                    <thead>
                        <tr>
                            <th>Nama Alternatif</th>
                            <th>Aksi</th>
                            @foreach ($list_kriteria as $kriteria)
                                <th>{{ $kriteria->nama }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($list_perhitungan as $perhitungan)
                            @php
                                $list_bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->orderBy('id_subkriteria')->get();

                                $bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->first();
                            @endphp
                            <tr>
                                <td> {{ $perhitungan->nasabah->nama }} </td>
                                @if (empty($bobot))
                                    <td>
                                        <div class="row">
                                            <div class="btn-group">
                                                <form action="{{ url('Karyawan/perhitungan/hapus', $perhitungan->id) }}"
                                                    method="post" class="form-inline" style="margin-right: 5px"
                                                    onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger"><i class="bx bx-user-x"></i></button>
                                                </form>
                                                <a href="{{ url('Karyawan/tambah-bobot', $perhitungan->id) }}"><button
                                                        class="btn btn-warning"><i class="bx bx-archive-in"></i>
                                                        Bobot</button></a>
                                            </div>
                                        </div>
                                    </td>
                                @else
                                    <td>
                                        <form action="{{ url('Karyawan/perhitungan/hapus', $perhitungan->id) }}"
                                            method="post" class="form-inline"
                                            onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"><i class="bx bx-user-x"></i></button>
                                        </form>
                                    </td>
                                @endif

                                @foreach ($list_bobot as $bobot)
                                    <td>{{ $bobot->subkriteria->nama }}</td>
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
