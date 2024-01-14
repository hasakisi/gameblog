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
            <h4>Favori Oyunlarınız
            </h4>
          </div>
          <div class="card-body">

            <?php
           
            $query = "SELECT * FROM favorites
                INNER JOIN user ON favorites.user_id = user.id
                WHERE user.id = '{$_SESSION["id"]}';";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
              $counter = 0;
              while ($card = mysqli_fetch_assoc($query_run)) {
                $card_id = $card['card_id'];
                  if ($counter % 3 == 0) {
                      echo '<div class="row m-2">';
                  }
          ?>
                  <div class="col-md-4">
                      <div class="card mb-4">
                          <input type="hidden" name="card_id" value="<?= $card['card_id']; ?>">
                          <?php 
                          
                            $query = mysqli_query($conn,"SELECT * FROM card INNER JOIN favorites ON card.card_id = favorites.card_id WHERE favorites.card_id = '$card_id' ");
                            $row = mysqli_fetch_assoc($query);

                          ?>
                          <img src="../img/<?= $row['image_url']; ?>" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h5 class="card-title"><?= $row['title']; ?></h5>
                              <p class="card-text"><?= $row['description']; ?></p>
                              
                             
                          </div>
                      </div>
                  </div>
              <?php
                  $counter++;
                  if ($counter % 3 == 0) {
                      echo '</div>';
                  }
              }
          } else {
              ?>
              <h4>Oyun Eklenmemiştir</h4>
          <?php
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