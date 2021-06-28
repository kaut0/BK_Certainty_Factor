@extends('layout.master')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('registration') }}/assets/css/style.css">
@endsection

@section('isi')
    <h1>halo {{$user->name}}</h1>

    <p>Mohon klik reset password untuk mengatur ulang password anda</p>
    <a href="{{url('reset_password/'.$user->email.'/'.$code)}}"></a>
@endsection