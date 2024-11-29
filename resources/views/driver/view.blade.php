@extends('layout.head')
@section('content')
    <section class="content">
        <div class="content-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Data Driver {{$data->nama}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>NIK : {{$data->nik}}</h4>
                                <h4>Nama : {{$data->nama}}</h4>
                            </div>
                            <div class="col-md-6">
                                <h4>Email : {{$data->email}}</h4>
                                <h4>No Handphone : {{$data->phone}}</h4>
                            </div>
                            <div class="col-md-12">
                                <h4>Foto</h4>
                                <img src="{{url('foto/' . $data->foto)}}" class="img-fluid img-thumbnail" alt="" width="40%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
