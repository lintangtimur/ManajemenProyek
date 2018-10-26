<div class="col-md-12">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-5">
            <div class="card" >
                <div class="row">
                    <div class="col-md-3 text-center" style="background-color:greenyellow;">
                        <div id="contentCard">
                            <div>20</div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        
                        <small class="text-muted float-right mt-2"><div data-placement="right" title="1 Bulan lalu">Last Acc: 20 September 2018</div></small>
                        <div class="card-body">
                                <span class="badge badge-success mt-2">Approved</span>
                            <h4 class="card-title" style="color:#868bc2;">Proposal Approved</h4>
                            <span class="badge badge-primary">History</span>
                            <p class="card-text">Proposal yang telah di diterima</p>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title">Title</h4>
            <table class="table table-inverse table-responsive">
                <thead class="thead-default">
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Tema Acara</th>
                        <th>Waktu Acara</th>
                        <th>Tempat Acara</th>
                        <th>Penyelenggara</th>
                        <th>Anggaran</th>
                        <th>Proposal</th>
                        <th width="15%;">Status</th>
                        <th>Komentar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->namaAcara}}</td>
                            <td>{{$item->temaAcara}}</td>
                            <td>{{$item->tanggalAcara}}</td>
                            <td>{{$item->tempatAcara}}</td>
                            <td>{{$item->username}}</td>
                            <td>{{
                                $hasil_rupiah = "Rp " . number_format($item->anggaran,2,',','.')
                            }}</td>
                            {{-- <td><a href="{{Storage::url($item->pathFile)}}">{{$item->fileName}}</a></td> --}}
                            <td><a href="{{Storage::url($item->pathFile)}}" data-placement="right" title="Download {{$item->fileName}}">Download</a></td>
                            <td>
                                {{-- <button type="button" class="btn btnValidate btn-success" data-acara="{{$item->id}}"><i class="far fa-check-circle"></i></button> --}}
                                <a href="#"><i style="color:green;" class="btnValidate far fa-check-circle fa-lg" data-acara="{{$item->id}}" data-placement="right" title="Klik untuk ACC Proposal"></i></a>
                                <a href="#"><i style="color:red;"class="btnDecline fas fa-ban fa-lg" data-placement="right" title="Klik untuk menolak Proposal"></i></a>
                                {{-- <button type="button" class="btn btnDecline btn-danger" data-acara="{{$item->id}}">DEC</button> --}}
                            </td>
                        <td><button type="button" class="btn btn-primary"><i class="fas fa-envelope-square"></i> Add Comment</button></td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            {{-- <p class="card-text">Text</p> --}}
        </div>
    </div>
</div>