<?php
include("sidebar.php");
?>

<!DOCTYPE html>
<html lang="tr" data-bs-theme="auto">

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
        <div class="card" style="background: linear-gradient(to bottom right, #2ecc71, #3498db);">
            <div class="card-header">
                <h4>Oyunlar
                    <a href="add-card.php" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i>  Yeni Bir Oyun Ekle</a>
                </h4>
            </div>

            <div class="card-body">

                <?php
                $result = mysqli_query($conn, "SELECT * FROM card");
                
                if ($result) {
                    $counter = 0;
                    while ($card = mysqli_fetch_assoc($result)) {
                        if ($counter % 3 == 0) {
                            echo '<div class="row m-2">';
                        }
                ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <input type="hidden" name="card_id" value="<?= $card['card_id']; ?>">
                                <img src="../img/<?= $card['image_url']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $card['title']; ?></h5>
                                    <p class="card-text"><?= $card['description']; ?></p>
                                    
                                    <div class="my-2">
                                    <a href="edit_card.php?card_id=<?=$card['card_id'];?>" class="btn btn-success float-start">Düzenle</a>

                                    <form action="card_code.php" method="post">   
                                        <button type="submit" name="card_delete" value="<?=$card['card_id'];?>" class="btn btn-danger float-end">Sil <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    </div>
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
                    <h4>Kayıtlı Kullanıcı Bulunamadı</h4>
                <?php
                }
                ?>

            </div>
    </main>
</body>

</html>