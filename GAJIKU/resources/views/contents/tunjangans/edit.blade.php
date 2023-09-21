@extends('main')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/employee">Tunjangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">CreateDataDivisi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section mt-2">
            <div class="card">
                <div class="card-header">Create Data</div>
                <div class="card-body">

                    <form class="settings-form" method="POST" action="/tunjangans/{{ $tunjangans->id }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="nama_divisi">Nama Tunjangan</label>
                            <input type="text" class="form-control" name="nama_tunjangan" id="nama_tunjangan"
                                placeholder="Masukan nama tunjangan" value="{{ $tunjangans->nama_tunjangan }}">
                        </div>

                        <div class="form-group">
                            <label for="tunjangan">Nominal</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control @error('nominal') is-invalid @enderror"
                                    name="nominal" aria-label="" placeholder="500.000">
                                @error('nominal')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
