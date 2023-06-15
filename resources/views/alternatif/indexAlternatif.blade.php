@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Data Alternatif</h1>

        <a href="{{ route('createDataAlternatif') }}" class="btn btn-sm btn-primary"> Tambah Data </a>
    </div>
    <div class="card shadow mb-4">


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                    <thead class=" text-black">
                        <tr align="center">
                            <th style="width: 3%">No</th>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataAlternatifs as $dataAlternatif)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dataAlternatif->nrp }}</td>
                                <td>{{ $dataAlternatif->nama }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                                            href="{{ route('editDataAlternatif', $dataAlternatif) }}"
                                            class="btn btn-warning btn-sm btn rounded mr-2"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('deleteDataAlternatif', $dataAlternatif) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button data-toggle="tooltip" data-placement="bottom" title="Hapus Data"
                                                onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
