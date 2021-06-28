@extends('layout.master')

@section('title', 'Home')

@section('isi')
    {{-- <div class="container">
        
    </div> --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('gambar\smp4.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('gambar\smp41.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('gambar\smp412.jpg') }}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>

    {{-- <div class="row-lg-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Daftar Permasalahan</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nulla iusto dolorum officiis quae nihil, eum
                        vel officia magnam quibusdam totam obcaecati dolores? Vitae, similique fugit quia veniam quis asperiores.
                    </p>
                    <a href="daftarKeluhan"><button type="button" class="btn btn-primary">Permasalahan</button></a>
                </div>
                <div class="col-lg-6">
                    <h2>Konseling</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nulla iusto dolorum officiis quae nihil, eum
                        vel officia magnam quibusdam totam obcaecati dolores? Vitae, similique fugit quia veniam quis asperiores.
                    </p>
                    <a href="Konseling"><button type="button" class="btn btn-primary">Konseling</button></a>
                </div>
            </div>
        </div>   
    </div> --}}

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h2>Daftar Permasalahan</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nulla iusto dolorum officiis quae
                        nihil, eum
                        vel officia magnam quibusdam totam obcaecati dolores? Vitae, similique fugit quia veniam quis
                        asperiores.
                    </p>
                    <a href="daftarKeluhan"><button type="button" class="btn btn-primary">Permasalahan</button></a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h2>Konseling</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nulla iusto dolorum officiis quae
                        nihil, eum
                        vel officia magnam quibusdam totam obcaecati dolores? Vitae, similique fugit quia veniam quis
                        asperiores.
                    </p>
                    <a href="Konseling"><button type="button" class="btn btn-primary">Konseling</button></a>
                </div>
            </div>
            <script id="cid0020000283097710001" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js"
                style="width: 237px;height: 345px;">
                {
                    "handle": "bimbingankonseling",
                    "arch": "js",
                    "styles": {
                        "a": "0084EF",
                        "b": 100,
                        "c": "FFFFFF",
                        "d": "FFFFFF",
                        "k": "0084EF",
                        "l": "0084EF",
                        "m": "0084EF",
                        "n": "FFFFFF",
                        "p": "10",
                        "q": "0084EF",
                        "r": 100,
                        "fwtickm": 1
                    }
                }
            </script>
        </div>
        {{-- <div class="d-inline-flex justify-content-end">
            <div class="d-flex flex-row justify-content-around">
                
            </div>
            <div class="d-flex flex-row">
                <script id="cid0020000283097710001" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js"
                    style="width: 237px;height: 345px;">
                    {
                        "handle": "bimbingankonseling",
                        "arch": "js",
                        "styles": {
                            "a": "0084EF",
                            "b": 100,
                            "c": "FFFFFF",
                            "d": "FFFFFF",
                            "k": "0084EF",
                            "l": "0084EF",
                            "m": "0084EF",
                            "n": "FFFFFF",
                            "p": "10",
                            "q": "0084EF",
                            "r": 100,
                            "fwtickm": 1
                        }
                    }

                </script>
            </div>
        </div> --}}
    @endsection
