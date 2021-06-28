@extends('Admin.layout.master')


@section('title', 'Penyebab')

@section('judul_halaman', 'Basis Pengetahuan')

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


        <br>
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
                            <th scope="col">Permasalahan</th>
                            <th scope="col">Penyebab</th>
                            <th scope="col">Faktor Kepastian</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($penyebabs as $penyebab)

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $penyebab->Gejala->nama_gejala }}</td>
                                <td>{{ $penyebab->penyebab }}</td>
                                <td>{{ $penyebab->cf }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                        data-target="#modalEdit{{ $penyebab->kode_penyebab }}">Edit</button>
                                    <br />
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#modalHapus{{ $penyebab->kode_penyebab }}"
                                        style="margin-top: 10px">Hapus</button>
                            </tr>
                            {{-- modal hapus --}}
                            <div class="modal fade" id="modalHapus{{ $penyebab->kode_penyebab }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('hapusPenyebab', $penyebab->kode_penyebab) }}"
                                                method="POST" id="hapusFrom">

                                                @method("DELETE")
                                                {{ csrf_field() }}

                                                <center>
                                                    <h3>
                                                        <p>Apakah anda yakin ingin menghapus ini
                                                            {{ $penyebab->penyebab }} ?????
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

                            <div class="modal fade" id="modalEdit{{ $penyebab->kode_penyebab }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                                action="{{ action('PenyebabController@update', $penyebab->kode_penyebab) }}"
                                                method="POST" id="editModal" id="editForm">
                                                @csrf
                                                @method("PATCH")
                                                <div class="form-group">
                                                    <label for="permasalahan">Masalah Siswa</label>
                                                    {{-- <input type="text" name="penyebab" class="form-control" id="penyebab" placeholder="Masukkan Penyebab"> --}}
                                                    <select class="form-control" name="permasalahan" id="permasalahan"
                                                        type="text">
                                                        <option value="{{ $penyebab->Gejala->kode_gejala }}">
                                                            {{ $penyebab->Gejala->nama_gejala }}</option>
                                                        @foreach ($gejalas as $gejala)
                                                            <option value="{{ $gejala->kode_gejala }}">
                                                                {{ $gejala->nama_gejala }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="penyebab">Gejala</label>
                                                    {{-- <input type="text" name="penyebab" class="form-control" id="penyebab" placeholder="Masukkan Penyebab"> --}}
                                                    <select class="form-control" name="penyebab" id="penyebab">
                                                        <option value="{{ $penyebab->penyebab }}">
                                                            {{ $penyebab->penyebab }}
                                                        </option>
                                                        @foreach ($masalahs as $masalah)
                                                            <option value="{{ $masalah->penyebab }}">
                                                                {{ $masalah->penyebab }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="cf">cf</label>
                                                    <select name="cf" class="form-control" id="cf"
                                                        placeholder="Masukkan cf">
                                                        <option value="">Masukkan Nilai Kepastian</option>
                                                        <option value="0.2">Tidak Tahu</option>
                                                        <option value="0.4">Mungkin</option>
                                                        <option value="0.6">Kemungkinan Besar</option>
                                                        <option value="0.8">Hampir Yakin</option>
                                                        <option value="1.0">Sangat Yakin</option>
                                                    </select>
                                                    {{-- <input type="text" name="cf" class="form-control" id="cf" placeholder="Masukkan cf"> --}}
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label for="cf">cf</label>
                                                    <input type="text" name="cf" class="form-control" id="cf"
                                                        placeholder="Masukkan cf" value="{{$penyebab->cf}}">
                                                </div> --}}
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
                        @endforeach
                    </tbody>
                </table>
                {{ $penyebabs->links() }}

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
                    <form action="{{ route('inputData') }}" method="POST" id="tambahFrom">
                        @csrf
                        {{-- <div class="form-group">
                            <label for="penyebab">Penyebab</label>
                            <input type="text" name="penyebab" class="form-control" id="penyebab"
                                placeholder="Masukkan Penyebab">
                        </div> --}}
                        <div class="form-group">
                            <label for="permasalahan">Masalah S</label>

                            {{-- <input type="text" name="penyebab" class="form-control" id="penyebab" placeholder="Masukkan Penyebab"> --}}
                            <select class="form-control" name="permasalahan" id="permasalahan">
                                <option value="">-----Pilih Masalah-----------</option>
                                @foreach ($gejalas as $gejala)
                                    <option value="{{ $gejala->kode_gejala }}">{{ $gejala->nama_gejala }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="penyebab">Gejala</label>
                            {{-- <input type="text" name="penyebab" class="form-control" id="penyebab" placeholder="Masukkan Penyebab"> --}}
                            <select class="form-control" name="penyebab" id="penyebab">
                                <option value="">-----Pilih Masalah-----------</option>
                                @foreach ($masalahs as $masalah)
                                    <option value="{{ $masalah->penyebab }}">{{ $masalah->penyebab }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cf">cf</label>
                            <select name="cf" class="form-control" id="cf" placeholder="Masukkan cf">
                                <option value="">Masukkan Nilai Kepastian</option>
                                <option value="0.2">Tidak Tahu</option>
                                <option value="0.4">Mungkin</option>
                                <option value="0.6">Kemungkinan Besar</option>
                                <option value="0.8">Hampir Yakin</option>
                                <option value="1.0">Sangat Yakin</option>
                            </select>
                            {{-- <input type="text" name="cf" class="form-control" id="cf" placeholder="Masukkan cf"> --}}
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
