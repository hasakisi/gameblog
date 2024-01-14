<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
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
                    <a class="navbar-brand" href="#pablo"> User </a>


                    <?php include "header.php"; ?>



                </div>
            </nav>
            <!-- End Navbar -->









            <div class="content">
                <div class="container-fluid">


                    
                    <div class="row">


                        <!-- SOL KULLANICI BÖLÜMÜ  -->
                        <div class="col-md-12">
                            <?php include("../../mysql_/message.php"); ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>
                                        Oyun Ekle
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="card_code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label for="title">Başlık</label>
                                                <input type="text" name="title" class="form-control" id="title">
                                            </div>
                                            <div class="col-md-7 mb-3">
                                                <label for="description">İçerik</label>
                                                <input type="text" name="description" class="form-control" id="description">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="url">URL</label>
                                                <input type="text" name="url" class="form-control" id="url">
                                            </div>
                                            <div class="input-group col-md-12 mb-3">
                                                <input type="file" class="form-control p-3" name="image" id="file">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <button type="submit" name="upload-card" class="btn btn-primary">Kart Ekle</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    

                            <!-- SAĞ KULLANICI BÖLÜMÜ  -->


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