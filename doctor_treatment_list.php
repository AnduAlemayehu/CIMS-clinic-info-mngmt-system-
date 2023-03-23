<?php
require '../controller/session.php';
require '../controller/doctor.php';
require '../controller/online.php';
require '../controller/message.php';
require '../controller/notification.php';
require '../controller/info.php';
$v= session::getId();
if(session::type($v)!='doctor'){
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
                    <!-- Orders -->
                    <li class="dropdown messages-menu" >
                        <a href="#" class="dropdown-toggle admin-notification" data-toggle="dropdown">
                            <i class="pe-7s-cart"></i>
                            <span class="label label-success" id="notification"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header"><i class="fa fa-shopping-basket"></i> Orders</li>
                            <li>
                                <ul class="menu" id="doc_order">

                                    <?php //doctor::selectNotification($v); ?>


                                </ul>
                            </li>
                            <li class="footer"><a href="doctor.php"> See all Orders <i class="fa fa-arrow-right"></i></a></li>
                        </ul>

                    </li>
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

                    <!-- user -->
                    <li class="dropdown dropdown-user admin-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-image">
                                <span><img src="<?php echo $_SESSION['pic'];?>" class="img-circle" height="40" width="40" alt="User Image"></span>
                                <span class="label label-dark btn-rounded"><?php echo $fullname;?></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="doctor_password_change.php"><i class="fa fa-gear"></i> Password Change</a></li>
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


            <ul class="sidebar-menu">
                <li class="active">
                    <a href="doctor.php"><i class="fa fa-hospital-o"></i><span>Dashboard</span>
                    </a>
                </li>
                <br>
                <li>
                    <a href="doctor_treatment_list.php">
                        <i class="fa fa-user"></i><span> Patient History </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text"></i><span>Prescribtion</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="doctor_lab_prescribe.php">Prescribe to Lab</a></li>
                        <li><a href="doctor_medicen_prescribe.php">Prescribe to Pharamacy</a></li>

                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-check-square-o"></i><span>Appointment</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="doctor_add_appoint.php">Add Appointment</a></li>
                        <li><a href="doctor_appoint_list.php">Appointment list</a></li>
                    </ul>
                </li>

                <li>
                    <a href="doctor_bed_view.php">
                        <i class="fa fa-bed"></i><span> Bed View</span>
                    </a>
                </li>
<!--                <li>-->
<!--                    <a href="doctor_schedule.php">-->
<!--                        <i class="fa fa-list-alt"></i><span> schedule View </span>-->
<!--                    </a>-->
<!--                </li>-->

                <li>
                    <a href="doctor_medicen_view.php">
                        <i class="fa fa-book"></i><span> Medicen View</span>
                    </a>
                </li>

                <li>
                    <a href="doctor_notice.php">
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
            <div class="header-icon">
                <i class="pe-7s-box1"></i>
            </div>
            <div class="header-title">
                <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                                    </span>
                    </div>
                </form>
                <h1>Doctor</h1>
                <small>Patient history</small>
                <ol class="breadcrumb hidden-xs">
                    <li><a href="doctor.php"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Doctor</li>
                </ol>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group">
                                <a class="btn btn-success" href="#"> <i class="fa fa-list"></i> Patient history
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="panel-header">
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="dataTables_length">

                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="dataTables_length">

                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="dataTables_length">
                                            <div class="input-group custom-search-form">
                                                <input type="search" class="form-control" placeholder="search..">
                                                <span class="input-group-btn">
                                                                  <button class="btn btn-primary" type="button">
                                                                      <span class="glyphicon glyphicon-search"></span>
                                                                  </button>
                                                              </span>
                                            </div><!-- /input-group -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Patient name</th>
                                        <th>Patient Id</th>
                                        <th>sex</th>
                                        <th>Docter name</th>
                                        <th>CheckType</th>
                                        <th>LabResult</th>
                                        <th>Medicen type</th>
                                        <td>Date</td>
                                        <th>Update</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php doctor::selectTreatment(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="page-nation text-right">

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </section> <!-- /.content -->
        <div id="ordine" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Update table</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="table.html"> <i class="fa fa-list"></i>  Doctor List </a>
                                </div>
                            </div>
                            <div class="panel-body">

                                <form class="col-sm-12">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Enter Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Enter password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" class="form-control" placeholder="Enter Designation" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control" name="select" size="1">
                                            <option selected class="test">Neurology</option>
                                            <option>Gynaecology</option>
                                            <option>Microbiology</option>
                                            <option>Pharmacy</option>
                                            <option>Neonatal</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" id="exampleTextarea" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" placeholder="Enter Phone number" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="number" class="form-control" placeholder="Enter Mobile" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Picture upload</label>
                                        <input type="file" name="picture" id="picture">
                                        <input type="hidden" name="old_picture">
                                    </div>

                                    <div class="form-group">
                                        <label>Short Biography</label>
                                        <textarea id="some-textarea" class="form-control" rows="6" placeholder="Enter text ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Specialist</label>
                                        <input type="text" class="form-control" placeholder="Specialist" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input name="date_of_birth" class="datepicker form-control hasDatepicker" type="text" placeholder="Date of Birth">
                                    </div>
                                    <div class="form-group">
                                        <label>Blood group</label>
                                        <select class="form-control">
                                            <option>A+</option>
                                            <option>AB+</option>
                                            <option>O+</option>
                                            <option>AB-</option>
                                            <option>B+</option>
                                            <option>A-</option>
                                            <option>B-</option>
                                            <option>O-</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Sex</label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" value="1" checked="checked">Male</label>
                                        <label class="radio-inline"><input type="radio" name="sex" value="0" >Female</label>

                                    </div>
                                    <div class="form-check">
                                        <label>Status</label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="1" checked="checked">Active</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="0" >Inctive
                                        </label>
                                    </div>

                                    <div class="reset button">
                                        <a href="#" class="btn btn-primary">Reset</a>
                                        <a href="#" class="btn btn-success">Save</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div><!-- /.content-wrapper -->
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
<script type="text/javascript">

    $(document).ready(function () {
        var chck = 0;

        $(document).on("click", "#notification", function () {

            var idno = "<?php echo $v;?>";

            $.ajax({
                url: '../controller/doctor.php',
                method: 'POST',
                data: {id: idno},
                success: function (result) {

                    $('#doc_order').html(result);

                }
            });
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        setInterval(function () {
            $('#notification') .load('notification.php')
        },300);

    })
</script>
<script>
    $(document).ready(function () {
        $('.delet_link').on('click',function(){
            var id =$(this).attr('rel');
           // alert('delet.php?id='+id);
            //$('.modal_delet').attr('href','delet.php?id='+id);
            //$('#delet_modal').modal('show');
            $('.delet_button').click(function(){
                window.location = 'doctor_treatment_list.php?id=' + id;
            });

            }
        );
    });
</script>
</body>

</html>