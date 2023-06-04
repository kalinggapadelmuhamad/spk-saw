@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Kriteria</h1>

        <a href="{{ route('indexKriteria') }}" class="btn btn-secondary bg-primary"><span class="icon text-white-50"></span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card shadow mb-4">
        
        <form action="{{ route('storeKriteria') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Kode Kriteria</label>
                        <input autocomplete="off" type="text" name="kode_kriteria" required class="form-control" />
                        @error('kode_kriteria')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Nama Kriteria</label>
                        <input autocomplete="off" type="text" name="nama" required class="form-control" />
                        @error('nama')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Tipe Kriteria</label>
                        <select name="type" class="form-control" required>
                            <option value="">Pilih tipe kriteria</option>
                            <option value="Benefit">Benefit</option>
                            <option value="Cost">Cost</option>
                        </select>
                        @error('type')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Bobot Kriteria</label>
                        <input autocomplete="off" type="number" name="bobot" required step="0.01"
                            class="form-control" />
                        @error('bobot')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

            </div>
            <div class="card-footer text-center">
                <button name="submit" value="submit" type="submit" class="btn btn-success col-5"><i class="fa fa-save"></i>
                    Simpan</button>
                <button type="reset" class="btn btn-info col-5"><i class="fa fa-sync-alt"></i> Reset</button>
            </div>
        </form>
    </div>
@endsection
@push('script')
@endpush
