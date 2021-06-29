<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $site->getConfiguration()->name }} POS @if(isset($page_title)) {{ " | ".$page_title }} @endif</title>

        <!-- Fonts -->
        {!! Html::style("https://fonts.googleapis.com/css?family=Maven+Pro") !!}

        <!-- Scripts -->
        {!! Html::script('js/jquery-3.3.1.min.js') !!}
        {!! Html::script('js/popper.min.js') !!}
        {!! Html::script('js/app.js') !!}
        {!! Html::script('js/mdb.min.js') !!}
        {!! Html::script('js/datatables.min.js') !!}
        {!! Html::script('js/dataTables.responsive.min.js') !!}
        {!! Html::script('js/dataTables.buttons.min.js') !!}
        {!! Html::script('js/select2.min.js') !!}

        <!-- Styles -->
        {!! Html::style('css/app.css') !!}
        {!! Html::style('fontawesome/css/all.css') !!}
        {!! Html::style('css/mdb.min.css') !!}
        {!! Html::style('css/datatables.min.css') !!}
        {!! Html::style('css/responsive.dataTables.min.css') !!}
        {!! Html::style('css/buttons.dataTables.min.css') !!}
        {!! Html::style('css/select2.min.css') !!}

        <style>
            html, body {
                background-color: #fff;
                font-family: 'Maven Pro', sans-serif;
            }

            a {
                color: #{{ $site->getConfiguration()->colour1 }};
            }

            a:hover {
                color: #{{ $site->getConfiguration()->colour2 }};
            }

            .page-item.active .page-link {
                color: #fff !important;
                background-color: #{{ $site->getConfiguration()->colour1 }} !important;
            }

            .page-link {
                color: #{{ $site->getConfiguration()->colour1 }} !important;
                background-color: #fff !important;
            }

            .page-link:hover {
                color: #fff !important;
                background-color: #{{ $site->getConfiguration()->colour1 }} !important;
            }
        </style>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#myTable1').DataTable({
                    fixedHeader: true
                });
                $('#myTable2').DataTable({
                    fixedHeader: true
                });
                $('#myTable3').DataTable({
                    fixedHeader: true,
                    "order": [[ 0, "desc" ]]
                });
            });

            function confirmDisable() {
                if (confirm("Are you sure you want to disable this item?")) {
                    return true;
                } else {
                    return false;
                }
            }

            function confirmDisable() {
                if (confirm("Are you sure you want to disable this item?")) {
                    return true;
                } else {
                    return false;
                }
            }

            function confirmDelete() {
                if (confirm("Are you sure you want to completely delete this item?")) {
                    return true;
                } else {
                    return false;
                }
            }

            function confirmReset() {
                if (confirm("Are you sure you want to reset?")) {
                    return true;
                } else {
                    return false;
                }
            }

            function confirmDeleteAll() {
                if (confirm("Are you sure you want to delete all?")) {
                    if (confirm("This action is irreversible and all items will be deleted. Please confirm.")) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }

            function confirmStart() {
                if (confirm("Are you sure you want to start this process?")) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </head>
    <body style="background-color: #f6f7fb;">
        <div class="container-fluid" style="min-height: 100vh;">
            <div class="row sticky-top shadow-sm bg-white" style="height: 70px; border-bottom: 1px solid #{{ $site->getConfiguration()->colour1 }};">
                <div class="col-md-6">
                    <div class="text-white float-left" style="display: flex; align-items: center; justify-content: center; height: 100%;">
                        <h3  class="font-weight-bold" style="color: #{{ $site->getConfiguration()->colour1 }};">{{ $site->getConfiguration()->name }} POS</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="float-right" style="display: flex; align-items: center; justify-content: center; height: 100%;">
                        ​<span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Cookie::get('icommerce_reseller') }}
                        </span>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('pos_logout') }}"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-header" style="border-bottom: 1px solid #999; padding: 30px 0; margin-bottom: 20px; color: #999;">{{ $page_title }}</h1>
                </div>
            </div>
            @include('commons.alert')
            <div class="row">
                <div class="col-lg-2">
                    <div id="accordion" style="margin-bottom: 10px;">
                        <div class="card">
                            <div class="card-header bg-white" id="heading1" style="padding: 0;">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        <strong>Menu</strong>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse1" class="collapse @if ($menu == 'menu') show @endif" aria-labelledby="heading1" data-parent="#accordion">
                                <div class="card-body">
                                    <nav class="nav flex-column">
                                        <a class="nav-link" href="{{ route('pos_dashboard') }}"><i class="fa fa-chart-line"></i> Dashboard</a>
                                        <a class="nav-link" href="{{ route('pos.customers.index') }}"><i class="fa fa-users"></i> Customers</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 justify-content-end text-right">
                    <div style="border-top: 1px solid #{{ $site->getConfiguration()->colour1 }}; margin-top: 20px; padding: 10px 0;">Powered by <a href="https://icit.ng" target="_blank">ICIT Solutions Nigeria</a></div>
                </div>
            </div>
        </div>
    </body>
</html>
