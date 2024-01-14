<?php 
include "sidebar.php";

if ($_SESSION['role'] == 2) {
    $_SESSION['message'] = 'Yetkiniz Bulunmamaktadır';
    header('Location: users.php');
    exit(0);
}
?>

<!doctype html>
<html lang="tr" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Admin Paneli</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
  </head>
  <body>
    

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5"> 
      
<div class="card">
        <div class="card-header">
         <h4>Kullanıcıyı Düzenle
         </h4>
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
                    <form action="user_process.php" method="POST">
                        <input type="hidden" name="id" value="<?=$user['id'];?>">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="username">Kullanıcı Adı</label> 
                                <input type="text"  name="username" value="<?=$user['username'];?>" class="form-control" id="username">  
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="password">Şifre</label>
                                <input type="text" name="password" value="<?=$user['password'];?>" class="form-control" id="password">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="<?=$user['email'];?>" class="form-control" id="email" autocomplete="email">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="role">Yetki</label>
                                <select name="role" required class="form-control" id="role">
                                    <option value="">Yetki Seçiniz</option>
                                    <option value="0" <?=$user['role'] == '0' ? 'selected':'' ?>>Üye</option>
                                    <option value="1" <?=$user['role'] == '1' ? 'selected':'' ?> >Admin</option>
                                    <option value="2" <?=$user['role'] == '2' ? 'selected':'' ?>>Moderatör</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="update_user" class="btn btn-primary">Güncelle</button>
                            </div>
                        </div>
                    </form>
            <?php
                }
            }
            else 
            {
                ?>
                    <h4>Kayıtlı Kullanıcı Bulunamadı</h4>
                <?php

            }
        
        }
        ?>
        
    </div>
</div>

</main> 
</body>
</html>
