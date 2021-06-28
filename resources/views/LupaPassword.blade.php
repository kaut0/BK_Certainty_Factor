@extends('layout.master')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('registration') }}/assets/css/style.css">
@endsection

@section('isi')
    <div class="registration-form">
        <form action="{{route('lupaPassword')}}" method="POST">
            @csrf
            @if (session('pesan'))
                <div>
                    {{session('pesan')}}
                </div>
            @endif
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="name" placeholder="Masukkan E-mail Anda" name="name">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Kirim</button>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('registration') }}/assets/js/script.js"></script>
@endsection
