@extends('Admin.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Sub Kriteria</h4>


              <!-- Hoverable Table rows -->
              @foreach($list_kriteria as $kriteria)
              <div class="card">
                <h5 class="card-header"><b>{{$kriteria->kode}}</b> - {{$kriteria->nama}}</h5>
                <div class="row">
                    <a href="{{url('Admin/sub-kriteria/create', $kriteria->id)}}">
                      <div class="btn btn-dark" style="float: right; margin-right: 10px; margin-bottom: 10px"><i class="bx bx-plus"></i> Tambah Sub Kriteria</div>
                    </a>
                  </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Bobot</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                        $list_subkriteria = App\Models\Subkriteria::where('kriteria_id', $kriteria->id)->get();
                        @endphp
                        @foreach($list_subkriteria as $subkriteria)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$subkriteria->nama}}</strong></td>
                        <td>{{$subkriteria->bobot}}</td>
                        <td>
                          <div class="row">
                            <div class="btn-group">
                              <a href="{{url('Admin/sub-kriteria/edit', $subkriteria->id)}}">
                                <button class="btn btn-primary" style="margin-right: 5px"><i class="bx bx-edit-alt"></i></button>
                              </a>
                              <form action="{{url('Admin/sub-kriteria', $subkriteria->id)}}" method="post" class="form-inline" onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
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
              @endforeach

@endsection