@extends('layouts.admin')
@section('content')
@section('judul','Prediksi')

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Proses Prediksi</h4>
              </div>
              <div class="card-body">
                
              <form action="{{route('prediksi-permintaan')}}" method="POST">
                @csrf
                {{-- <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" name='tahun' class="form-control" placeholder="Tahun" required>
                  </div> --}}
                <div class="form-group">
                    <label>Bulan</label>
                    <input type="month" name='bulan' class="form-control" placeholder="Bulan"required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenis Darah</label>
                    <select class="form-control" name="jenis" id="exampleFormControlSelect1" required>
                        <option value="">Pilih</option>
                        @foreach ($jenis as $item)
                          <option value="{{$item->id}}">{{$item->jenis_darah}}</option>
                        @endforeach
                        {{-- <option>Whole Blood A</option>
                        <option>Whole Blood B</option>
                        <option>Packed Red Cells O</option>
                        <option>Packed Red Cells AB</option> --}}
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Alpha</label>
                    <select class="form-control" name="alpha" id="exampleFormControlSelect1">
                        <option>0,1</option>
                        <option>0,2</option>
                        <option>0,3</option>
                        <option>0,4</option>
                        <option>0,5</option>
                        <option>0,6</option>
                        <option>0,7</option>
                        <option>0,8</option>
                        <option>0,9</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Proses Prediksi</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

@endsection