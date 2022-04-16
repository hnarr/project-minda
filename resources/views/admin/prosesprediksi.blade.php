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
                
              <form>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Golongan Darah</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>A</option>
                        <option>B</option>
                        <option>O</option>
                        <option>AB</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenis Produk Darah</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>WB</option>
                        <option>PRC</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Tahun</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Bulan</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <button type="button" class="btn btn-primary">Proses Prediksi</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

@endsection