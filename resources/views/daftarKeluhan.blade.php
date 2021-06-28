@extends('layout.master')

@section('title','Home')

@section('isi')
    <div class="container">
        
        <br>
        
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Kode</th>
                <th scope="col">Keluhan</th>
                <th scope="col">Solusi</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($gejalas as $keluhan)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $keluhan->nama_gejala }}</td>
                    <td>{{ $keluhan->solusi }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{ $gejalas->links() }}
    </div>>
    </div>
@endsection


@section('js')
@endsection