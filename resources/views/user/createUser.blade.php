@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data User</h1>

        <a href="{{ route('indexUser') }}" class="btn btn-secondary bg-primary"><span class="icon text-white-50"></span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card shadow mb-4">

        <form action="{{ route('storeUser') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">NRP</label>
                        <input autocomplete="off" type="number" name="nrp" required class="form-control" />
                        @error('nrp')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Nama</label>
                        <input autocomplete="off" type="text" name="nama" required class="form-control" />
                        @error('nama')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Password</sub></label>
                        <input autocomplete="off" type="password" name="password" class="form-control" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Ulangi Password</label>
                        <input autocomplete="off" type="password" name="password_confirmation" class="form-control"
                            required />
                        @error('password')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Email</label>
                        <input autocomplete="off" type="email" name="email" required class="form-control" />
                        @error('email')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Level</label>
                        <select name="role" class="form-control">
                            <option value="" class="form-control">--Pilih--</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        @error('role')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="card-footer text-center">
                    <button name="submit" value="submit" type="submit" class="btn btn-success col-5"><i
                            class="fa fa-save"></i>
                        Simpan</button>
                    <button type="reset" class="btn btn-info col-5"><i class="fa fa-sync-alt"></i> Reset</button>
                </div>
        </form>
    </div>
@endsection
@push('script')
@endpush
