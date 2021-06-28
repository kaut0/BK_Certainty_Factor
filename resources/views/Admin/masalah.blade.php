@extends('Admin.layout.master')


@section('title', 'Admin')

@section('judul_halaman', 'Gejala')

@section('isi2')

    <div class="container">
        {{-- pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
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
                    <li>{!! \Session::get('delete') !!}</li>
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
                            <th scope="col">No</th>
                            <th scope="col">Gejala</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($masalahs as $item)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->penyebab }}</td>
                                <td><button type="button" class="btn btn-outline-success" data-toggle="modal"
                                        data-target="#modalEdit{{ $item->kode_masalah }}">Edit</button>
                                    <br />
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#modalHapus{{ $item->kode_masalah }}"
                                        style="margin-top: 10px">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                        {{-- modal edit --}}
                        <div class="modal fade" id="modalEdit{{ $item->kode_masalah }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('GejalaEdit', $item->kode_masalah) }}" method="POST"
                                            id="tambahFrom">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label for="nama_gejala">Gejala</label>
                                                <input type="text" name="nama_gejala" class="form-control" id="keluhan"
                                                    placeholder="Masukkan Keluhan" value="{{ $item->penyebab }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal hapus --}}
                        <div class="modal fade" id="modalHapus{{ $item->kode_masalah }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('GejalaHapus', $item->kode_masalah) }}" method="POST"
                                            id="hapusFrom">
                                            @method("DELETE")
                                            {{ csrf_field() }}
                                            <center>
                                                <h3>
                                                    <p>Apakah anda yakin ingin menghapus ini {{ $item->penyebab }} ?????
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
                </table>
                {{ $masalahs->links() }}
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
                    <form action="{{ route('GejalaInsert') }}" method="POST" id="tambahFrom">
                        @csrf
                        <div class="form-group">
                            <label for="nama_gejala">Gejala</label>
                            <input type="text" name="nama_gejala" class="form-control" id="keluhan"
                                placeholder="Masukkan Keluhan">
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
            window.setTimeout(function () {
                $('.alert').fadeTo(2500, 0).slideUp(2500, function(){
                    $(this).remove();
                });
            });
        });
    </script>    
@endsection
