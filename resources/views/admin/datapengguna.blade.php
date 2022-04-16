@extends('layouts.admin')
@section('content')
@section('judul','Data Pengguna')
@section('title','Data Pengguna')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalTambahPengguna">+ Tambahkan Data Pengguna</button>
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped" id="penggunaTabel">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $pengguna)
                <tr>
                  <td>{{$pengguna ['nama']}}</td>
                  <td>{{$pengguna ['username']}}</td>
                  <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $pengguna->id }}">Edit</button>
                    <!-- Start Modal Edit -->
                    <div class="modal fade" id="edit-{{ $pengguna->id }}" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Ubah Data Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{url('pengguna/update')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="{{ $pengguna->id }}">
                            <div class="modal-body">
                              <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input type="text" name='nama' id='nama' class="form-control" value="{{ $pengguna->nama  }}" placeholder="Silahkan Masukkan Nama">
                              </div>
                              <div class="form-group">
                                <label>Username</label>
                                <input type="text" name='username' id='username' class="form-control" value="{{ $pengguna->username  }}" placeholder="Silahkan Masukkan Username">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal Edit -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-{{ $pengguna->id }}">Hapus</button>

                    <!-- Start Modal Hapus-->
                    <div class="modal fade" id="hapus-{{ $pengguna->id }}" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <div>
                              Apakah Anda yakin menghapus Pengguna bernama <strong>{{ $pengguna->nama}}</strong>?
                            </div>
                          </div>
                          <div class="modal-footer">
                            <a href="{{ url ('pengguna/hapus'.$pengguna->id) }}" class="btn btn-danger">Hapus</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal Hapus -->
                  </td>
                </tr>
                @endforeach
              </tbody>

            </table>
          </div>
          <!-- /.card-body -->
        </div>

        <!-- Start Modal Tambah -->
        <div class="modal fade" id="modalTambahPengguna" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambahkan Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="fungsiTambah()">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{url('pengguna/tambah')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" name='nama' class="form-control" placeholder="Silahkan Masukkan Nama">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name='username' class="form-control" placeholder="Silahkan Masukkan Username">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Modal Tambah -->
      </div>
    </div>
  </div>
</section>

  @endsection