@foreach ($kegiatan as $keg)
<head>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

</head>

<div class="col-md-6">
    <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    asu
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{$keg->namaAcara}}</h4>
                    <p class="card-text"><i class="fas fa-table"></i> {{$keg->tanggalAcara}}</p>
                    <div class="row">
                        <div class="col-md-4">
                        @if ($keg->status == 0)
                            <span class="badge badge-warning">Belum di approve</span>
                        @else
                            <span class="badge badge-success">Approved</span>
                        @endif
                        </div>
                        {{-- <div class="col-md-8">
                            <i class="fas fa-money-bill-alt"></i> <div class="numeralAnggaran">{{$keg->anggaran}}</div>
                        </div> --}}
                    </div>
                    <button type="button" class="btn btn-primary float-right ml-2">View</button>
                    <button type="button" class="btn btn-primary float-right">Edit</button>
                </div>
            </div>
    </div>
</div>
@endforeach
