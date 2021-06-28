@extends('Admin.layout.master')


@section('title', 'Keluhan')

@section('judul_halaman', 'Permasalahan')

@section('isi2')

    <div class="container">

        {{-- pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger ">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- pesan edit hapus data dll --}}
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        @if (\Session::has('delete'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{!! \Session::get('delete') !!}}</li>
                </ul>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-outline-primary" style="float: right" data-toggle="modal"
                    data-target="#modalTambah">
                    Tambah Data
                </button>
                <br>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Keluhan</th>
                            <th scope="col">Solusi</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($gejalas as $gejala)

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $gejala->nama_gejala }}</td>
                                <td>{{ $gejala->solusi }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                        data-target="#modalEdit{{ $gejala->kode_gejala }}">Edit</button>
                                    <br />
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#modalHapus{{ $gejala->kode_gejala }}"
                                        style="margin-top: 10px">Hapus</button>
                                </td>
                            </tr>


                            {{-- modal edit --}}
                            <div class="modal fade" id="modalEdit{{ $gejala->kode_gejala }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> --}}
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ action('GejalaController@update', $gejala->kode_gejala) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method("PATCH")
                                                <div class="form-group">
                                                    <label for="namaGejala">Permasalahan</label>
                                                    <input type="text" name="nama_gejala" class="form-control" id="keluhan"
                                                        placeholder="Masukkan Keluhan" value="{{ $gejala->nama_gejala }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Solusi">Solusi</label>
                                                    <textarea name="solusi" class="form-control" id="solusi"
                                                        rows="3">{{ $gejala->solusi }}</textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        id="simpan">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- modal hapus --}}
                            <div class="modal fade" id="modalHapus{{ $gejala->kode_gejala }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ action('GejalaController@destroy', $gejala->kode_gejala) }}"
                                                method="POST" id="hapusFrom">
                                                @method("DELETE")
                                                {{ csrf_field() }}
                                                <center>
                                                    <h3>
                                                        <p>Apakah anda yakin ingin menghapus ini
                                                            {{ $gejala->nama_gejala }} ?????
                                                        </p>
                                                    </h3>
                                                </center>
                                                <center>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <input type="submit" class="btn btn-danger" id="tombolHapus">
                                                </center>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                {{ $gejalas->links() }}
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> --}}
                </div>
                <div class="modal-body">
                    <form action="{{ action('GejalaController@store') }}" method="POST" id="tambahFrom">
                        @csrf
                        <div class="form-group">
                            <label for="nama_gejala">Keluhan</label>
                            <input type="text" name="nama_gejala" class="form-control" id="keluhan"
                                placeholder="Masukkan Keluhan">
                        </div>
                        <div class="form-group">
                            <label for="Solusi">Solusi</label>
                            <textarea name="solusi" class="form-control" id="solusi" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(2500, 0).slideUp(2500, function() {
                    $(this).remove();
                })
            })
        })

    </script>
@endsection
