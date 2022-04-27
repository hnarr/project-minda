@extends('layouts.admin')
@section('content')
@section('judul','Hasil Prediksi')
@section('title','Hasil Prediksi')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <p>
                {{-- Lorem ipsum dolor sit amet. --}}
                Berikut Hasil Prediksi {{$jenis}} pada {{\Carbon\Carbon::parse($bulan)->isoFormat('MMMM YYYY')}} 
                sebanyak <b>{{ceil($forecast)}}</b> permintaan
            </p>

            <form action="{{route('simpan-hasil')}}" method="post">
                @csrf
                <input type="hidden" value="{{$jenis}}" name="jenis_darah">
                {{-- <input type="hidden" value="{{$tahun}}" name="tahun"> --}}
                <input type="hidden" value="{{$bulan}}" name="bulan">
                <input type="hidden" value="{{$forecast}}" name="prediksi">
                <input type="hidden" value="{{$alpha}}" name="alpha">
                <button class="btn btn-primary btn-sm">Simpan Prediksi</button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>

       

        
      </div>
    </div>
  </div>
</section>

@endsection