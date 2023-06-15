<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SPK Internal Facilitator</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
</head>

<body class="bg-gradient-primary">
    @include('sweetalert::alert')



    <div class="container d-flex justify-content-center">
        <div class="row align-self-center">
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

            <div class="col-auto mx-auto">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body py-4 px-4">
                        <div class="mb-4">
                            <h1 class="h3 tex-black font-weight-bold">Masuk</h1>
                            <p>Gunakan NRP & Password anda untuk masuk.</p>
                        </div>
                        <form class="user" action="{{ route('storeLogin') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input required autocomplete="off" type="number" value=""
                                    class="form-control form-control-user" id="exampleInputUser" placeholder="NRP"
                                    name="nrp" />
                            </div>
                            @error('nrp')
                                <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <input required autocomplete="off" type="password"
                                    class="form-control form-control-user" id="exampleInputPassword" name="password"
                                    placeholder="Password" />
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary btn-user btn-block mt-4">
                                Masuk</button>
                            <div class="text-center mt-3">
                                <p class="fs-6 fw-light">Belum punya akun ?
                                    <a href="{{ route('indexDaftar') }}"
                                        class="fw-light text-decoration-none text-color">Daftar</a>
                                </p>
                            </div>
                        </form>
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
