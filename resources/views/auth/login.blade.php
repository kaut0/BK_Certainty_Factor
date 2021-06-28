@extends('layout.master')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('registration') }}/assets/css/style.css">
@endsection

@section('isi')
    @if (Session::has('pesan'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('pesan') !!}</li>
            </ul>
        </div>
    @endif
    <div class="registration-form">
        <form action="{{ route('Masuk') }}" method="POST">
            @csrf
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="username" placeholder="Username" name="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Password" name="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Login</button>
            </div>
        {{-- <center><a href="LupaPassword" style="color: blue"><span><u>Lupa Password</u></span></a></center> --}}
        </form>
    </div>
@endsection

@section('js')
    {{-- <script src="{{ asset('registration') }}/assets/js/script.js"></script> --}}
    {{-- <script>
        $(document).ready(function(){
            widow.setTimeout(function() {
                $(".alert").fadeTo(2500, 0).slideUp(2500, function() {
                    $(this).remove();
                });   
            });
        });
    </script> --}}
@endsection
