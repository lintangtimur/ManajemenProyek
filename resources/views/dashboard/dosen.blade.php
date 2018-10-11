<div class="col-md-12">
    <h1>tampilan dosen</h1>
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
                <th>Status</th>
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
                    <td><a href="{{Storage::url($item->pathFile)}}">Download</a></td>
                    <td>
                        <button type="button" class="btn btnValidate btn-success" data-acara="{{$item->id}}">ACC</button>
                        <button type="button" class="btn btnDecline btn-danger" data-acara="{{$item->id}}">DEC</button>
                    </td>
                <td><button type="button" class="btn btn-primary"><i class="fas fa-envelope-square"></i> Add Comment</button></td>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>