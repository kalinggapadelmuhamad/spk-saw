<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Sistem Pendukung Keputusan Metode SMART</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
</head>

<body class="bg-gradient-primary">
    @include('sweetalert::alert')
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-lg pb-3 pt-3 font-weight-bold">
        <div class="container">
            <a class="navbar-brand text-primary" style="font-weight: 900;" href=""> <i
                    class="fa fa-database mr-2 rotate-n-15"></i> Sistem Pendukung Keputusan Metode SMART</a>
        </div>
    </nav> -->

    <div class="container d-flex justify-content-center">
        <!-- Outer Row -->
        <div class="row d-plex justify-content-between mt-5">
            <!-- <div class="col-xl-6 col-lg-6 col-md-6 mt-5">
                <div class="card bg-none o-hidden border-0 my-5 text-white" style="background: none;">
                    <div class="text-justify card-body p-0">
                        <h4 style="font-weight: 800;">Sistem Pendukung Keputusan Metode SMART</h4>
                        <p class="pt-4">
                            Sistem Pendukung Keputusan (SPK) merupakan sistem informasi interaktif yang menyediakan
                            informasi, pemodelan, dan pemanipulasian data. Sistem itu digunakan untuk membantu
                            pengambilan keputusan dalam situasi yang semi terstruktur dan situasi yang tidak
                            terstruktur.
                        </p>
                        <p>
                            Simple Multi Attribute Rating Technique (SMART) menggunakan linear additive model untuk
                            meramal nilai setiap alternatif. SMART adalah metode yang fleksibel dalam pengambilan
                            keputusan. Metode SMART banyak digunakan karena lebih sederhana dalam merespon semua
                            kebutuhan oleh pembuat keputusan dengan cara menganalisa respon.
                        </p>
                    </div>
                </div>
            </div> -->

            <div class="col-auto  mx-auto">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body py-4 px-4">
                        <!-- Nested Row within Card Body -->
                        <div class="mb-4">
                            <h1 class="h3 tex-black font-weight-bold">Daftar</h1>
                            <p>Mohon isi data di bawah ini dengan benar.</p>
                        </div>

                        <form class="user" action="{{ route('storeDaftar') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input required autocomplete="off" type="text" value="{{ old('nama') }}"
                                    class="form-control form-control-user" id="exampleInputUser"
                                    placeholder="Nama Lengkap" name="nama" />
                                @error('nama')
                                    <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input required autocomplete="off" type="email" value="{{ old('email') }}"
                                    class="form-control form-control-user" id="exampleInputUser" placeholder="Email"
                                    name="email" />
                                @error('email')
                                    <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input required autocomplete="off" type="number" value="{{ old('nrp') }}"
                                    class="form-control form-control-user" id="exampleInputUser" placeholder="NRP"
                                    name="nrp" />
                                @error('nrp')
                                    <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input required autocomplete="off" type="password"
                                    class="form-control form-control-user" id="exampleInputPassword" name="password"
                                    placeholder="Password" />
                                @error('password')
                                    <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary btn-user btn-block mt-4"">
                                Daftar
                            </button>
                            <div class="text-center mt-3">
                                <p class="fs-6 fw-light">Sudah punya akun ?
                                    <a href="{{ route('indexLogin') }}"
                                        class="fw-light text-decoration-none text-color">Masuk</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
</body>

</html>
