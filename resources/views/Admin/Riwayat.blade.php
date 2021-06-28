@extends('Admin.layout.master')


@section('title', 'Admin')

@section('judul_halaman', 'DashBoard Admin')

@section('isi2')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Permasalahan</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indexs as $histori)
                            <tr>
                                <td>{{ $histori->nama }}</td>
                                <td>{{ $histori->kelas }}</td>
                                <td>{{ $histori->permasalahan }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#modalHapus{{ $histori->id }}"
                                        style="margin-top: 10px">Hapus</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="#modalHapus{{ $histori->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('hapusRiwayat', $histori->id) }}" method="POST"
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
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                {{ $indexs->links() }}
            </div>
        </div>
    </div>
@endsection
