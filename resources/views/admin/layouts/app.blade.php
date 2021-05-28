<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Take-a-Ref</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.jpg') }}">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>


<body id="page-top" class="sidebar-toggled">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-light sidebar accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.users.index') }}" style="background-image: url({{ asset('img/logo.jpg') }});background-size: contain;background-repeat: no-repeat;background-position-x: center;background-color: #fff;"></a>




            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users  mx-2"></i>
                    <span> Gestão de Utilizadores</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mb-0">
            <!-- Divider -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->routeIs('admin.cantina.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.cantina.index') }}">
                    <i class="fas fa-info-circle mx-2"></i>
                    <span> Dados Cantina</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider mb-0">
            <!-- Divider -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->routeIs('admin.feedback.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.feedback.index') }}">
                    <i class="fas fa-comment-dots mx-2"></i>
                    <span> Feedbacks</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mb-0">
            <!-- Divider -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->routeIs('admin.categorias.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.categorias.index') }}">
                    <i class="fas fa-align-justify mx-2"></i>
                    <span> Categorias</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mb-0">
            <!-- Divider -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->routeIs('admin.produtos.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.produtos.index') }}">
                    <i class="fas fa-utensils mx-2"></i>
                    <span> Produtos</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mb-0">
            <!-- Divider -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->routeIs('admin.ementa.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.ementa.index') }}">
                    <i class="far fa-calendar-alt mx-2"></i>
                    <span> Gerir Ementa</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mb-5">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar static-top shadow-sm">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid p-5">
                    @yield('content')
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-alveite shadow">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Take-a-Ref 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
<!-- Page level plugins -->
<script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('js/app.js') }}" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</html>
