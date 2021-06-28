@extends('Admin.layout.master')


@section('title', 'Admin')

@section('judul_halaman', 'DashBoard Admin')

@section('isi2')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Permasalahan</h5>
                            <a href="Gejala" class="btn btn-primary">Permasalahan</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Gejala</h5>
                        <a href="Keluhan" class="btn btn-primary">Gejala</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Basis Pengetahuan</h5>
                        <a href="Penyebab" class="btn btn-primary">Pengetahuan</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container-fluid">
            <!-- Page Heading -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Home</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Permasalahan</h5>
                                        <a href="Gejala" class="btn btn-primary">Permasalahan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Gejala</h5>
                                    <a href="Keluhan" class="btn btn-primary">Gejala</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Basis Pengetahuan</h5>
                                    <a href="Penyebab" class="btn btn-primary">Pengetahuan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
