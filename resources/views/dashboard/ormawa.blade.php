@foreach ($kegiatan as $keg)
<div class="col-md-6">
    <div class="jumbotron">
        @if ($keg->status == 0)
        <button type="button" class="btn btn-danger mb-2 btnRevisiacara" data-toggle="collapse" data-revisiacara="{{$keg->id}}" data-target="#revisiCollapse-{{$keg->id}}" aria-expanded="false" aria-controls="revisiCollapse">
            <i class="fas fa-exclamation-triangle"></i> Catatan Revisi
        </button>

        <div class="collapse" id="revisiCollapse-{{$keg->id}}">
            <div class="alert alert-danger" role="alert">            
            <h4 class="alert-heading judulrevisi-{{$keg->id}}"></h4>
            
            <p class="revisicomment-{{$keg->id}}">
            </p>
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                NASM
            </div>
            <div class="card-body">
                <h4 class="card-title">{{$keg->namaAcara}}</h4>
                <p class="card-text"><i class="fas fa-table"></i> {{$keg->tanggalAcara->format('d M Y')}}</p>
                <div class="row">
                    <div class="col-md-4">
                    @if ($keg->status == 0)
                        <span class="badge badge-warning">Belum di approve</span>
                    @else
                        <span class="badge badge-success">Approved</span>
                    @endif
                    </div>
                </div>
                <button type="button" class="btn btn-primary float-right ml-2">View</button>
                @if ($keg->status == 0)
                <button type="button" class="btn btn-primary float-right btnEditOrmawa" data-toggle="modal" data-target="#exampleModal" data-acaraedit="{{$keg->id}}">Edit</button>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="kegiatan/upload" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="card-body">
                <h4 class="card-title">Edit Acara</h4>
                <div class="form-group">
                    <label for="namaAcara">Nama Acara</label>
                    <input type="text" name="namaAcara" id="namaAcara" class="form-control" placeholder="masukkan nama acara">
                </div>
                <div class="form-group">
                    <label for="temaAcara">Tema Acara</label>
                    <input type="text" name="temaAcara" id="temaAcara" class="form-control" placeholder="masukkan tema acara">
                </div>
                <div class="form-group">
                    <label for="tanggalAcara">Tanggal Acara</label>
                    <input type="date" name="tanggalAcara" id="tanggalAcara" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tempatAcara">Tempat Acara</label>
                    <input type="text" name="tempatAcara" id="tempatAcara" class="form-control">
                </div>
                <div class="form-group">
                    <label for="berkasAcara">Upload Proposal Acara</label>
                    <input type="file" name="berkasAcara" id="berkasAcara" class="form-control">
                    <small class="text-muted">Maximum upload berkas 2MB</small>
                </div>
                <div class="form-group">
                    <label for="anggaranAcara">Anggaran Acara</label>
                    <input type="text" name="anggaranAcara" id="anggaranAcara" class="form-control">
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