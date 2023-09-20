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
                            <li class="breadcrumb-item active" aria-current="page">CreateDataPenggajian</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section mt-2">
            <div class="card">
                <div class="card-header">Create Data</div>
                <div class="card-body">

                    <form class="settings-form" method="POST" action="/penggajians" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="id_employee" class="col-4 col-form-label">Nama Employee</label>
                            <select id="id_employee" name="id_employees" class="form-select">
                                @foreach ($employee as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_divisis" class="col-4 col-form-label">Nama Divisi</label>
                            <select id="id_divisis" name="id_divisis" class="form-select">
                                @foreach ($divisi as $divisi)
                                    <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="potongan">Potongan</label>
                            <input type="text" class="form-control" name="potongan" id="tunjangan"
                                placeholder="Masukan Potongan">
                        </div>

                        <div class="form-group">
                            <label for="id_tunjangan" class="col-4 col-form-label">Tunjangan</label>
                            <select id="id_tunjangan" name="id_tunjangans" class="form-select">
                                @foreach ($tunjangan as $tunjangan)
                                    <option value="{{ $tunjangan->id }}">{{ $tunjangan->nama_tunjangan }}</option>
                                @endforeach
                            </select>
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