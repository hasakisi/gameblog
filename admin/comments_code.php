<?php 

include("yetki.php");

if (isset($_POST['delete_comment'])) {

    $comment_id = $_POST['delete_comment'];

    $query = "DELETE FROM comments WHERE comment_id = '$comment_id'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['message'] = "Mesaj Silinmiştir.";
        header('Location: all_comments.php');
        exit(0);
    }
}
?>