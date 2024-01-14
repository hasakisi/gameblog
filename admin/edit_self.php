<?php 

include("yetki.php");
ob_start();

if (isset($_POST["update_user"])) {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    if (isset($_POST['role'])) {
        $role = $_POST["role"];
    }
    else {
        $role = 0;
    }

    $query = "UPDATE user SET username='$username', password='$password', email='$email', role='$role' 
    WHERE id='$id'";
    $query_run = mysqli_query($conn,$query);

    if ($query_run) {
        $_SESSION['message'] = "Başarılı bir şekilde güncellenmiştir."; 
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;


        
        
            header('Location: ../admin/index.php?id=' . $id);
            exit(0);
        
        
    }
}
?>