@extends('layouts.pengguna')
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
                                    {{-- <th>Tahun</th> --}}
                                    <th>Bulan dan Tahun</th>
                                    <th>Jenis Darah</th>
                                    <th>Alpha</th>
                                    <th>Prediksi Permintaan Darah</th>
                                    {{-- <th>Opsi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prediksi as $key => $row)
                                <tr>
                                    <td>{{$key+1 }}</td>
                                    {{-- <td>{{$row->tahun }}</td> --}}
                                    <td>{{\Carbon\Carbon::parse($row->bulan)->isoFormat('MMMM YYYY')}}</td>
                                    <td>{{JenisDarah($row->jenis_darah) }}</td>
                                    <td>{{$row->alpha }}</td>
                                    <td>{{$row->prediksi }}</td>
                                        
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