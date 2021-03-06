@extends('layouts.app')

@section('content')
<script>
    $(document).ready(function(){
  $(".rate").click(function(){
    $("#rate").modal();
  });
});
</script>

@if (\Session::has('success'))
<div class="alert alert-success">
    <ul>
        {!! \Session::get('success') !!}
    </ul>
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card my-5 text-center bg-lightblue d-flex align-items-stretch">
                <div class="card-header bg-dark">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a href="#wait_confirm" class="nav-link active a-ijo" id="wait-tab" data-toggle="tab"
                                role="tab" aria-controls="wait" aria-selected="true">Menunggu Konfirmasi</a>
                        </li>
                        <li class="nav-item">
                            <a href="#active_book" class="nav-link a-ijo" id="confirm-tab" data-toggle="tab" role="tab"
                                aria-controls="active" aria-selected="false">Pemesanan Aktif</a>
                        </li>
                        <li class="nav-item">
                            <a href="#history" class="nav-link a-ijo" id="history-tab" data-toggle="tab" role="tab"
                                aria-controls="history" aria-selected="false">Pemesanan Selesai</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="wait_confirm" role="tabpanel"
                            aria-labelledby="wait-tab">
                            @if($histories_wait->count() > 0)
                            @foreach ($histories_wait as $history)
                            <div class="form-group">
                                <div class="card my-5">
                                    <div class="card-body">
                                        <div class="row mx-1">
                                            <div class="col-9">
                                                <p class="text-left">
                                                    <img class="card-img" style="width: 300px"
                                                        src="{{$history->hotel->photo}}"
                                                        alt="{{$history->hotel->photo}}">
                                                    <br><br><strong>
                                                        {{$history->hotel->name}}
                                                        <br>
                                                        {{$history->room->name}}</strong>
                                                    <br>
                                                    <br>
                                                    <span
                                                        class="badge badge-light txt-lightblack text-uppercase transparent"><i
                                                            class="fas fa-map-marker-alt mr-1"></i>{{ $history->hotel->alamat->kota->namaKota }},
                                                        {{ $history->hotel->alamat->provinsi->namaProvinsi }}</span>
                                                    <br>
                                                    {{$history->hotel->alamat->detailLengkap}}
                                                    <br>
                                                    <div class="d-flex align-items-end">
                                                        <h5><span
                                                                class="badge badge-primary txt-lightblack text-uppercase transparent">
                                                                {{ date_format(date_create($history->checkIn), "j F Y") }}
                                                                -
                                                                {{ date_format(date_create($history->checkOut), "j F Y") }}
                                                            </span></h5>
                                                    </div>
                                                    <br>
                                                    <div class="d-flex align-items-end">
                                                        <form action="/history/{{$history->id}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-light">
                                                                Detail Pemesanan
                                                            </button>
                                                        </form>
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else

                            <div class="form-group">
                                <h5 class="text-muted my-2">Belum Ada Riwayat Pemesanan</h5>
                                <h6 class="text-muted my-2">Nginep? Hotelinn aja!</h6>
                            </div>
                            @endif

                        </div>


                        <div class="tab-pane fade" id="active_book" role="tabpanel" aria-labelledby="confirm-tab">
                            @if($histories_confirm->count() > 0)
                            @foreach ($histories_confirm as $history)
                            <div class="form-group">
                                <div class="card my-5">
                                    <div class="card-body">
                                        <div class="row mx-1">
                                            <div class="col-9">
                                                <p class="text-left">
                                                    <img class="card-img" style="width: 300px"
                                                        src="{{$history->hotel->photo}}"
                                                        alt="{{$history->hotel->photo}}">
                                                    <br><br><strong>
                                                        {{$history->hotel->name}}
                                                        <br>
                                                        {{$history->room->name}}</strong>
                                                    <br>
                                                    <br>
                                                    <span
                                                        class="badge badge-light txt-lightblack text-uppercase transparent"><i
                                                            class="fas fa-map-marker-alt mr-1"></i>{{ $history ->hotel->alamat->kota->namaKota }},
                                                        {{ $history->hotel->alamat->provinsi->namaProvinsi }}</span>
                                                    <br>
                                                    {{$history->hotel->alamat->detailLengkap}}
                                                    <br>
                                                    <div class="d-flex align-items-end">
                                                        <h5><span
                                                                class="badge badge-primary txt-lightblack text-uppercase transparent">
                                                                {{ date_format(date_create($history->checkIn), "j F Y") }}
                                                                -
                                                                {{ date_format(date_create($history->checkOut), "j F Y") }}
                                                            </span></h5>
                                                    </div>
                                                    <br>
                                                    <div class="d-flex align-items-end">
                                                        <form action="/history/{{$history->id}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-light">
                                                                Detail Pemesanan
                                                            </button>
                                                        </form>
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="form-group">
                                <h5 class="text-muted my-2">Belum Ada Pemesanan Aktif</h5>
                                <h6 class="text-muted my-2">Nginep? Hotelinn aja!</h6>
                            </div>
                            @endif

                        </div>

                        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                            @if($histories_finish->count() > 0)
                            @foreach ($histories_finish as $history)
                            <div class="form-group">
                                <div class="card my-5">
                                    <div class="card-body">
                                        <div class="row mx-1">
                                            <div class="col-9">
                                                <p class="text-left">
                                                    <img class="card-img" style="width: 300px"
                                                        src="{{$history->hotel->photo}}"
                                                        alt="{{$history->hotel->photo}}" />
                                                    <br><br><strong>
                                                        {{$history->hotel->name}}
                                                        <br>
                                                        {{$history->room->name}}</strong>
                                                    <br>
                                                    <br>
                                                    <span
                                                        class="badge badge-light txt-lightblack text-uppercase transparent"><i
                                                            class="fas fa-map-marker-alt mr-1"></i>{{ $history->hotel->alamat->kota->namaKota }},
                                                        {{ $history->hotel->alamat->provinsi->namaProvinsi }}</span>
                                                    <br>
                                                    {{$history-> hotel -> alamat -> detailLengkap}}
                                                    <br>
                                                    <div class="d-flex align-items-end">
                                                        <h5><span
                                                                class="badge badge-primary txt-lightblack text-uppercase transparent">
                                                                {{ date_format(date_create($history->checkIn), "j F Y") }}
                                                                -
                                                                {{ date_format(date_create($history->checkOut), "j F Y") }}
                                                            </span></h5>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <div class="d-flex align-items-end">
                                                                <form action="/history/{{$history->id}}" method="post">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-light">
                                                                        Detail Pemesanan
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        @if ($history->rating != NULL)
                                                        <div class="col-sm">
                                                            <div class="d-flex align-items-end">
                                                                <button type="button" class="btn btn-secondary"
                                                                    disabled>Penilaian Sudah Diberikan</button>
                                                            </div>
                                                        </div>
                                                        @elseif ($history->rating == NULL)
                                                        <div class="col-sm">
                                                            <div class="d-flex align-items-end">
                                                                <button type="button" id="{{ $history->id }}"
                                                                    class="btn btn-primary rate">Berikan Penilaian</button>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="form-group">
                                <h5 class="text-muted my-2">Belum Ada Riwayat Pemesanan</h5>
                                <h6 class="text-muted my-2">Nginep? Hotelinn aja!</h6>
                            </div>
                            @endif
                        </div>
                    </div>
                    <a href="/" class="btn btn-primary my-3"><i class="fas fa-chevron-left mr-2"></i>Kembali</a>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<div class='modal fade' id='rate' role='dialog'>
    <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class='modal-body'>
                <div class="container">
                    <div class="justify-content-center">
                        <div class="col-md-14 pb-5">
                            <h3><strong>Beri Penilaian</strong></h3>
                            <div class="h5 text-muted">Bagaimana pengalamanmu nginep dengan hotelinn?</div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Isi bintang untuk memberikan penilaian</h5><br>
                                    <div class="row justify-content-center" id="ratings">
                                        <span class="far fa-star" style="font-size:48px"></span>
                                        <span class="far fa-star" style="font-size:48px"></span>
                                        <span class="far fa-star" style="font-size:48px"></span>
                                        <span class="far fa-star" style="font-size:48px"></span>
                                        <span class="far fa-star" style="font-size:48px"></span>
                                    </div>
                                    <form action="/historyRating" method="post">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" id="ratingValue" name="ratingValue">
                                            <input type="hidden" id="historyId" name="historyId">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end pr-3">
                    <button type='submit' data-dismiss="modal" class='btn btn-warning mr-3'>Batal</button>
                    <button type='submit' name='add' class='btn btn-primary'>Nilai</button>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>

<script>
    const stars = document.querySelector("#ratings").children;
    const ratingValue = document.querySelector("#ratingValue");
    // console.log(stars)

    for(let i=0;i<stars.length;i++){
        stars[i].addEventListener("mouseover",function(){
            for(let j=0;j<stars.length;j++){
                stars[j].classList.remove("fas");
                stars[j].classList.add("far");
            }
            for(let j=0;j<=i;j++){
                stars[j].classList.remove("far");
                stars[j].classList.add("fas");
            }
        })
        stars[i].addEventListener("mouseover",function(){
            ratingValue.value=i+1;
        })
    }
</script>

<script>
    $(document).on("click", ".rate",function() {
        var id = $(this).attr("id");
        // console.log(id);

        document.getElementById("historyId").value = id;
})

</script>

@endsection

