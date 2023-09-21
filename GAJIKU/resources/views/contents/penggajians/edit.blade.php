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
                            <li class="breadcrumb-item"><a href="/employee">Penggajian</a></li>
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

                    <form class="settings-form" method="POST" action="/penggajians/{{ $penggajians->id }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="potongan">Potongan</label>
                            <input type="text" class="form-control" name="potongan" id="potongan"
                                placeholder="Masukan Potongan" value="{{ $penggajians->potongan }}">
                        </div>

                        <div class="form-group">
                            <label for="id_employee">Nama Employee</label>
                            <input type="text" class="form-control" name="id_employees" id="id_employees"
                                placeholder="Masukan nama employess" value="{{ $penggajians->id_employees }}">
                        </div>
                        <div class="form-group">
                            <label for="id_tunjangan">Tunjangan</label>
                            <input type="text" class="form-control" name="id_employees" id="id_employees"
                                placeholder="Masukan nama employess" value="{{ $penggajians->id_employees }}">
                        </div>

                        <div class="form-group">
                            <label for="id_divisi">Nama Divisi</label>
                            <input type="text" class="form-control" name="id_divisis" id="id_divisis"
                                placeholder="Masukan nama Divisi" value="{{ $penggajians->id_divisis }}">
                        </div>

                        <div class="form-group">
                            <label for="gaji_pokok">gaji</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror"
                                    name="gaji_pokok" aria-label="" placeholder="5000.000.00">
                                @error('gaji_pokok')
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
