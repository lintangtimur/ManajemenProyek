<div class="col-md-4">
    <div class="card">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="kegiatan/mahasiswa/input" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="card-body">
            <h4 class="card-title">Input Acara</h4>
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
                <label for="berkasAcara">Upload Bukti Sertifikat</label>
                <input type="file" name="berkasAcara" id="berkasAcara" class="form-control">
                <small class="text-muted">Maximum upload berkas 2MB</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @include('partial.error')
        </div>
    </div>
</div>
<div class="col-md-8">
        <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kegiatan mahasiswa</h4>
                    <div class="table-responsive class="collapse" id="aaa"">
                        <table class="table table-inverse" id="tMahasiswa">
                            <thead class="thead-default">
                                <tr>
                                    <th>Nama Kegiatan</th>
                                    <th>Tema Acara</th>
                                    <th>Waktu Acara</th>
                                    <th>Tempat Acara</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>
{{-- <div class="row mt-4">
    <div class="col-md-12">
            
    </div>
</div> --}}