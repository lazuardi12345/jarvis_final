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
                            <li class="breadcrumb-item"><a href="/employee">Divisi</a></li>
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

                    <form class="settings-form" method="POST" action="/divisions" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="nama_divisi">Nama Divisi</label>
                            <input type="text" class="form-control @error('nama_divisi') is-invalid @enderror" name="nama_divisi" id="nama_divisi"
                                placeholder="Masukan nama divisi">
                        </div>
                        @error('nama_divisi')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
