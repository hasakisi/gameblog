<?php 
include("sidebar.php");

if ($_SESSION['role'] == 2) {
    $_SESSION['message'] = 'Yetkiniz Bulunmamaktadır';
    header('users.php');
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</head>
<body>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5"> 
    
    <?php include("../mysql_/message.php"); ?>
    <div class="card">
        <div class="card-header">
         <h4>Kullanıcı Oluştur
         </h4>
        </div>
    
    <div class="card-body">
    <form action="user_process.php" method="POST">
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="username">Kullanıcı Adı</label> 
                <input type="text"  name="username"  class="form-control" id="username">  
            </div>
            <div class="col-md-12 mb-3">
                <label for="password">Şifre</label>
                <input type="text" name="password"  class="form-control" id="password">
            </div>
            <div class="col-md-12 mb-3">
                <label for="email">Email</label>
                <input type="text" name="email"  class="form-control" id="email" autocomplete="email">
            </div>
            <div class="col-md-12 mb-3">
                <label for="role">Yetki</label>
                <select name="role" required class="form-control" id="role">
                    <option value="">Yetki Seçiniz</option>
                    <option value="0">Üye</option>
                    <option value="1">Admin</option>
                    <option value="2">Moderatör</option>
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" name="add_user" class="btn btn-primary">Ekle</button>
            </div>
        </div>
    </form>