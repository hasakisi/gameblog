<?php

// Initialize favorites array in session if not already set
if (!isset($_SESSION['favorites']) || !is_array($_SESSION['favorites'])) {
    $_SESSION['favorites'] = array();
}

if (isset($_POST['favorites'])) {
    $card_id = $_POST['card_id'];
    // Check if the card is not already in favorites
    if (!in_array($card_id, $_SESSION['favorites'])) {
        $query = "INSERT INTO favorites (card_id,user_id)  SELECT '$card_id', user.id
        FROM user
        WHERE user.username = '" . $_SESSION["username"] . "'";
        $query_run = mysqli_query($conn, $query);
        // Add card to favorites array in session
        $_SESSION['favorites'][] = $card_id;
    }
}

if (isset($_POST['undo_favorites'])) {
    $card_id = $_POST['card_id'];
    $query = "DELETE FROM favorites WHERE card_id = '$card_id' ";
    $query_run = mysqli_query($conn, $query);
    // Remove card from favorites array in session
    $_SESSION['favorites'] = array_diff($_SESSION['favorites'], array($card_id));
}

?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <div class="container mt-3 mb-3 rounded">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM card");

            if ($result) {
                $counter = 0;
                while ($card = mysqli_fetch_assoc($result)) {
                    if ($counter % 3 == 0) {
                        echo '<div class="row">';
                    }
            ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <form action="" method="post">
                                <input type="hidden" name="card_id" value="<?= $card['card_id']; ?>">
                                <img src="../img/<?= $card['image_url']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $card['title']; ?></h5>
                                    <p class="card-text"><?= $card['description']; ?></p>
                                    <a href="../altsayfa/<?= $card['web_url']; ?>.php" class=" my-2 btn btn-primary">Daha Fazla</a>

                                    <?php if (in_array($card['card_id'], $_SESSION['favorites'])) { ?>
                                        <button type="submit" name="undo_favorites" class="btn btn-danger">Favorilerden Çıkar</button>
                                    <?php } else { ?>
                                        <button type="submit" name="favorites" class="btn btn-success my-3">Favorilere Ekle</button>
                                    <?php } ?>

                                    <i class="far fa-heart empty text-white d-flex 
                                    align-items-center h-100 fa-2xl justify-content-center mt-4" onmouseenter="fillHeart(this)" onmouseout="emptyHeart(this)"></i>
                            </form>
                        </div>
                    </div>
        </div>
    <?php
                    $counter++;
                    if ($counter % 3 == 0) {
                        echo '</div>';
                    }
                }

                if ($counter % 3 != 0) {
                    echo '</div>';
                }
            } else {
    ?>
    <h4>Kayıtlı Kullanıcı Bulunamadı</h4>
<?php
            }
?>
</div>



    </main>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


</body>

</html>