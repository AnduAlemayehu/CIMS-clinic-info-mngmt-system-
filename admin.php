<?php
require '../controller/session.php';
require '../controller/doctor.php';
require '../controller/online.php';
require '../controller/message.php';
require '../controller/notification.php';
require '../controller/info.php';
$v= session::getId();
if(session::type($v)!='admin'){
    header('location:login.php');
}
$online=online::onlinecount();
$mes=message::messageCount($v);
$fullname=info::selectFullName($v);

?>
<!DOCTYPE html>
<html lang="en">

<?php require('css.php'); ?>
<body class="hold-transition fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <a href="index-2.html" class="logo"> <!-- Logo -->
            <span class="logo-mini">
                        <!--<b>A</b>H-admin-->
                        <img src="assets/dist/img/mini-logo.png" alt="">
                    </span>
            <span class="logo-lg">
                        <!--<b><img src="assets/dist/img/logo.png" alt=""></b>H-admin-->
                        <b style="color: mediumseagreen">WBCMS</b>
                    </span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top ">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-tasks"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages -->
                    <!-- Notifications -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="pe-7s-bell"></i>
                            <span class="label label-primary"><?php echo notification::notificationCount($v);?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header"><i class="fa fa-bell"></i> <?php echo notification::notificationCount($v);?> Notifications</li>
                            <li>
                                <ul class="menu">
                                    <?php echo notification::selectNotification($v);?>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#"> See all Notifications <i class=" fa fa-arrow-right"></i></a>
                            </li>
                        </ul>
                    </li>
                    <!-- Tasks -->
                    <li class="dropdown tasks-menu">


                    </li>
                    <!-- user -->
                    <li class="dropdown dropdown-user admin-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-image">
                                <span><img src="<?php echo $_SESSION['pic'];?>" class="img-circle" height="40" width="40" alt="User Image"></span>
                                <span class="label label-dark btn-rounded"><?php echo $fullname;?></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="admin_password_change.php"><i class="fa fa-gear"></i> Password Change</a></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel -->


            <!-- sidebar menu -->
            <ul class="sidebar-menu">
                <li class="active">
                    <a href="admin.php"><i class="fa fa-hospital-o"></i><span>Dashboard</span>
                    </a>
                </li>
                <br>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-plus"></i><span>Registration</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="admin_add_employee.php">Add Employee</a></li>
<!--                        <li><a href="admin_add_student.php">Add Student</a></li>-->

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-md"></i><span>Manage Account</span>
                        <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="admin_update_emp_account.php">Employee Account</a></li>
                        <li><a href="admin_update_stud_account.php">Patient Account</a></li>
                    </ul>
                </li>
                <li>
                    <a href="admin_notice.php">
                        <i class="fa fa-file-text-o"></i><span> Notice View</span>
                    </a>
                </li>



            </ul>
        </div> <!-- /.sidebar -->
    </aside>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                                </span>
                </div>
            </form>
            <div class="header-icon">
                <i class="fa fa-tachometer"></i>
            </div>
            <div class="header-title">
                <h1> Dashboard</h1>
                <small> Admin</small>
                <ol class="breadcrumb hidden-xs">
                    <li><a href="admin.php"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Admin</li>
                </ol>
            </div>
        </section>
        <!-- Main content -->
        <section>
            <div class="col-sm-4"></div>
            <div class="col-sm">
                <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Calender</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- monthly calender -->
                        <div class="monthly_calender">
                            <div class="monthly" id="m_calendar"></div>
                        </div>
                    </div>
                    <div id="map1" class="hidden-xs hidden-sm hidden-md hidden-lg"></div>
                </div>
            </div>
        </section>

    </div> <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs"> </div>
       <strong>Copyright &copy; 2020 <a href="#">Computer Science Department</a>.</strong> All rights reserved.
    </footer>
</div> <!-- ./wrapper -->
<!-- ./wrapper -->
<!-- Start Core Plugins
=====================================================================-->
<!-- jQuery -->
<?php require('js1.php'); ?>
<!-- End Theme label Script
=====================================================================-->
<script>
    "use strict"; // Start of use strict
    // notification
    setTimeout(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 3000
        };
        toastr.success('well come Admin Home', 'HELLO <?php echo $_GET['id'];?>');

    }, 1300);



    //for clander


</script>
<script>
    $('#m_calendar').monthly({
        mode: 'event',
        //jsonUrl: 'events.json',
        //dataType: 'json'
        xmlUrl: 'events.xml'
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        setInterval(function () {
            $('#notification') .load('notification.php')
        },300);

    })
</script>

</body>

</html>