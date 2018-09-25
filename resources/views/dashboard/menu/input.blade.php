@extends('dashboard.index')
@section('inputevent')
<head>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>

<div class="col-md-6">
    <div class="card">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="kegiatan/upload" method="post" enctype="multipart/form-data">
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
                <label for="berkasAcara">Upload Proposal Acara</label>
                <input type="file" name="berkasAcara" id="berkasAcara" class="form-control">
                <small class="text-muted">Maximum upload berkas 2MB</small>
            </div>
            <div class="form-group">
                <label for="anggaranAcara">Anggaran Acara</label>
                <input type="text" name="anggaranAcara" id="anggaranAcara" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @include('partial.error')
        </div>
    </div>
</div>
@endsection