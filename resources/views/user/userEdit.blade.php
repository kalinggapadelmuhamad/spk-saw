@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user"></i>Edit Data User</h1>
        <a href="{{ route('indexUser') }}" class="btn btn-secondary bg-primary"><span class="icon text-white-50"></span>
            <span class="text">Kembali</span>
        </a>
    </div>

    <form action="{{ route('updateUser', $user) }}" method="post">
        @method('patch')
        @csrf
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">NRP</label>
                        <input autocomplete="off" type="number" readonly required value="{{ $user->nrp }}"
                            class="form-control" />
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Password</sub></label>
                        <input autocomplete="off" type="password" name="password" class="form-control" />

                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Ulangi Password</label>
                        <input autocomplete="off" type="password" name="password_confirmation" class="form-control" />
                        @error('password')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Nama</label>
                        <input autocomplete="off" type="text" name="nama" required value="{{ $user->nama }}"
                            class="form-control" />
                        @error('nama')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">E-Mail</label>
                        <input autocomplete="off" type="email" name="email" required value="{{ $user->email }}"
                            class="form-control" />
                        @error('email')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Status</label>
                        <select name="status" class="form-control">
                            <option value="" class="form-control">--Pilih--</option>
                            @if ($user->status == '1')
                                <option value="1" selected>Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            @else
                                <option value="1">Aktif</option>
                                <option value="0" selected>Tidak Aktif</option>
                            @endif
                        </select>
                        @error('status')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button name="submit" value="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                    Update</button>
                <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
            </div>
        </div>
    </form>
@endsection
@push('script')
@endpush
