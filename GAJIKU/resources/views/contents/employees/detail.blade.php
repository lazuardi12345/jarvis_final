@extends('main')

@section('content')
    <div class="row">
        <div class="card col-md-5 col-sm-12">
            <div class="card-content">
                <img src="{{ asset('/storage/images/employees/' . $employees->photo) }}" class="card-img-top img-fluid"
                    alt="Foto Karyawan">
            </div>
        </div>

        <div class="card col-md-6 ms-md-5 col-sm-12">
            <div class="card-content">
                <div class="card-body">
                    <h5 class="card-title">{{ $employees->user->name }}</h5>
                    <p class="card-text">
                        Alamat : {{ $employees->alamat }}
                    </p>
                </div>
            </div>
            <ul class="list-group list-group-flush mb-lg-5">
                <li class="list-group-item">No HP : {{ $employees->no_hp }}</li>
                <li class="list-group-item">Gaji Pokok : Rp{{ number_format($employees->gaji_pokok, 2, ',', '.') }}</li>
                <li class="list-group-item">Divisi : {{ $employees->divisi->nama_divisi }}</li>
            </ul>

            <div class="card-footer d-flex justify-content-between mt-lg-5">
                <span class="mt-lg-5"></span>
                <button class="btn btn-light-primary">
                    <a href="/employee">
                        <span>Back</span>
                    </a>
                </button>
            </div>
        </div>
    </div>
@endsection
