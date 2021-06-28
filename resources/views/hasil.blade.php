@extends('layout.master')

@section('title', 'Home')
@section('isi')
   

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-3 shadow-lg border-0 mb-4 bg-white-round">
                    <div class="card-header border-0 bg-info">Hasil Sistem Pakar</div>
                    <div class="card-body">
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-10">
                                    <p>Permasalahan : {{$hasil->hasil_pakar->Permasalahan}}</p>
                                    <p>Solusi : {{$hasil->hasil_pakar->Solusi}}</p>
                                    <p>Persentase : {{$hasil->hasil_pakar->Hitung * 100 }} %</p>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                    @foreach ($hasil->list_case as $list_case)
                        <div class="card p-3 shadow-lg border-0 mb-4 bg-white-round">
                            <div class="card-header border-0 bg-info">Hasil Perhitungan</div>
                            <div class="card-body">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            @foreach ($list_case as $item)
                                               <p>{{$item}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
