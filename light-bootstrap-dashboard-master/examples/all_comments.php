<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Paneli</title>
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
                                        Yorumlar
                                    </h4>
                                </div>
                                <div class="card-body">
                                <?php
                            $users = "SELECT
                            comments.*,
                            user.username
                            FROM
                            comments
                            INNER JOIN
                            user
                            ON
                            comments.user_id = user.id;
                            ";
                            $query = mysqli_query($conn, $users);

                            if (mysqli_num_rows($query) > 0) {
                                foreach ($query as $user) {
                        ?>
                                   <form action="comments_code.php" class="" method="POST">
                                        <div class="row">

                                            <div class="col-md-4 mb-3">
                                                <label for="subject">Kullanıcı Adı</label>
                                                <input type="text" name="subject" value="<?= $user['username']; ?>" class="form-control" id="subject" readonly>
                                            </div>

                                            <div class="col-md-8 mb-3">
                                                <label for="subject">Konu</label>
                                                <input type="text" name="subject" value="<?= $user['subject']; ?>" class="form-control" id="subject" readonly>
                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <label for="comment">Açıklama</label>
                                                <input type="text" name="comment" value="<?= $user['comment']; ?>" class="form-control" id="comment" readonly>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="date_created">Oluşturulma Tarihi</label>
                                                <input type="text" name="date_created" value="<?= $user['date_created']; ?>" class="form-control" id="date_created" readonly>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button type="submit" name="delete_comment" value="<?= $user['comment_id']; ?>" class="btn btn-danger">Sil</button>
                                            </div>
                                         
                                            <hr class="mt-2 border-2">
                                        </div>
                                    </form>


                                <?php

                                }
                            } else {
                                ?>
                                <h4 class="my-5" style="color: red;">Yorum Bulunmamaktadır.</h4>
                        <?php

                            }
                        
                        ?>
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