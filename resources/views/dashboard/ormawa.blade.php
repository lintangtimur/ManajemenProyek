@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('partial.error')
        </div>
    </div>
</div>
@foreach ($kegiatan as $keg)
<div class="col-md-6">
    <div class="jumbotron">
        @if ($keg->status == 0 && in_array($keg->id, $tampung))
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
                <button type="button" class="btn btn-primary btnViewOrmawa float-right ml-2"  data-acaraview="{{$keg->id}}">View</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="kegiatan/edit" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="card-body">
                {{-- <h4 class="card-title">Edit Acara</h4> --}}
                <div class="form-group">
                    <input type="hidden" name="edit_idacara" id="edit_idacara" value="">
                    <label for="edit_namaAcara">Nama Acara</label>
                    <input type="text" name="edit_namaAcara" id="edit_namaAcara" class="form-control" placeholder="masukkan nama acara">
                </div>
                <div class="form-group">
                    <label for="edit_temaAcara">Tema Acara</label>
                    <input type="text" name="edit_temaAcara" id="edit_temaAcara" class="form-control" placeholder="masukkan tema acara">
                </div>
                <div class="form-group">
                    <label for="edit_tanggalAcara">Tanggal Acara</label>
                    <input type="date" name="edit_tanggalAcara" id="edit_tanggalAcara" class="form-control">
                </div>
                <div class="form-group">
                    <label for="edit_tempatAcara">Tempat Acara</label>
                    <input type="text" name="edit_tempatAcara" id="edit_tempatAcara" class="form-control">
                </div>
                <div class="form-group">
                    <label for="edit_berkasAcara">Upload Proposal Acara</label>
                    <input type="file" name="edit_berkasAcara" id="edit_berkasAcara" class="form-control">
                    <input type="text" name="view_berkasAcara" id="view_berkasAcara" class="form-control kosong">
                    <small class="text-muted">Maximum upload berkas 2MB</small>
                </div>
                <div class="form-group">
                    <label for="edit_anggaranAcara">Anggaran Acara</label>
                    <input type="text" name="edit_anggaranAcara" id="edit_anggaranAcara" class="form-control">
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="btnProcess" class="btn btn-success kosong">Update</button>
        </div>
    </form>
    
      </div>
    </div>
  </div>

  