@extends('layouts.admin')
@section('content')
@section('judul','Data Darah')
@section('title','Data Darah')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalTambahJenisDarah">+ Tambahkan Data Jenis Darah</button>
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped" id="jenisdarahTabel">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Jenis Darah</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($jenisdarah as $key => $row)
                <tr>
                  <td>{{$key+1 }}</td>
                  <td>{{$row->jenis_darah }}</td>
                  <td>
                    
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $row->id }}">Edit</button>
                    <!-- Start Modal Edit -->
                    <div class="modal fade" id="edit-{{ $row->id }}" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Ubah Data Jenis Darah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{url('jenisdarah/update')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="{{ $row->id }}">
                            <div class="modal-body">
                              <div class="form-group">
                                <label>Jenis Darah</label>
                                <input type="text" name='jenis_darah' id='jenis_darah' class="form-control" value="{{ $row->jenis_darah  }}" placeholder="Jenis Darah">
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
                            <a href="{{ url ('jenisdarah/hapus'.$row->id) }}" class="btn btn-danger">Hapus</a>
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
        <div class="modal fade" id="modalTambahJenisDarah" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambahkan Data Jenis Darah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{url('jenisdarah/tambah')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="form-group">
                    <label>Jenis Darah</label>
                    <input type="text" name='jenis_darah' class="form-control" placeholder="Jenis Darah">
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