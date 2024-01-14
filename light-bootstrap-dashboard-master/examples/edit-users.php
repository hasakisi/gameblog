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
        <?php include "sidebar.php"; 
if ($_SESSION['role'] == 2) {
    $_SESSION['message'] = 'Yetkiniz Bulunmamaktadır';
    header('Location: table.php');
    exit(0);
}
?>

        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> User </a>


                    <?php include "header.php"; ?>



                </div>
            </nav>
            <!-- End Navbar -->









            <div class="content">
                <div class="container-fluid">


                                    <!-- SOL KULLANICI BÖLÜMÜ  -->

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <?php
                                     if(isset($_GET["id"])) {
                                        $id = $_GET["id"];
                                        $users = "SELECT * FROM user WHERE id = '$id' ";
                                        $query = mysqli_query($conn,$users);
                                    
                                        if(mysqli_num_rows($query) > 0 ) 
                                        {
                                            foreach($query as $user)
                                            {
                                            ?>
                                                 <form action="edit_self.php" method="post">
                                                    <div class="row">
                                                        <div class="col-md-5 px-3">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" class="form-control" placeholder="Kullanıcı Adı" value="<?php echo $user['username']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 pl-1">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email address</label>
                                                                <input type="email" class="form-control" value="<?php echo $user['email']; ?>" placeholder="Email">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 pr-1">
                                                            <div class="form-group">
                                                                <label>İsim</label>
                                                                <input type="text" name="name" class="form-control" placeholder="İsim" value="<?php echo $user['name']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl-1">
                                                            <div class="form-group">
                                                                <label>Soyisim</label>
                                                                <input type="text" class="form-control" placeholder="Soyisim" value="<?php echo $user['lastname']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 pr-1">
                                                            <div class="form-group">
                                                                <label>Şifre</label>
                                                                <input type="text" name="password" class="form-control" placeholder="Şifre" value="<?php echo $user['password']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl-1">
                                                            <div class="form-group">
                                                                <label>Kayıt Tarihi</label>
                                                                <input type="text" class="form-control" placeholder="Kayıt Tarihi" value="<?php echo $user['register_time']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label>About Me</label>
                                                                <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                            <label for="role">Yetki</label>
                                                            <select name="role" required class="form-control" id="role">
                                                            <option value="">Yetki Seçiniz</option>
                                                            <option value="0" <?=$user['role'] == '0' ? 'selected':'' ?>>Üye</option>
                                                            <option value="1" <?=$user['role'] == '1' ? 'selected':'' ?> >Admin</option>
                                                            <option value="2" <?=$user['role'] == '2' ? 'selected':'' ?>>Moderatör</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="update_user" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                                    <div class="clearfix"></div>
                                                </form>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <h4>Kayıtlı Kullanıcı Bulunamadı</h4>
                                    <?php

                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>


                    <!-- SAĞ KULLANICI BÖLÜMÜ  -->


                        <div class="col-md-4">
                            <div class="card card-user my-5">
                               
                                <div class="card-body">
                                    <div class="author">
                                        <a href="#">
                                            <img class="avatar border-gray" src="../assets/img/faces/face-3.jpg" alt="...">
                                            <h5 class="title">
                                            <?php echo $user['name'].$user['lastname']; ?>
                                            </h5>
                                        </a>
                                        <p class="description">
                                            <?php echo $user['username']; ?>
                                        </p>
                                    </div>
                                    <p class="description text-center">
                                        "AÇIKLAMA GELECEK
                                        
                                    </p>
                                </div>
                                <hr>
                                <div class="button-container mr-auto ml-auto">
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-twitter"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-google-plus-square"></i>
                                    </button>
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