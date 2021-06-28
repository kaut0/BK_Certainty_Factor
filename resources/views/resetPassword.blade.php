@extends('layout.master')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('registration') }}/assets/css/style.css">
@endsection

@section('isi')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifikasi E-mail Address</div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('A fresh verification link has been sent to your email address.') }}
                       </div>
                   @endif
                   <a href="http://127.0.0.1:8000/reset/{{$token}}">Click Here</a>.
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('registration') }}/assets/js/script.js"></script>
@endsection
