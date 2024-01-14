<?php
session_start();
ob_start();
include("../mysql_/connect.php");


if (isset($_POST['delete_comment'])) {

    $comment_id = $_POST['delete_comment'];

    $query = "DELETE FROM comments WHERE comment_id = '$comment_id'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['message'] = "Mesajınız Silinmiştir.";
        header('Location: user_comments.php');
        exit(0);
    }
}


if (isset($_POST["update_comment"])) {
    $comment_id = $_POST["update_comment"];

    $subject = $_POST["subject"];
    $comment = $_POST["comment"];

    $query = "UPDATE comments SET subject='$subject', comment='$comment'
        WHERE comment_id='$comment_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Başarılı bir şekilde güncellenmiştir.";
        header("Location: user_comments.php");
        exit(0);
    }
}




if (isset($_POST["update_user"])) {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    

    $query = "UPDATE user SET username='$username', password='$password', email='$email'
        WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Başarılı bir şekilde güncellenmiştir.";
        $_SESSION['username'] = $username;


        header("Location: user_profile.php");
        exit(0);
    }
}



?>