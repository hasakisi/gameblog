<?php 
include("sidebar.php");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>
    th,td{
        background: linear-gradient(to bottom right, #2ecc71, #3498db);
    }
    td {
        color: white;
    }
</style>
</head>
<body>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5"> 
    
    <?php include("../mysql_/message.php"); ?>
    <div class="card" style="background: linear-gradient(to bottom right, #2ecc71, #3498db);
">
        <div class="card-header">
         <h4>Kayıtlı Kullanıcılar
            
         </h4>
        </div>
    
    <div class="card-body">

    
    <table class="table table-bordered my-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kullanıcı Adı</th>
                <th>Email</th>
                <th>Yetkiniz</th>
                <th>Kayıt Tarihi</th>
                <th>Düzenle</th>
                <th>Sil</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM user";
                $query_run = mysqli_query($conn, $query);
                
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $user) {
                    ?>
                        <tr>
                            <td class="text-white"><?=$user['id'];?></td>
                            <td class="text-white"><?php echo $user['username'];?></td>
                            <td class="text-white"><?php echo $user['email'];?></td>
                            <td class="text-white"><?php 
                                    if ($user['role'] == '1') {
                                        echo "Admin";
                                    } 
                                    elseif ($user["role"] == "0") {
                                        echo "Üye";
                                    }
                                    elseif ($user["role"] == "2") {
                                        echo "Moderatör";
                                    }
                                ?>
                            </td>   
                            <td class="text-white"><?php echo $user['register_time'] ?></td>
                            <td><a href="edit-users.php?id=<?=$user['id'];?>" class="btn btn-success">Düzenle</a></td>
                            <td>
                                <form action="user_process.php" method="post">   
                                    <button type="submit" name="user_delete" value="<?=$user['id'];?>" class="btn btn-danger ">Sil  <i class="fa-solid fa-trash"></i></button>
                                </form> 
                            </td>
                        </tr>
                    <?php
                    }
                }
                else {
                ?>
                <tr>
                  <td colspan="4">
                    Kayıtlı Kullanıcı Bulunamadı.
                  </td>  
                </tr>
                <?php
                }
            ?>
        </tbody>
    </table>
            <?php if ($_SESSION['role'] == 1) {?>
                <a href="add_user.php" class="btn btn-primary float-start"><i class="fa-solid fa-plus"></i>Admin/Kullanıcı Ekle</a>         
            <?php   } ?>
    </div>
</div>
</main>
</body>
</html>