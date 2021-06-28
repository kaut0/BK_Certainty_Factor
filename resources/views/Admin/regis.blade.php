@extends('Admin.layout.master')

@section('title', 'TambahAnggota')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('registration') }}/assets/css/style.css">
@endsection

@section('isi2')
    <div class="container">

        {{-- pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Maaf</strong> Ada Masalah dalam penginputan<br><br>
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
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($all as $penyebab)

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $penyebab->name }}</td>
                                <td>{{ $penyebab->email }}</td>
                                <td>{{ $penyebab->password }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#modalHapus{{ $penyebab->id }}"
                                        style="margin-top: 10px">Hapus</button>
                            </tr>
                            {{-- modal hapus --}}
                            <div class="modal fade" id="modalHapus{{ $penyebab->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('delete', $penyebab->id) }}" method="POST"
                                                id="hapusFrom">

                                                @method("DELETE")
                                                {{ csrf_field() }}

                                                <center>
                                                    <h3>
                                                        <p>Apakah anda yakin ingin menghapus ini
                                                            {{ $penyebab->name }} ?????
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
                {{-- {{ $all->links() }} --}}
            </div>
        </div>

        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('Regis') }}" method="POST" id="tambahFrom">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control {{ $errors->has('name' ? 'is-invalid' : '') }}"
                                    id="name" placeholder="name" name="name" required autofocus
                                    value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control {{ $errors->has('email' ? 'is-invalid' : '') }}"
                                    id="email" placeholder="email" name="email" value="{{ old('email') }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="level">Example select</label>
                                <select class="form-control" id="level" name="level">
                                    <option value="admin">Admin</option>
                                    <option value="guru">Guru</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control item" id="password" placeholder="Password"
                                    name="password">
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
    </div>
@endsection

@section('js')
    <script src="{{ asset('registration') }}/assets/js/script.js"></script>

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
