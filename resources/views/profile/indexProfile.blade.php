@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user"></i> Data Profile</h1>
    </div>

    <form action="{{ route('updateProfile', Auth::user()) }}" method="post">
        @method('patch')
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Edit Data Profile</h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Username</label>
                        <input autocomplete="off" type="text" readonly required value="{{ Auth::user()->username }}"
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
                        <input autocomplete="off" type="text" name="nama" required value="{{ Auth::user()->nama }}"
                            class="form-control" />
                        @error('nama')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">E-Mail</label>
                        <input autocomplete="off" type="email" name="email" required value="{{ Auth::user()->email }}"
                            class="form-control" />
                        @error('email')
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
