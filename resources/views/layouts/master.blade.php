<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                    <span class="logo-light">
                            <i class="mdi mdi-camera-control"></i> Real Estate
                        </span>
                    <span class="logo-sm">
                            <i class="mdi mdi-camera-control"></i>
                        </span>
                </a>
            </div>

            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">

                    <!-- language-->
                
                    <!-- full screen -->
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                        </a>
                    </li>

                    <!-- notification -->
               

                    <li class="dropdown notification-list list-inline-item">
                        <div class="dropdown notification-list nav-pro-img">
                            <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-wallet"></i> Wallet</a>
                                <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline"></i> Lock screen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"><i class="mdi mdi-power text-danger"></i> Logout</a>
                            </div>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                    <li class="d-none d-md-inline-block">
                        <form role="search" class="app-search">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" placeholder="Search..">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->
        
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">
        
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="/" class="waves-effect">
                                <i class="icon-accelerator"></i><span> Dashboard </span>
                            </a>
                        </li>
        
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-profile"></i><span> Clients <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ url('client_create',['id'=>0]) }}">New Clients</a></li>
                                <li><a href="/clients"> View Clients</a></li>
                                {{-- <li><a href="email-compose.html"> Update Clients</a></li> --}}
                            </ul>
                        </li>
                        <li>
                            <a href="/ledger" class="waves-effect">
                                <i class="icon-profile"></i><span> Ledger </span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-profile"></i><span> Ledger <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="/ledger"> View Ledger</a></li>
                            </ul>
                        </li>  --}}
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-map-marker" aria-hidden="true"></i><span> Location <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ url('create_location',['id'=>0]) }}">Create Location</a></li>
                                <li><a href="/location">View Location</a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-step-forward" aria-hidden="true"></i>
                                <span> Phase <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ url('create_phase',['id'=>0]) }}">Create Phase</a></li>
                                <li><a href="/phase">View Phase</a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-city"></i>
                                <span> Mauza <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ url('mauza_create',['id'=>0]) }}">Create Mauza</a></li>
                                <li><a href="/mauza">View Mauza</a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-money-bill"></i>

                                <span> Expenses <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ url('expense_create',['id'=>0]) }}">Create Expenses</a></li>
                                <li><a href="/expenses">View Expense</a></li>
                                
                            </ul>
                        </li>
                       
                        {{-- <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-profile-add"></i><span> Vendors <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ url('vendor_create',['id'=>0]) }}">New Vendors</a></li>
                                <li><a href="/vendors">View Vendor</a></li>
                             
                            </ul>
                        </li> --}}
    
                        {{-- <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-squares"></i><span> Land <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ url('create_land',['id'=>0]) }}">New Land</a></li>
                                <li><a href="/lands">View Lands</a></li>
                             
                                <li><a href="{{ url('/purchase_lands') }}">View Purchased Lands</a></li>
                                <li><a href="{{ url('/unsold_lands') }}">View Unsold Lands</a></li>
                                <li><a href="{{ url('/sold_lands') }}">View Sold Lands</a></li>
                            </ul>
                        </li> --}}
{{--     
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-three-stripes-horiz"></i><span> Plots <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ url('create_plot',['id'=>0]) }}">New Plot</a></li>
                                <li><a href="{{ url('/plots') }}">View Plots</a></li>
                                <li><a href="{{ url('/purchased_plots') }}">View Purchased Plots</a></li>
                                <li><a href="{{ url('/sold_plots') }}">View Sold Plots</a></li>
                                
                            </ul>
                        </li>
     --}}
                        {{-- <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span> Files <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ url('create_file',['id'=>0]) }}">New File</a></li>
                                <li><a href="{{ url('/files') }}">View Files</a></li>
                                <li><a href="{{ url('/purchased_files') }}">View Purchased File</a></li>
                                <li><a href="{{ url('/sold_files') }}">View Sold Files</a></li>
                                
                            </ul>
                        </li>
     --}}
    
                        {{-- <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-pricetag"></i><span> Sale <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ url('sale_form',['id'=>0]) }}">New Sale</a></li>
                                <li><a href="/sales/view_sale">View Sales</a></li>
                               
                                <li><a href="/sales/complete_sale">View Completed Sales</a></li>
                                <li><a href="/sales/incomplete_sale">View Incomplete Sales</a></li>
                                <li><a href="/sales/specific_date">View Sales By Specific Date</a></li>
                                <li><a href="/sales/between_dates">View Sales Between Dates</a></li>
                                
                            </ul>
                        </li> --}}
    
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-shopping-cart"></i><span> Purchase <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ url('purchase_form',['id'=>0]) }}">New Purchase</a></li>
                                <li><a href="/purchase/view_purchase">View Purchases</a></li>
                                {{-- <li><a href="email-compose.html">Update Purchase</a></li> --}}
                                <li><a href="/purchase/complete_purchase">View Completed Purchases</a></li>
                                <li><a href="/purchase_view/{{ date('Y-m-d') }}">View Purchase by Date</a></li>
                                
                            </ul>
                        </li>
{{--     
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-case-2"></i><span> Payments <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="email-inbox.html">Create Transaction (Credit , Debit)</a></li>
                                <li><a href="email-read.html">Update Transaction (Credit , Debit)</a></li>
                                <li><a href="email-compose.html">Delete Transaction (Credit , Debit)</a></li>
                            </ul>
                        </li> --}}
    
                        {{-- <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-graph"></i><span> Reports <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="email-inbox.html">New Cash In</a></li>
                                <li><a href="email-read.html">New Cash Out</a></li>
                                <li><a href="email-compose.html">General Ledger</a></li>
                                <li><a href="email-compose.html">Client Ledger</a></li>
                                <li><a href="email-compose.html">Vendor Ledger</a></li>
                                <li><a href="email-compose.html">Income Report</a></li>
                                <li><a href="email-compose.html">Expense Report</a></li>
                            </ul>
                        </li>
     --}}
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="far fa-user"></i><span> User Management </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            <li>
                            <a href="../users"><i class="fa fa-user"></i><span>Users</span></a>
                            </li>
                            <li>
                                <a href="../roles"><i class="fa fa-user"></i><span>Roles</span></a>
                            </li>
                            <li>
                            <a href="../permissions"><i class="fas fa-key"></i><span>Permissions</span></a>
                            </li>                            

                            </ul>
                        </li>
                        {{-- <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-setting-1"></i><span> Settings <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="email-inbox.html">Change Username</a></li>
                                <li><a href="email-read.html">Change Password</a></li>
                            </ul>
                        </li> --}}
        
                          
                    </ul>
        
                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>
        
            </div>
            <!-- Sidebar -left -->
        
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <h4 class="page-title">@yield('headername')</h4>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
               @yield('content')

               
                <!-- container-fluid -->

            </div>
            
            <!-- content -->

            <footer class="footer">
                © 2019 Stexo <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</span>.
            </footer>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/waves.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>

    <script src="{{ asset('assets/pages/dashboard.init.js') }}"></script>


     <!-- Required datatable js -->
     <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
     <!-- Buttons examples -->
     <script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/jszip.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/pdfmake.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/vfs_fonts.js') }}"></script>
     <script src="{{ asset('plugins/datatables/buttons.html5.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/buttons.print.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
     <!-- Responsive examples -->
     <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

     <!-- Datatable init js -->
     <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>   
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
@yield('scripts')
</body>

</html>