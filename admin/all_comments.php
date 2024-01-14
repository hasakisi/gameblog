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
        th,
        td {
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
                <h4>Yorumlar</h4>
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

                                            <div class="col-md-12 mb-3">
                                                <label for="subject">Kullanıcı Adı</label>
                                                <input type="text" name="subject" value="<?= $user['username']; ?>" class="form-control" id="subject" readonly>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="subject">Konu</label>
                                                <input type="text" name="subject" value="<?= $user['subject']; ?>" class="form-control" id="subject" readonly>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="comment">Açıklama</label>
                                                <input type="text" name="comment" value="<?= $user['comment']; ?>" class="form-control" id="comment" readonly>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="date_created">Oluşturulma Tarihi</label>
                                                <input type="text" name="date_created" value="<?= $user['date_created']; ?>" class="form-control" id="date_created" readonly>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button type="submit" name="delete_comment" value="<?= $user['comment_id']; ?>" class="btn btn-danger">Sil <i class="fa-solid fa-trash"></i></button>
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
        </div>
    </main>
</body>

</html>