<?php 
include("sidebar.php");
?>

<!doctype html>
<html lang="tr" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Paneli</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="dashboard.css">
    
  </head>
  <body>
    

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5"> 
    <?php include("../mysql_/message.php"); ?>
<div class="card" style="background: linear-gradient(to bottom right, #2ecc71, #3498db);">
        <div class="card-header">
            <h4>
                Oyun Düzenle
            </h4>
        </div>
        <div class="card-body">

            <?php 
                $card_id = $_GET['card_id'];
                $result = mysqli_query($conn, "SELECT * FROM card WHERE card_id = '$card_id' ");
                $card = mysqli_fetch_assoc($result);
            ?>


            <form action="card_code.php"  method="POST" enctype="multipart/form-data">
                <div class="row">
                <input type="hidden" name="card_id" value="<?=$card['card_id'];?>">

                    <div class="col-md-12 mb-3">
                        <label for="title">Başlık</label> 
                        <input type="text" name="title" value="<?= $card['title'];?>" class="form-control" id="title">  
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description">İçerik</label>
                        <input type="text" name="description" class="form-control" value="<?= $card['description'];?>" id="description">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="url">URL</label>
                        <input type="text" name="web_url" value="<?= $card['web_url'];?>" class="form-control" id="url">
                    </div>
                    <div class="input-group col-md-12 mb-3">
                        <img src="../img/<?= $card['image_url']; ?>" class="" alt="...">
                        <input type="file" class="form-control" name="image" id="file">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" name="update_card" class="btn btn-primary">Düzenle</button>
                    </div>
                </div>
            </form>
        </div>

</main> 
</body>
</html>