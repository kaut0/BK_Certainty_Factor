@extends('layout.master')

@section('title', 'Home')

@section('isi')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('ProsesKonseling') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Nama">Nama</label>
                    <input type="text" class="form-control" id="Nama" placeholder="Masukkan Nama" name="nama">
                </div>

                <div class="form-group">
                    <label for="Kelas">Kelas</label>
                    <input type="text" class="form-control" id="Kelas" placeholder="Masukkan Kelas" name="kelas">
                </div>
                <div class="form-group">
                    <div id="carouselExampleIndicators" class="carousel slide" data-interval='false'>
                        <div class="carousel-inner">
                            <?php
                            $i = 0;
                            foreach ($penyebabs as $sebab): ?>
                            <?php if ($i == 0) {
                            $set_ = 'active';
                            } else {
                            $set_ = '';
                            } ?>
                            <div class="carousel-item <?php echo $set_; ?>">
                                <img class="d-block w-100" src="{{ asset('gambar/hitam.jpg') }}" alt="First slide">
                                <div class="carousel-caption">
                                    {{-- <h5>Apakah Anda Merasa {{ $sebab->penyebab }} ???</h5>
                                    <input type="checkbox" name="Penyebab[]" class="klik-{{$sebab->kode_penyebab}}"
                                        value="{{ $sebab->kode_penyebab }}" data-id="{{$sebab->kode_penyebab}}">
                                    <label for="flexCheckDefault" class="form-check-label">
                                        centang jika anda merasa memiliki gejala ini
                                    </label>
                                    <div id="cf-{{$sebab->kode_penyebab}}">
                                        <select name="inputUser[]" id="#" placeholder="Masukkan cf" class="form-control">
                                            <option value="">Seberapa yakin anda</option>
                                            <option value="0.2">Tidak Tahu</option>
                                            <option value="0.4">Mungkin</option>
                                            <option value="0.6">Kemungkinan Besar</option>
                                            <option value="0.8">Hampir Yakin</option>
                                            <option value="1.0">Sangat Yakin</option>
                                        </select>
                                    </div> --}}
                                    <table class="table">
                                        <tr>
                                            <td class="task-description-toggel" data-id="{{ $sebab->kode_penyebab }}">
                                                <input type="checkbox" name="Penyebab[]"
                                                    class="klik-{{ $sebab->kode_penyebab }}"
                                                    value="{{ $sebab->kode_penyebab }}"
                                                    data-id="{{ $sebab->kode_penyebab }}">
                                            </td>
                                            <td>
                                                Apakah Anda Merasa {{ $sebab->penyebab }}
                                            </td>
                                        </tr>
                                        <tr class="d-none" id="task-description-{{$sebab->kode_penyebab}}">
                                            <td colspan="2">
                                                <select name="inputUser[]" id="#" placeholder="Masukkan cf"
                                                    class="form-control">
                                                    <option value="">Seberapa yakin anda</option>
                                                    <option value="0.2">Tidak Tahu</option>
                                                    <option value="0.4">Mungkin</option>
                                                    <option value="0.6">Kemungkinan Besar</option>
                                                    <option value="0.8">Hampir Yakin</option>
                                                    <option value="1.0">Sangat Yakin</option>
                                                </select>
                                            </td>
                                            
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php $i++;endforeach;
                            ?>
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
                </div>
                <center>
                    <button type="submit" class="btn btn-primary">Proses</button>
                </center>
                <br>
            </form>
        </div>
    </div>
    <br>

@endsection
@section('js')
    <script type="text/javascript">
        // $(document).ready(function() {
        //     $("#cf-" + $(this).data('id')).hide();
        //     $(".klik").change(function() {
        //         if ($(this).is(":checked")) {
        //             $("#cf").show();
        //         } else {
        //             $("#cf").hide();
        //         }
        //     });
        // });

        $(function() {
           $('.task-description-toggel').click(function(){
               $('#task-description-'+$(this).data('id')).toggleClass('d-none');
           }); 
        });

    </script>
@endsection
