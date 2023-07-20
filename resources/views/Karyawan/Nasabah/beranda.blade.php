@extends('Karyawan.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Nasabah Pemohon</h4>


              <!-- Hoverable Table rows -->
              <div class="card">
                  <h5 class="card-header">Data Nasabah Pemohon</h5>
                <div class="row">
                    <a href="{{url('Karyawan/nasabah/create')}}">
                      <div class="btn btn-dark" style="float: right; margin-right: 10px; margin-bottom: 10px"><i class="bx bx-plus"></i> Tambah Nasabah</div>
                    </a>
                  </div>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Nasabah Pemohon</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat </th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($list_nasabah as $nasabah)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$loop->iteration}}</strong></td>
                        <td>{{$nasabah->nama}}</td>
                        <td>{{$nasabah->ttl}}</td>
                        <td>{{$nasabah->alamat}}</td>
                        <td>
                            <div class="row">
                              <div class="btn-group">
                                <a href="{{url('Karyawan/nasabah/detail', $nasabah->id)}}">
                                  <button class="btn btn-info" style="margin-right: 5px"><i class="bx bx-info-circle"></i></button>
                                </a>
                                <a href="{{url('Karyawan/nasabah/edit', $nasabah->id)}}">
                                  <button class="btn btn-warning" style="margin-right: 5px"><i class="bx bx-edit-alt"></i></button>
                                </a>
                                <form action="{{url('Karyawan/nasabah', $nasabah->id)}}" method="post" class="form-inline" onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
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
              <!--/ Hoverable Table rows -->

              <hr class="my-5" />

@endsection