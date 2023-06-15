@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>

        <a href="{{ route('createUser') }}" class="btn btn-success bg-primary"> Tambah Data </a>
    </div>
    <div class="card shadow mb-4">


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                    <thead class=" text-black">
                        <tr align="center">
                            <th style="width: 3%">No</th>
                            <th>Nrp</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nrp }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>
                                    @if ($user->status)
                                        <i class="fas fa-check text-success"></i>
                                    @else
                                        <i class="fas fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                                            href="{{ route('editUser', $user) }}"
                                            class="btn btn-warning btn-sm btn rounded mr-2"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('deleteUser', $user) }}" method="post">
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
