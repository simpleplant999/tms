<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- @if (Auth::check()) <meta name="user_id" content="{{ Auth::user()->id }}" />@else <meta name="user_id" content="0" /> @endif --}}
    <title>Tools Management System</title>
    
    
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="./css/app.css">
    <link href="./css/sb-admin-2.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    
</head>

<body id="page-top">
    
    <div id="app">
        <!-- Page Wrapper -->
        <div class="splashpage">
            <div>
                {{-- <img src="./images/logo.png" class="img-fluid"/> --}}
            </div>
        </div>
        <div id="wrapper">
            
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
                
                <!-- Sidebar - Brand -->
                <span class="sidebar-brand d-flex align-items-center justify-content-center">
                    <div class="sidebar-brand-icon">
                        {{-- <img src="./images/logo2.png" class="img-fluid"/> --}}
                        <p class="h4">TMS</p>
                    </div>
                    <div class="sidebar-brand-text mx-3"></div>
                </span>
                
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                
                <li class="nav-item">
                    <router-link class="nav-link" to='/'>
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </router-link>
                </li>  
                
                <li class="nav-item">
                    <router-link class="nav-link" to='/tools'>
                        <i class="fas fa-fw fa-tools"></i>
                        <span>Tools</span>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link" to='/lend'>
                        <i class="fas fa-fw fa-hand-holding"></i>
                        <span>Lend Items</span>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link" to='/history'>
                        <i class="fas fa-fw fa-clock"></i>
                        <span>History</span>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link" to='/employees'>
                        <i class="fas fa-fw fa-users"></i>
                        <span>Employees</span>
                    </router-link>
                </li>
                
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                
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
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-dark d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        {{-- <img src="./images/logo.png" class="" style="height:20px" alt=""> --}}
                        
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 text-gray-800 font-weight-bold">{{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle" src="./images/avatar.png">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right w-25 shadow animated--grow-in text-center" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                            
                        </ul>
                        
                    </nav>
                    <!-- End of Topbar -->
                    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        
                        <router-view></router-view>
                        {{-- <vue-progress-bar></vue-progress-bar> --}}
                        
                    </div>
                    <!-- /.container-fluid -->
                    
                </div>
                <!-- End of Main Content -->
                
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; TMS 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
                
            </div>
            <!-- End of Content Wrapper -->
            
        </div>
        <!-- End of Page Wrapper -->
    </div>
    
    <!-- Scroll to Top Button-->
    {{-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> --}}
    
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    
    <script src="/js/app.js"></script>
    <script src="/js/sb-admin-2.js"></script>
    <script src="/js/jquery.easing.js"></script>
</body>

<script>
    // $('.Login').css({display:'block'});
    // $('.splashpage').animate({opacity:0}, 2000, ()=>{
        //     $('.splashpage').css({display:'none'});
        // });
    </script>
    </html>