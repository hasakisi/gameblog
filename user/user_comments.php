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
                        <h4>Yorumlarınız
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                            $users = "SELECT * FROM comments
                            INNER JOIN user ON comments.user_id = user.id
                            WHERE user.id = '{$_SESSION["id"]}';";
                   
                            $query = mysqli_query($conn, $users);

                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $user) {
                        ?>

                                    <form action="user_code.php" class="my-4" method="POST">
                                        <div class="row">
                                
                                            <div class="col-md-12 mb-3">
                                                <label for="subject">Konu</label>
                                                <input type="text" name="subject" value="<?= $user['subject']; ?>" class="form-control" id="subject">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="comment">Açıklama</label>
                                                <input type="text" name="comment" value="<?= $user['comment']; ?>" class="form-control" id="comment">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="date_created">Oluşturulma Tarihi</label>
                                                <input type="text" name="date_created" value="<?= $user['date_created']; ?>" class="form-control" id="date_created" readonly>
                                            </div>
                                           
                                            <div class="col-md-12 mb-3">
                                                <button type="submit" name="update_comment" value="<?=$user['comment_id'];?>" class="btn btn-primary "><i class="fa-solid fa-user-pen"></i> Güncelle</button>
                                        
                                                    <button type="submit" name="delete_comment" value="<?=$user['comment_id'];?>" class="btn btn-danger mx-4">Sil  <i class="fa-solid fa-trash"></i></button>
                                                    
                                            </div>
                                            <div class="col-md-6   mb-3">

                                            </div>


                                            <hr class="mt-2 border-2">
                                        </div>
                                    </form>


                                        <?php  
                                        
                                    }
                               
                                } 
                            else {
                                    ?>
                                    <h4  class="my-5" style="color: red;">Yorumunuz Bulunmamaktadır.</h4>
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