<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>Hesap Bilgileri</title>
</head>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #1a2031;
  }

  main {
    margin-top: 6rem;
  }
</style>

<body>


  <?php include "../anasayfa/header.php" ?>

  <main>
    <div class="container  rounded-5 col-9 my-5" style="background-color:#cdd3e5">
      <div class="row flex-lg-row  g-5 py-5">
        <div class="col-3 border-end border-2">
          <ul class="nav flex-column">
            <li class="nav-item d-flex align-items-center my-2 ">
              <i class="mx-3 fa-solid fa-house"></i>
              <a class="mx-2 text-decoration-none text-dark fs-5" aria-current="page" href="../anasayfa/main.php">
                Anasayfa
              </a>
            </li>
            <li class="nav-item d-flex align-items-center my-2 ">
              <i class="mx-3 fa-solid fa-address-card "></i>
              <a class="mx-2 text-decoration-none text-dark fs-5" href="user_profile.php">Bilgileriniz
              </a>
            </li>
            <li class="nav-item d-flex align-items-center  my-2 ">
              <i class="far fa-heart empty nav-link text-white d-flex align-items-center h-100 " onmouseenter="fillHeart(this)" onmouseout="emptyHeart(this)"></i>
              <a class="mx-2 text-decoration-none text-dark fs-5" href="user_favorites.php">
                Favorileriniz
              </a>
            </li>
            <li class="nav-item d-flex align-items-center my-2 ">
            <i class=" mx-3 fa-solid fa-comment"></i>              
              <a class="mx-2 text-decoration-none text-dark fs-5" href="user_comments.php">Yorumlarınız
              </a>
            </li>
          </ul>



          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <!-- <li class="nav-item d-flex align-items-center my-2 mt-2">
                <i class="mx-3 fa-solid fa-gear"></i>
                <a class="text-decoration-none text-dark fs-5 ms-2" href="#">
                    Hesabımı Görüntüle
                </a>
            </li> -->
            <li class="nav-item d-flex align-items-center my-1 mt-2">
              <i class=" mx-3 fa-solid fa-right-from-bracket"></i>
              <form action="../mysql_/logout.php" method="POST">
                <button type="submit" name="logout" class="btn text-black fs-5">Çıkış Yap</button>
              </form>
            </li>
          </ul>
        </div>


        <div class="col-9">
          <?php include("../mysql_/message.php"); ?>

          <div class="card-header">
            <h4>Kullanıcı Bilgileriniz
            </h4>
          </div>
          <div class="card-body">

            <?php
            if (isset($_SESSION["id"])) {
              $id = $_SESSION["id"];
              $users = "SELECT * FROM user WHERE id = '$id' ";
              $query = mysqli_query($conn, $users);

              if (mysqli_num_rows($query) > 0) {
                foreach ($query as $user) {
            ?>

                  <form action="user_code.php" method="POST">
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <label for="username">Kullanıcı Adınız</label>
                        <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" id="username">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="password">Şifreniz</label>
                        <input type="text" name="password" value="<?= $user['password']; ?>" class="form-control" id="password">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="email">Emailiniz</label>
                        <input type="text" name="email" value="<?= $user['email']; ?>" class="form-control" id="email" autocomplete="email">
                      </div>

                      


                      <div class="col-md-12 mb-3">
                        <label for="role">Rolünüz</label>
                        <input type="text" name="role" value="<?php if ($user['role'] == 0) {
                                  echo "Üye";
                          }
                                  elseif ($user['role'] == 1) {
                                    echo "Admin";
                                  }
                                  elseif ($user['role'] == 2) {
                                    echo "Moderatör";
                                  }
                      ?>
" 
                        class="form-control" id="role" readonly>
                      </div>

                      <div class="col-md-12 mb-3">
                        <button type="submit" name="update_user" class="btn btn-primary"><i class="fa-solid fa-user-pen"></i> Güncelle</button>
                      </div>
                    </div>
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
    </div>
  </main>




  <script src="../js/script.js"></script>

</body>

</html>