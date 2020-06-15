<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/main/img/abc@2x.png")}}">
    <title>Admin Panel</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/js/assets/extra-libs/multicheck/multicheck.css")}}">
    <link href="{{asset("assets/js/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet">
    <link href="{{asset("assets/js/dist/css/style.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/css/main.css")}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="{{asset("assets/js/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/js/assets/libs/select2/dist/css/select2.min.css")}}">
    <link href="{{asset("assets/bootstrap/dist/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="{{url('admin/blog')}}">
                    <!-- Logo icon -->
                    <b class="logo-icon p-l-10">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{asset("assets/main/img/logo.svg")}}" alt="homepage"
                             class="light-logo" style="width: 100%"/>

                    </b>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Logout visible on mobile only -->
                <!-- ============================================================== -->
                <form action="{{url('logout')}}" method="post" class="d-block d-md-none">
                    @csrf
                    <button class="nav-item btn btn-danger tooltip-danger navbar-btn">Log Out</button>
                </form>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav w-100 p-3 mr-auto d-flex justify-content-between">
                    <li class="nav-item "><a class="nav-link sidebartoggler waves-effect waves-light"
                                                              href="javascript:void(0)" data-sidebartype="mini-sidebar"><i
                                class="mdi mdi-menu font-24"></i></a></li>
                    <li class="nav-item  btn-nav">
                        <form action="{{url('logout')}}" method="post" class="nav-item d-md-block d-none btn-nav">
                            @csrf
                            <button class="nav-item btn btn-danger tooltip-danger navbar-btn">Log Out</button>
                        </form>
                    </li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="p-t-30">
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/blog')}}" aria-expanded="false"><i
                                class="mdi mdi-view-dashboard"></i><span class="hide-menu">Blog</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/workers')}}" aria-expanded="false"><i
                                class="mdi mdi-account-box"></i><span class="hide-menu">Workers</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/about')}}" aria-expanded="false"><i
                                class="mdi mdi-account-card-details"></i><span class="hide-menu">Expereince And Education</span></a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/news')}}" aria-expanded="false"><i
                                class="mdi mdi-border-inside"></i><span class="hide-menu">News</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/countriesTable')}}" aria-expanded="false"><i
                                class="mdi mdi-blur-linear"></i><span class="hide-menu">Countries Chart</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/assetAllocation')}}" aria-expanded="false"><i
                                class="mdi mdi-chart-timeline"></i><span class="hide-menu">Asset Allocation</span></a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/maturitySummary')}}" aria-expanded="false"><i
                                class="mdi mdi-chart-bar"></i><span class="hide-menu">Maturity Summary</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/currencies')}}" aria-expanded="false"><i
                                class="mdi mdi-chart-gantt"></i><span class="hide-menu">Currencies Chart</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/areas')}}" aria-expanded="false"><i
                                class="mdi mdi-check"></i><span class="hide-menu">Areas Chart</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/fund')}}" aria-expanded="false"><i
                                class="mdi mdi-microsoft"></i><span class="hide-menu">Fund Chart</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/nav')}}" aria-expanded="false"><i
                                class="mdi mdi-chart-areaspline"></i><span class="hide-menu">Nav Chart</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/contacts')}}" aria-expanded="false"><i
                                class="mdi mdi-account-multiple"></i><span class="hide-menu">Contacts</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/rule')}}" aria-expanded="false"><i
                                class="mdi mdi-ruler"></i><span class="hide-menu">Rules</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/company')}}" aria-expanded="false"><i
                                class="mdi mdi-earth"></i><span class="hide-menu">Company</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('admin/foundation')}}" aria-expanded="false"><i
                                class="mdi mdi-clipboard-text"></i><span class="hide-menu">Foundation Titles</span></a></li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset("assets/js/assets/libs/jquery/dist/jquery.min.js")}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset("assets/js/assets/libs/popper.js/dist/umd/popper.min.js")}}"></script>
<script src="{{asset("assets/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset("assets/js/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js")}}"></script>
<script src="{{asset("assets/js/assets/extra-libs/sparkline/sparkline.js")}}"></script>
<!--Wave Effects -->
<script src="{{asset("assets/js/dist/js/waves.js")}}"></script>
<!--Menu sidebar -->
<script src="{{asset("assets/js/dist/js/sidebarmenu.js")}}"></script>
<!--Custom JavaScript -->
<script src="{{asset("assets/js/dist/js/custom.min.js")}}"></script>
<!-- this page js -->
<script src="{{asset("assets/js/assets/extra-libs/multicheck/datatable-checkbox-init.js")}}"></script>
<script src="{{asset("assets/js/assets/extra-libs/multicheck/jquery.multicheck.js")}}"></script>
<script src="{{asset("assets/js/assets/extra-libs/DataTables/datatables.min.js")}}"></script>

<script src="{{asset("assets/js/assets/libs/select2/dist/js/select2.full.min.js")}}"></script>
<script src="{{asset("assets/js/assets/libs/select2/dist/js/select2.min.js")}}"></script>
<script src="{{asset("assets/js/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script>
    $("textarea").each(function (tag, value) {
        ClassicEditor
            .create( value )
            .catch( error => {
                console.error( error );
            } );
    })

</script>
<script>
    $('.blog-image').click(function () {
        $(this).toggleClass('blog-big-image');
    });

    $(".select2").select2();

    jQuery('.datepicker-autoclose').datepicker({
        format: {
            toDisplay: function (date, format, language) {
                var dater = new Date(date),
                    month = '' + (dater.getMonth() + 1),
                    day   = '' + dater.getDate(),
                    year  = dater.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;
                return [day, month, year].join('/');
            },
            toValue: function (date, format, language) {
                var date  = new Date(date),
                    month = '' + (date.getMonth() + 1),
                    day   = '' + date.getDate(),
                    year  = date.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                return [day, month, year].join('-');
            }
        },
        autoclose: true,
        todayHighlight: true
    });
</script>

</body>

</html>
