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
                            <li class="breadcrumb-item"><a href="/employee">Employee</a></li>
                            <li class="breadcrumb-item active" aria-current="page">CreateDataEmployee</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section mt-2">
            <div class="card">
                <div class="card-header">Create Data</div>
                <div class="card-body">

                    <form class="settings-form" method="POST" action="/employee" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Masukan Photo Diri Anda</label>
                                    <input class="form-control @error('photo') is-invalid @enderror" name="photo"
                                        type="file" id="formFile">
                                    @error('photo')
                                        <div class="invalid-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="formFile" class="form-label">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                        placeholder="Masukan Alamat Anda Disini..." rows="10"></textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="noHP">No HP</label>
                                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                        name="no_hp" id="noHP" placeholder="Masukan nomor hp">
                                    @error('no_hp')
                                        <div class="invalid-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mt-2">
                                    <label for="formFile" class="form-label">Gaji Pokok</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror"
                                            name="gaji_pokok" aria-label="" placeholder="2.000.000">
                                        @error('gaji_pokok')
                                            <div class="invalid-feedback text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="id_users" class="col-4 col-form-label">User</label>

                                    <select id="id_users" name="id_users" class="form-select">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group row mt-2">
                                    <label for="id_divisi" class="col-4 col-form-label">Divisi</label>
                                    <select id="id_divisi" name="id_divisis" class="form-select">
                                        @foreach ($divisi as $divisi)
                                            <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                        </div>

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
