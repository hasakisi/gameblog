<?php
include "../anasayfa/header.php";

setlocale(LC_TIME, "Turkish");

$originalDate = $_SESSION['register_time'];
$dateTime = new DateTime($originalDate);
$newDate = $dateTime->format('d F Y');






if (isset($_POST['send_comment'])) {
    $subject = $_POST['subject'];
    $comment = $_POST['comment'];

    $query = "INSERT INTO comments (subject, comment, user_id)
    SELECT '$subject', '$comment', user.id
    FROM user
    WHERE user.username = '" . $_SESSION["username"] . "'";



    $query_run = mysqli_query($conn, $query);


    if ($query_run) {
        $_SESSION['message'] = "Yorumunuz Eklenmiştir!  Teşekkür ederiz.";
        header("Location: ../anasayfa/main.php");
        exit;
    } 
    else {
        echo "Bir Hata oluştu";
    }
}



?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Yorum Yap</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1a2031;
            color: #cdd3e5;
        }

        #user {
            color: #cdd3e5;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-control {
            background-color: #3e455e;
            color: #cdd3e5;
            border-color: #3e455e;
        }

        label {
            margin-bottom: 5px;
        }

        #comment {
            resize: none;
        }

        .btn-primary {
            background-color: #314087;
            border-color: #314087;
        }

        .btn-primary:hover {
            background-color: #1f2e5e;
            border-color: #1f2e5e;
        }
    </style>
</head>

<body>




    <div class="container my-5 d-flex justify-content-center align-items-center ">
        <h5>Sayın <?php echo $_SESSION['username']; ?>, sitemiz hakkındaki düşüncelerinizi bizimle paylaşabilirsiniz.</h5>
    </div>

    <div style="margin-top: 7rem;" class="container">
        <div class="row text-white">
            <div class="col-md-4">
                <div id="user">
                    <h4><?php echo $_SESSION['username']; ?></h4>
                </div>
                
                <div class="row my-3">
                    <div class="col-md-4">Üyelik Tarihi:</div>
                    <div class="col-md-8"><?php echo $newDate; ?></div>
                </div>

                <div class="row my-5">
                    <div class="col-md-4">Mesaj Sayısı:</div>
                    <div class="col-md-8">
                        <?php 
                            $query = mysqli_query($conn,"SELECT COUNT(user_id) AS yorumsayisi FROM comments INNER JOIN user ON comments.user_id = user.id
                            WHERE user.id = '{$_SESSION["id"]}'");
                            
                            $yorumsayisi = mysqli_fetch_assoc($query)["yorumsayisi"];
                            echo $yorumsayisi;
                            
                        ?>                    
                    
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col-md-4">Rolünüz:</div>
                    <div class="col-md-8">


                        <?php 
                        $role = $_SESSION['role'];
                            if ($role == 0) {
                                echo "Üye";
                            }
                            elseif ($role == 1) {
                                echo "Admin";
                            }
                            elseif ($role == 2) {
                                echo "Moderatör";
                            }
                        ?>
                    
                    </div>
                </div>

            </div>









            <div class="col-md-8">
                <form action="" class="form-signin" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="subject">Konu</label>
                            <input type="text" name="subject" required value="" class="form-control" id="subject">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="comment">Yorumunuz</label>
                            <textarea name="comment" id="comment" required class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="send_comment">Gönder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>