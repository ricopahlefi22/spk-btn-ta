@extends('Karyawan.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Profil Anda</h4>

              <div class="row">

                <!-- Merged -->
                <div class="col-md-4">
                  <div class="row">
                    <div class="avatar">
                      <div class="card w-px-250 h-px-250">
                        @if(!empty($karyawan->foto))
                        <img src="{{asset('storage/'.$karyawan->foto)}}" alt class="w-px-200 h-auto rounded-circle m-auto img-fluid" />
                        @else
                        <img src="{{asset('Admin/assets/img/avatars/1.png')}}" alt class="w-px-200 h-auto rounded-circle m-auto" />
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header"><b>{{$karyawan->nama}}</b></h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                      <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-phone-call"></i></span>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Masukkan Username"
                          aria-label="Masukkan Username"
                          aria-describedby="basic-addon-search31"
                          name="username"
                          value="{{$karyawan->username}}"
                          readonly
                          style="background-color: #fff"
                        />
                      </div>

                      <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-envelope"></i></span>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Masukkan Email"
                          aria-label="Masukkan Email"
                          aria-describedby="basic-addon33"
                          name="email"
                          value="{{$karyawan->email}}"
                          readonly
                          style="background-color: #fff;"
                        />
                      </div>
                      <!-- <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password32">Password</label>
                        <div class="input-group input-group-merge">
                          <input
                            type="password"
                            class="form-control"
                            id="basic-default-password32"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="basic-default-password"
                            name="password"
                          />
                          <span class="input-group-text cursor-pointer" id="basic-default-password"
                            ><i class="bx bx-hide"></i
                          ></span>
                        </div>
                      </div> -->
                      <a href="{{url('Karyawan/user-karyawan/edit', $karyawan->id)}}" class="btn btn-primary">Edit Profil</a>
                      <a href="{{url('Karyawan/ganti-password', $karyawan->id)}}" class="btn btn-secondary">Ganti Password ?</a>
                    </div>
                  </div>
                </div>

@endsection