@extends('layouts.dashboard')
@section('title', 'Perhitungan')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Perhitungan</h1>
    </div>
    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-black">Matrix Keputusan (X)
                </h6>
            </div>
        </div>



        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class=" text-black">
                        <tr align="center">
                            <th width="3%">No</th>
                            <th>Nama Alternatif</th>
                            @foreach ($kriterias as $kriteria)
                                <th><?= $kriteria['kode_kriteria'] ?></th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatifs as $alternatif)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td align="left"><?= $alternatif['nama'] ?></td>
                                @foreach ($kriterias as $kriteria)
                                    @php
                                        $id_alternatif = $alternatif['id'];
                                        $id_kriteria = $kriteria['id'];
                                    @endphp
                                    <td>{{ $matriks_x[$id_kriteria][$id_alternatif] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-black">Bobot Kriteria
                </h6>
            </div>
        </div>



        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class=" text-black">
                        <tr align="center">
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria['kode_kriteria'] . ' (' . $kriteria['type'] . ')' }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="center">

                            @foreach ($kriterias as $kriteria)
                                <td>
                                    {{ $kriteria['bobot'] }}
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@push('script')
@endpush
