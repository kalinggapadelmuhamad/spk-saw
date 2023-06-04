@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Edit Data Kriteria</h1>

        <a href="{{ route('indexKriteria') }}" class="btn btn-secondary bg-primary"><span class="icon text-white-50"></span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card shadow mb-4">

        <form action="{{ route('updateKriteria', $kriteria) }}" method="post">
            @method('patch')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Kode Kriteria</label>
                        <input autocomplete="off" type="text" name="kode_kriteria" required
                            value="{{ $kriteria->kode_kriteria }}" class="form-control" />
                        @error('kode_kriteria')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Nama Kriteria</label>
                        <input autocomplete="off" type="text" name="nama" required value="{{ $kriteria->nama }}"
                            class="form-control" />
                        @error('nama')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Tipe Kriteria</label>
                        {{ $kriteria->type === 'Benefit' ? 'Selected' : '' }}
                        <select name="type" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="Benefit" {{ $kriteria->type === 'Benefit' ? 'Selected' : '' }}>Benefit</option>
                            <option value="Cost" {{ $kriteria->type === 'Cost' ? 'Selected' : '' }}>Cost</option>
                        </select>
                        @error('type')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Bobot Kriteria</label>
                        <input autocomplete="off" type="number" name="bobot" required value="{{ $kriteria->bobot }}"
                            step="0.01" class="form-control" />
                        @error('bobot')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                </div>
            </div>
            <div class="card-footer text-center">
                <button name="submit" value="submit" type="submit" class="btn btn-success col-5"><i class="fa fa-save"></i>
                    Update</button>
                <button type="reset" class="btn btn-info col-5"><i class="fa fa-sync-alt"></i> Reset</button>
            </div>
        </form>
    </div>
@endsection
@push('script')
@endpush
