<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
   
</head>

<body>
    <div class="wrapper">
    <?php include "sidebar.php"; ?>

        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">

                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Table List </a>
                    <?php include "header.php"; ?>

                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row bg-white ">
                      
                        <div class="col-md-12">
                            <div class="card card-plain table-plain-bg">
                                <div class="card-header ">
                                    <h4 class="card-title">Üyeler</h4>
                                    <p class="card-category">Here is a subtitle for this table</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>ID</th>
                                            <th>İsim</th>
                                            <th>Soyisim</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>Email</th>
                                            <th>Yetki</th>
                                            <th>Kayıt Tarihi</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </thead>
                                        <tbody>
                        <?php 
                                        $query = "SELECT * FROM user";
                                        $query_run = mysqli_query($conn, $query);
                                        
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $user) {
                                            ?>
                                    <tr>
                                            <td class=""><?=$user['id'];?></td>
                                            <td class=""><?=$user['name'];?></td>
                                            <td class=""><?=$user['lastname'];?></td>
                                            <td class=""><?php echo $user['username'];?></td>
                                            <td class=""><?php echo $user['email'];?></td>
                                            <td class=""><?php 
                                                    if ($user['role'] == '1') {
                                                        echo "Admin";
                                                    } 
                                                    elseif ($user["role"] == "0") {
                                                        echo "Üye";
                                                    }
                                                    elseif ($user["role"] == "2") {
                                                        echo "Moderatör";
                                                    }
                                                ?>
                                            </td>   
                                        <td class=""><?php echo $user['register_time'] ?></td>
                                        <td><a href="edit-users.php?id=<?=$user['id'];?>" class="btn btn-success">Düzenle</a></td>
                                        <td>
                                            <form action="user_process.php" method="post">   
                                                <button type="submit" name="user_delete" value="<?=$user['id'];?>" class="btn btn-danger ">Sil</button>
                                            </form> 
                                        </td>
                                    </tr>
                    <?php
                    }
                }
                else {
                ?>
                <tr>
                  <td colspan="4">
                    Kayıtlı Kullanıcı Bulunamadı.
                  </td>  
                </tr>
                <?php
                }
            ?>
                                        </tbody>
                                    </table>
                                    <?php if ($_SESSION['role'] == 1) {?>
                <a href="add_user.php" class="btn btn-primary float-start">Admin/Kullanıcı Ekle</a>         
            <?php   } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <?php include "footer.php"; ?>

        </div>
    </div>

</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>
