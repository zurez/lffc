<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="/img/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>LifeHacks</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('css/material-dashboard.css?v=1.2.0')}}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('css/demo.css')}}" rel="stylesheet" />
     <link href="{{asset('css/magic.css')}}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
   <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <!-- select author -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script type="text/javascript">
        var host="localhost:1991"
         var token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiTWQgWnVyZXogVHViYSIsImF1dGhfcHJvdmlkZXIiOiJnb29nbGUiLCJhY2Nlc3NfdG9rZW4iOiIxMjM0NTY2ODkiLCJlbWFpbCI6Inp1cmV6NHUrdGVzdDJAZ21haWwuY29tIiwiX2lkIjoiNWEyZjllMWI2ODY1YjE0ZDMxZjdkZWQzIiwiaWF0IjoxNTEzMDcwMTA3fQ.0fYvmncR8OC9ERlgNIo1knKcTW-jvJrkGX8j1srd1Zc";
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="/img/sidebar-1.jpg">
        <div class="logo">
            <a href="#" class="simple-text">
                Crumblyy
            </a>
        </div>
        <div class="sidebar-wrapper menu-list">
            <ul class="nav menu-content">
                <li>
                    <a href="dashboard">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="./hack/add">
                        <i class="material-icons">add_circle</i>
                        <p>Add Hacks</p>
                    </a>
                </li>
                
                <!-- sub menu -->
                <li data-toggle="collapse" data-target="#products" class="collapsed">
                    <a href="#">
                        <i class="material-icons">view_carousel</i>
                        <p>Hacks</p>
                    </a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li>
                        <a class="inner_link" href="./view_hacks">
                            <i class="material-icons">view_carousel</i>
                            <p>Admin Hacks</p>
                        </a>
                    </li>
                    <li>
                        <a class="inner_link" href="./admin_drafts">
                            <i class="material-icons">view_carousel</i>
                            <p>Admin Drafts</p>
                        </a>
                    </li>
                    <li>
                        <a class="inner_link" href="./user_published">
                            <i class="material-icons">view_carousel</i>
                            <p>User Published</p>
                        </a>
                    </li>
                    <li>
                        <a class="inner_link" href="./user_drafts">
                            <i class="material-icons">view_carousel</i>
                            <p>User Drafts</p>
                        </a>
                    </li>
                    <li>
                        <a class="inner_link" href="./partner_hacks">
                            <i class="material-icons">view_carousel</i>
                            <p>Partner Published</p>
                        </a>
                    </li>
                    <li>
                        <a class="inner_link" href="./partner_drafts">
                            <i class="material-icons">view_carousel</i>
                            <p>Partner Drafts</p>
                        </a>
                    </li>
                </ul>
                <!-- sub menu style -->

                <li>
                    <a href="./reports">
                        <i class="material-icons">report</i>
                        <p>Reports</p>
                    </a>
                </li>
                <li>
                    <a href="./add_report_type">
                        <i class="material-icons">report</i>
                        <p>Add Report Type</p>
                    </a>
                </li>
                <li>
                    <a href="./special_hack">
                        <i class="material-icons">star_rate</i>
                        <p title="Banners, Hack of the day etc">Add Special Hacks</p>
                    </a>
                </li>
                <li>
                    <a href="./view_special_hacks">
                        <i class="material-icons">stars</i>
                        <p title="Banners, Hack of the day etc">View Special Hacks</p>
                    </a>
                </li>
                <li>
                    <a href="./notification">
                        <i class="material-icons">notifications_active</i>
                        <p>Send Notification</p>
                    </a>
                </li>
                <li>
                    <a href="./notification_history">
                        <i class="material-icons">assessment</i>
                        <p>Send Notification</p>
                    </a>
                </li>
                <li>
                    <a href="./tags">
                        <i class="material-icons">loyalty</i>
                        <p>Tag List</p>
                    </a>
                </li>
                <li>
                    <a href="./users">
                        <i class="material-icons">group</i>
                        <p>Users</p>
                    </a>
                </li>
                <!-- <li class="active-pro">
                    <a href="upgrade">
                        <i class="material-icons">unarchive</i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li> -->
            </ul>
        </div>
</div>

        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">{{$title or ''}}</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Mike John responded to your email</a>
                                    </li>
                                    <li>
                                        <a href="#">You have 5 new tasks</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Andrew</a>
                                    </li>
                                    <li>
                                        <a href="#">Another Notification</a>
                                    </li>
                                    <li>
                                        <a href="#">Another One</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                   @yield("content")
                </div>
            </div>
        </div>
    </div>
</body>





<!--   Core JS Files   -->

<script src="{{asset('js/jquery.2.2.4.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="{{asset('js/chartist.min.js')}}"></script>
<!--  Dynamic Elements plugin -->
<script src="{{asset('js/arrive.min.js')}}"></script>
<!--  PerfectScrollbar Library -->
<script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('js/material-dashboard.js')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('js/magic.js')}}"></script>

<!-- select author -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

@yield("script")


</html>