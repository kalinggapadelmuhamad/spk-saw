<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"">

<head>
    <title>Sistem Pendukung Keputusan Metode SMART</title>
    @include('components.dashboard._head')


    <!-- Custom fonts for this template-->
    @include('components.dashboard._styles')
    @stack('style')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('components.dashboard._sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('components.dashboard._navbar')

                <!-- End of Topbar -->

                <div class="container-fluid">
                    @include('sweetalert::alert')
                    @yield('main')
                </div>
            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="button" data-dismiss="modal"><i
                                class="fas fa-fw fa-times mr-1"></i>Cancel</button>
                        <form action="{{ route('logout') }}" method="get">
                            @csrf
                            <button class="btn btn-danger"><i class="fas fa-fw fa-sign-out-alt mr-1"></i>Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('components.dashboard._scripts')
        @stack('script')
</body>

</html>
