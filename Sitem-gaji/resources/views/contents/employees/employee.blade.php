@extends('main')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title }}</h3>
                    <a href="/employee/create" class="btn icon icon-left btn-primary mb-3 mt-2"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-edit">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg> Add Data Employee</a>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/employee">Employee</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <section class="section mt-2">
            <div class="card">
                <div class="card-header">Simple Datatable</div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Gaji Pokok</th>
                                <th>Divisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($employee as $value)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $value->user->name }}</td>
                                    <td>
                                        <img height="100px" src="{{ asset('/storage/images/employees/' . $value->photo) }}"
                                            alt="Foto Karyawan">
                                    </td>

                                    <td>{{ $value->alamat }}</td>
                                    <td>{{ $value->no_hp }}</td>
                                    <td>Rp {{ number_format($value->gaji_pokok, 2, ',', '.') }}</td>
                                    <td>{{ $value->divisi->nama_divisi }}</td>
                                    <td>
                                        <a href="/employee/{{ $value->id }}/detail"><span
                                                class="badge bg-primary">Detail</span></a>
                                        <a href="/employee/{{ $value->id }}/edit"><span
                                                class="badge bg-warning">Edit</span></a>
                                        <!-- Konfirmasi tindakan Hapus -->
                                        <form action="{{ route('employee.destroy', $value->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $value->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn badge bg-danger"
                                                onclick="showDeleteConfirmation({{ $value->id }})">Hapus</button>
                                        </form>
                                        <script>
                                            function showDeleteConfirmation(id) {
                                                if (confirm('Apakah Anda yakin ingin menghapus karyawan ini?')) {
                                                    document.getElementById('delete-form-' + id).submit();
                                                }
                                            }
                                        </script>
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection