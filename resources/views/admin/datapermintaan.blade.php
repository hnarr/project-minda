@extends('layouts.admin')
@section('content')
@section('judul','Data Permintaan Darah')
@section('title','Data Permintaan Darah')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalTambahPermintaan">+ Tambahkan Data Permintaan</button>
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped" id="permintaanTabel">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Tahun</th>
                  <th>Bulan</th>
                  <th>Golongan Darah</th>
                  <th>Jenis Darah</th>
                  <th>Jumlah Permintaan Darah</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($permintaan as $key => $row)
                <tr>
                  <td>{{$key+1 }}</td>
                  <td>{{$row->tahun }}</td>
                  <td>{{$row->bulan }}</td>
                  <td>{{$row->gol_darah }}</td>
                  <td>{{$row->jenis_darah }}</td>
                  <td>{{$row->permintaan }}</td>
                  <td>
                    
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $row->id }}">Edit</button>
                    <!-- Start Modal Edit -->
                    <div class="modal fade" id="edit-{{ $row->id }}" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Ubah Data Permintaan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{url('permintaan/update')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="{{ $row->id }}">
                            <div class="modal-body">
                              <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" name='tahun' id='tahun' class="form-control" value="{{ $row->tahun  }}" placeholder="Tahun">
                              </div>
                              <div class="form-group">
                                <label>Bulan</label>
                                <input type="text" name='bulan' id='bulan' class="form-control" value="{{ $row->bulan  }}" placeholder="Bulan">
                              </div>
                              <div class="form-group">
                                <label>Golongan Darah</label>
                                <input type="text" name='gol_darah' id='gol_darah' class="form-control" value="{{ $row->gol_darah  }}" placeholder="Golongan Darah">
                              </div>
                              <div class="form-group">
                                <label>Jenis Darah</label>
                                <input type="text" name='jenis_darah' id='jenis_darah' class="form-control" value="{{ $row->jenis_darah  }}" placeholder="Jenis Darah">
                              </div>
                              <div class="form-group">
                                <label>Permintaan</label>
                                <input type="text" name='permintaan' id='permintaan' class="form-control" value="{{ $row->permintaan  }}" placeholder="Permintaan">
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
                    
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-{{ $row->id }}">Hapus</button>
                    <!-- Start Modal Hapus-->
                    <div class="modal fade" id="hapus-{{ $row->id }}" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <div>
                              Apakah Anda yakin menghapus Data
                            </div>
                          </div>
                          <div class="modal-footer">
                            <a href="{{ url ('permintaan/hapus'.$row->id) }}" class="btn btn-danger">Hapus</a>
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
        <div class="modal fade" id="modalTambahPermintaan" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambahkan Data Permintaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="fungsiTambah()">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{url('permintaan/tambah')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" name='tahun' class="form-control" placeholder="Tahun">
                  </div>
                  <div class="form-group">
                    <label>Bulan</label>
                    <input type="text" name='bulan' class="form-control" placeholder="Bulan">
                  </div>
                  <div class="form-group">
                    <label>Golongan Darah</label>
                    <input type="text" name='gol_darah' class="form-control" placeholder="Golongan Darah">
                  </div>
                  <div class="form-group">
                    <label>Jenis Darah</label>
                    <input type="text" name='jenis_darah' class="form-control" placeholder="Jenis Darah">
                  </div>
                  <div class="form-group">
                    <label>Permintaan</label>
                    <input type="text" name='permintaan' class="form-control" placeholder="Permintaan">
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