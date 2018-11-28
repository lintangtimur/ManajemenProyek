<head>
    <style>
        .hilang{
            visibility: visible;
        }
    @media only screen and (max-width:414px){
        .hilang{
            visibility: hidden;
        }
        .naik{
            margin-top:-300px;
            margin-left:-70px;
            margin-bottom:10px;
            margin-right:-20px;
        }
    }
    @media only screen and (max-width:360px){
        .hilang{
            visibility: hidden;
        }
        .naik{
            margin-top:-320px;
            margin-left:-70px;
            margin-bottom:10px;
            margin-right:-20px;
            
        }
    }   
    }
    </style>
</head>
<div class="col-md-12">
<div class="hilang">
    <h1>Dashboard</h1>
    <div class="row"> 
        <div class="col-md-5">   
            <div class="card" >       
                <div class="row">             
                    <div class="col-md-3 text-center" style="background-color:greenyellow;">
                        <div id="contentCard">
                        <div>{{$totalApproved}}</div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        
                        <small class="text-muted float-right mt-2"><div data-placement="right" title="1 Bulan lalu">Terakhir Acc: 20 September 2018</div></small>
                        <div class="card-body">
                                <span class="badge badge-success mt-2">Approved</span>
                            <h4 class="card-title" style="color:#868bc2;">Proposal Approved</h4>
                            <a href="#" id="linkDosenHistory" class="badge badge-primary"><i class="fas fa-history"></i> History</a>
                            <p class="card-text">Proposal yang telah di diterima</p>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="naik">
    <div class="card mt-4">
        <div class="card-body">
            <div class="flash-message">
                @if(Session::has('add-revisi-sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('add-revisi-sukses')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
            </div>

            <div class="table-responsive">
                <table class="table table-inverse" id="tDosenDashboard">
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
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                </table>
            </div>
            </div>
            

            {{-- MODAL --}}
            <div class="modal fade" id="modalDosenDecline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Catatan Komentar</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="dashboard/inputcomment" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="card-body">
                            <h4 class="card-title" id="card-title-comment">Edit Acara</h4>
                            <div class="form-group">
                                <label for="judulRevisi">Judul revisi</label>
                                <input type="hidden" name="idAcara" id="idAcara" value="">
                                <input type="text" name="judulRevisi" id="judulRevisi" class="form-control" placeholder="masukkan judul revisi">
                            </div>
                            
                            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-plus-square"></i>Tambahkan catatan revisi
                            </button>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body mt-2 border border-warning">
                                    <div class="form-group">
                                        <label for="catatanRevisi">Comment</label>
                                        <textarea class="form-control" name="catatanRevisi" id="catatanRevisi" rows="3"></textarea>
                                        <small class="text-muted">Jika tidak ada komentar kosongkan saja textarea tersebut</small>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>
        </div>
    </div>

</div>

<div class="row mt-4">
    <div class="col-md-12 kosong" id="historyView">
            <div class="card">        
                <div class="card-body">
                    <h4 class="card-title"><a data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" href="#aaa"><i class="fas fa-history" id="historyApproved"  role="button"></i> History Approved</a></h4>
                        <div class="table-responsive class="collapse" id="aaa"">
                            <table class="table table-inverse" id="tDosenHistory">
                                <thead class="thead-default">
                                    <tr>
                                        <th>Nama Kegiatan</th>
                                        <th>Tema Acara</th>
                                        <th>Waktu Acara</th>
                                        <th>Tempat Acara</th>
                                        <th>Penyelenggara</th>
                                        <th>Anggaran</th>
                                        <th>Proposal</th>
                                        <th width="15%;">Kapan Di Acc</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                            </table>
                        </div>
                </div>
            </div>
    </div>
</div>
