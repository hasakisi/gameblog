<?php
ob_start();
session_start();
require "../mysql_/connect.php";
date_default_timezone_set("Europe/Istanbul");
$navlinks = array("Anasayfa", "İletişim", "Kategoriler");
$Kategoriler = array("Popüler Seriler", "Haftanın Önerileri", "Türe Göre");



if (!empty($_SESSION['username'])) {
    $username = $_SESSION["username"];

    if (isset($_SESSION['login'])) {

        $query = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($query);

        $stmt->bind_param("s", $username);

        $stmt->execute();

        if (!$stmt->execute()) {
            echo "Sorgu hatası: " . $stmt->error;
        }

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Kullanıcı bulunamadı";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="../css/header.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="container-fluid sticky-top">
        <header class="p-3 mb-2">
            <div class="container">
                <div class="d-flex flex-wrap">
                    <ul class="nav col-12 col-lg-auto me-lg-auto textcolor">
                        <li class="nav-item textcolor">
                            <a href="../anasayfa/main.php" class="nav-link text-white fw-bold px-2 active"><?php echo $navlinks[0] ?></a>
                        </li>
                        <?php if (isset($_SESSION['login'])) { ?>
                        <li class="nav-item textcolor">
                            <a href="../mysql_/comment.php" class="nav-link text-white fw-bold px-2"><?php echo $navlinks[1] ?></a>
                        </li>
                        <?php } ?>
                        <li class="nav-item textcolor dropdown">
                            <a href="#" class="nav-link text-white fw-bold px-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true"><?php echo $navlinks[2] ?></a>
                            <ul style="background-color: #1a2031;" class="dropdown-menu ">
                                <li><a href="" class="dropdown-item text-white"><?php echo $Kategoriler[0] ?></a></li>
                                <li><a href="" class="dropdown-item text-white"><?php echo $Kategoriler[1] ?></a></li>
                                <li><a href="" class="dropdown-item text-white"><?php echo $Kategoriler[2] ?></a></li>
                            </ul>
                        </li>
                    </ul>
                    <span class="d-flex justify-content-center align-items-center"><?php include("../mysql_/message.php"); ?></span>


                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-5" role="search">
                        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>



                    <?php if (isset($_SESSION['login'])) { ?>
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="../user/user_favorites.php" class="nav-link">
                                <i class="far fa-heart empty nav-link text-white d-flex align-items-center h-100 " onmouseenter="fillHeart(this)" onmouseout="emptyHeart(this)"></i>
                                </a>
                            </li>
                        </ul>
                            <ul class="nav">
                                <li class="nav-item">
                                    <div class="dropdown text-end">
                                        <a href="#" class="nav-link link-body-emphasis text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-regular fa-user text-white me-1 "></i>
                                            <h5 style="text-transform: capitalize;" class="text-white nav-link m-0 p-0 d-inline-block "><?php echo $row["username"] ?></h5>
                                            <i class="fa-solid fa-caret-down text-white ml-2"></i>
                                        </a>
                                        <ul style="background-color: #1a2031;" class="dropdown-menu text-small">
                                            <li><a class="dropdown-item text-white" href="../user/user_profile.php">Hesabımı Görüntüle</a></li>
                                            <?php
                                            if (($row["role"] == "1" or $row["role"] == "2")) { ?>
                                                <li>
                                                    <a class="dropdown-item text-white" href="../admin/index.php?id=<?php echo $row["id"]; ?>">Panel</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-white" href="../light-bootstrap-dashboard-master/examples/user.php">Güzel Panel</a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <form action="../mysql_/logout.php" method="POST">
                                                    <button type="submit" name="logout" class="dropdown-item text-white">Çıkış Yap</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                <?php } else { ?>
                    <ul class="nav">
                        <li class="nav-item me-2">
                            <a href="../mysql_/login.php" class="nav-link btn">
                                Giriş Yap
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../mysql_/signup.php" class="nav-link btn">
                                Kayıt Ol
                            </a>
                        </li>
                    </ul>
                <?php } ?>
                </div>
            </div>
        </header>
    </div>
</body>

</html>