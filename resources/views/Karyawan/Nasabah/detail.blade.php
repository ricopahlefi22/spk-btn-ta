@extends('Karyawan.template.base')
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
                        <img src="{{asset('storage/'.$nasabah->pas_foto)}}" class="img-fluid">
                      </div>
                      <div class="mt-3 col-md-9">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Nama Nasabah : {{$nasabah->nama}}</li>
                          <li class="list-group-item">NIK : {{$nasabah->nik}}</li>
                          <li class="list-group-item">Tempat, Tanggal Lahir : {{$nasabah->ttl}}</li>
                          <li class="list-group-item">Jenis Kelamin : {{$nasabah->jenis_kelamin}}</li>
                          <li class="list-group-item">Alamat : {{$nasabah->alamat}}</li>
                        </ul>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#KTP-pemohon">
                          Lihat KTP Pemohon
                        </button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#KTP-suami-istri">
                          Lihat KTP Suami / Istri
                        </button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#KK">
                          Lihat KK Nasabah
                        </button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#surat-nikah">
                          Lihat Surat Nikah
                        </button>
                      </div>
                      <div class="col-md-3">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#npwp">
                          Lihat NPWP
                        </button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#sk">
                          Lihat SK Pegawai
                        </button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#slip-gaji">
                          Lihat Slip Gaji Nasabah
                        </button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#siup">
                          Lihat SIUP Nasabah
                        </button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#tdp">
                          Lihat TDP Nasabah
                        </button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#akta-pendirian">
                          Lihat Akta Pendirian Perusahaan / Usaha Nasabah
                        </button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#akta-pengesahan-menteri">
                          Lihat Akta Pengesahan Menteri Nasabah
                        </button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#data-keuangan-perusahaan">
                          Lihat Data Keuangan Perusahaan Nasabah
                        </button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#izin-praktek">
                          Lihat Izin Praktek Nasabah
                        </button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#rekening-koran">
                          Lihat Rekening Koran Nasabah
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

@endsection

<!-- Modal KTP Pemohon -->
<div class="modal fade" id="KTP-pemohon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">KTP Pemoohon</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->ktp_pemohon))
        <img src="{{asset('storage/'.$nasabah->ktp_pemohon)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>

<!-- Modal KTP Suami/Istri -->
<div class="modal fade" id="KTP-suami-istri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">KTP Suami/Istri</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->ktp_suami_istri))
        <img src="{{asset('storage/'.$nasabah->ktp_suami_istri)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>

<!-- Modal KK -->
<div class="modal fade" id="KK" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">KK Nasabah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->kk))
        <img src="{{asset('storage/'.$nasabah->kk)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>

<!-- Modal Surat Nikah -->
<div class="modal fade" id="surat-nikah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Surat Nikah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->surat_nikah))
        <img src="{{asset('storage/'.$nasabah->surat_nikah)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- Modal NPWP -->
<div class="modal fade" id="npwp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NPWP</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->npwp_spt))
        <img src="{{asset('storage/'.$nasabah->npwp_spt)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- Modal SK Pegeawai -->
<div class="modal fade" id="sk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SK Pegawai</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->sk_pegawai_tetap))
        <img src="{{asset('storage/'.$nasabah->sk_pegawai_tetap)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- Modal Slip Gaji -->
<div class="modal fade" id="slip-gaji" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Slip Gaji Nasabah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->slip_gaji))
        <img src="{{asset('storage/'.$nasabah->slip_gaji)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- Modal SIUP -->
<div class="modal fade" id="siup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SIUP Nasabah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->siup))
        <img src="{{asset('storage/'.$nasabah->siup)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- Modal TDP -->
<div class="modal fade" id="tdp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TDP Nasabah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->tdp))
        <img src="{{asset('storage/'.$nasabah->tdp)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- Modal Akta Pendirian -->
<div class="modal fade" id="akta-pendirian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Akta Pendirian Perusahaan / Usaha Nasabah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->akta_pendirian))
        <img src="{{asset('storage/'.$nasabah->akta_pendirian)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- Modal Akta Pengesahan -->
<div class="modal fade" id="akta-pengesahan-menteri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Akta Pengesahan Menteri Nasabah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->akta_pengesahan_menteri))
        <img src="{{asset('storage/'.$nasabah->akta_pengesahan_menteri)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- Modal Data Keuangan Perusahaan -->
<div class="modal fade" id="data-keuangan-perusahaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Keuangan Perusahaan Nasabah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->data_keuangan_perusahaan))
        <img src="{{asset('storage/'.$nasabah->data_keuangan_perusahaan)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- Modal Izin Praktek -->
<div class="modal fade" id="izin-praktek" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izin Praktek Nasabah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->izin_praktek))
        <img src="{{asset('storage/'.$nasabah->izin_praktek)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>
<!-- Modal Izin Praktek -->
<div class="modal fade" id="rekening-koran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rekening Koran Nasabah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if(!empty($nasabah->rekening_koran))
        <img src="{{asset('storage/'.$nasabah->rekening_koran)}}" class="img-fluid">
        @else
        <span class="text-danger">*Data belum dimasukkan</span>
        @endif
      </div>
    </div>
  </div>
</div>
