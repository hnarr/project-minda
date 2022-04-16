@extends('layouts.admin')
@section('content')
@section('judul','Data Prediksi')
@section('title','Data Prediksi')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="prediksiTabel">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Golongan Darah</th>
                                    <th>Jenis Darah</th>
                                    <th>Prediksi Permintaan Darah</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prediksi as $key => $row)
                                <tr>
                                    <td>{{$key+1 }}</td>
                                    <td>{{$row->tahun }}</td>
                                    <td>{{$row->bulan }}</td>
                                    <td>{{$row->gol_darah }}</td>
                                    <td>{{$row->jenis_darah }}</td>
                                    <td>{{$row->prediksi }}</td>
                                    <td>

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
                                                        <a href="{{ url ('prediksi/hapus'.$row->id) }}" class="btn btn-danger">Hapus</a>
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

            </div>
        </div>
    </div>
</section>

@endsection