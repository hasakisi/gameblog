<?php
require "../mysql_/connect.php";
include("yetki.php");
if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
  $users = "SELECT * FROM user WHERE id = '$id' ";
} else {
  echo "Kullanıcı Bulunamadı";
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <style>
    * {
      font-family: "Poppins", sans-serif;
    }
   
  </style>

</head>

<body>
<header class="navbar sticky-top  flex-md-nowrap p-0  d-flex justify-content-center align-items-center"  style="background: linear-gradient(45deg, #2ecc71, #3498db);">
    <h5 style="text-transform: capitalize;" class="navbar px-3 fs-4 text-light " href="#">Merhaba <?php echo $_SESSION['username']; ?></h5>
</header>


  <div class="container-fluid">
    <div class="row">
      <div class="sidebar col-md-3 col-lg-2 p-0" style="background: linear-gradient(180deg, #2ecc71, #3498db);">
        <div class="offcanvas-md offcanvas-end " tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">

          <div class="offcanvas-body d-md-flex flex-column p-0   pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
              <li class="nav-item d-flex align-items-center my-2 ">
              <i class="mx-3 fa-solid fa-house"></i>
                <a class="mx-2 text-decoration-none text-light fs-5" aria-current="page" href="../anasayfa/main.php">
                  Anasayfa
                </a>
              </li>
              <li class="nav-item d-flex align-items-center my-2 ">
                <i class="mx-3 fa-solid fa-address-card "></i>
                <a class="mx-2 text-decoration-none text-light fs-5" href="../admin/index.php?id=<?php echo $_SESSION['id']; ?>">Bilgileriniz
                </a>
              </li>

              <li class="nav-item d-flex align-items-center  my-2 ">
              <i class="mx-3 fa-regular fa-user "></i>
              <a class="mx-2 text-decoration-none text-light fs-5" href="users.php">
                  Kayıtlı Kullanıcılar
                </a>
              </li>
              <li class="nav-item d-flex align-items-center  my-2">
              <i class=" mx-3 fa-solid fa-gamepad"></i>
                <a class="text-decoration-none text-light fs-5" href="view_cards.php">
                  Oyunlar
                </a>
              </li>
              <li class="nav-item d-flex align-items-center my-2">
              <i class="mx-3 fa-solid fa-plus"></i>
              <a class="text-decoration-none text-light fs-5" href="add-card.php">
                  Oyun Ekleme
                </a>
              </li>
              <li class="nav-item d-flex align-items-center my-2 ">
              <i class=" mx-3 fa-solid fa-comment"></i>              
              <a class="text-decoration-none text-light fs-5" href="all_comments.php">Gelen Yorumlar
              </a>
            </li>
            </ul>



            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
            <li class="nav-item d-flex align-items-center my-2 mt-2">
                <i class="mx-3 fa-solid fa-gear"></i>
                <a class="text-decoration-none text-dark fs-5 ms-2" href="../user/user_profile.php">
                    Hesabımı Görüntüle
                </a>
            </li>
            <li class="nav-item d-flex align-items-center my-1 mt-2">
               <i class=" mx-3 fa-solid fa-right-from-bracket"></i>
                <form action="../mysql_/logout.php" method="POST">
                    <button type="submit" name="logout" class="btn text-black fs-5">Çıkış Yap</button>
                </form>
            </li>
            </ul>
          </div>
        </div>
      </div>
</body>

</html>