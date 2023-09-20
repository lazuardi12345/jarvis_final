@extends('main')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title }}</h3>
                    <a href="/penggajians/create" class="btn icon icon-left btn-primary mb-3 mt-2"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-edit">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg> Add Gaji</a>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Penggajian</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">Simple Datatable</div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Employee</th>
                                <th>Nama</th>
                                <th>Potongan</th>
                                <th>Tunjangan</th>
                                <th>Divisi</th>
                                <th>Gaji Pokok</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($penggajians as $penggajian)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>
                                        <img height="100px"
                                            src="{{ asset('/storage/images/employees/' . $penggajian->employee->photo) }}"
                                            alt="Foto Karyawan">
                                    </td>
                                    <td>{{ $penggajian->employee->user->name }}</td>
                                    <td>Rp{{ number_format($penggajian->potongan, 2, ',', '.') }}</td>
                                    <td>{{ $penggajian->tunjangan->nama_tunjangan }}</td>
                                    <td>{{ $penggajian->employee->divisi->nama_divisi }}</td>
                                    <td>Rp{{ number_format($penggajian->employee->gaji_pokok, 2, ',', '.') }}</td>
                                    @php
                                        $total = ($penggajian->employee->gaji_pokok + $penggajian->tunjangan->nominal) - $penggajian->potongan
                                    @endphp
                                    <td>Rp{{ number_format($total, 2, ',', '.') }}</td>
                                    <td>
                                        <a href="/employee/{{ $penggajian->id }}/detail"><span
                                                class="badge bg-primary">Detail</span></a>
                                        <a href="/employee/{{ $penggajian->id }}/edit"><span
                                                class="badge bg-warning">Edit</span></a>

                                        <!-- Konfirmasi tindakan Hapus -->
                                        <form action="{{ route('penggajian.destroy', $penggajian->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $penggajian->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn badge bg-danger"
                                                onclick="showDeleteConfirmation({{ $penggajian->id }})">Hapus</button>
                                        </form>

                                        <script>
                                            function showDeleteConfirmation(id) {
                                                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
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