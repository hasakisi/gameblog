<?php 
include("yetki.php");

if (isset($_POST["upload-card"]) && isset($_FILES['image'])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $url = $_POST["url"];

    $img_name = $_FILES["image"]["name"];
    $img_size = $_FILES["image"]["size"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];


    if ($error === 0) {
        if ($img_size > 10000000) {
            $_SESSION['message'] = 'Fotoğrafın boyutu çok yüksek!.';
            header("Location: add-card.php");
            exit(0);
        }
        else {
            $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg","jpeg","png");

            if (in_array($img_ex_lc,$allowed_exs)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path = '../img/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            }else{
                $_SESSION['message'] = 'Yanlış Dosya Türü!';
                header('Location: add-card.php');
                exit(0);
            }
        }
        
    }
    else{
        $_SESSION['message'] = 'Bilinmeyen Bir hata oluştu.';
        header('Location: add-card.php');
        exit(0);
    }



     $query = "INSERT INTO card (title,description,image_url,web_url) VALUES ('$title','$description','$new_img_name','$url')";
     $query_run = mysqli_query($conn, $query);
     if ($query_run){
         $_SESSION['message'] = "Kart Başarılı bir şekilde eklenmiştir.";
         header("Location:view_cards.php");
         exit(0);
     }
}

if (isset($_POST["card_delete"])) {
    $card_id = $_POST['card_delete'];

    $query = "DELETE FROM card WHERE card_id = '$card_id'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['message'] = "Kart Silinmiştir.";
        header("Location: view_cards.php");
        exit(0);
    }
}


if (isset($_POST["update_card"])) {
    $card_id = $_POST["card_id"];   
    $title = $_POST["title"];
    $description = $_POST["description"];
    $web_url = $_POST["web_url"];

    if (!isset($_FILES['image'])) {
        $new_img_name = $_POST['image'];
    }
    else {
         $img_name = $_FILES["image"]["name"];
        $img_size = $_FILES["image"]["size"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
    
    
        if ($error === 0) {
            if ($img_size > 10000000) {
                $_SESSION['message'] = 'Fotoğrafın boyutu çok yüksek!.';
                header("Location: add-card.php");
                exit(0);
            }
            else {
                $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg","jpeg","png");
    
                if (in_array($img_ex_lc,$allowed_exs)){
                    $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_upload_path = '../img/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                }else{
                    $_SESSION['message'] = 'Yanlış Dosya Türü!';
                    header('Location: add-card.php');
                    exit(0);
                }
            }
            
        }
        else{
            $_SESSION['message'] = 'Bilinmeyen Bir hata oluştu.';
            header('Location: add-card.php');
            exit(0);
        }
    }
    
    
    $new_img_name = $_POST['image'];


    $query = "UPDATE card SET title='$title', description='$description', web_url='$web_url', image_url='$new_img_name' 
    WHERE card_id='$card_id'";
    $query_run = mysqli_query($conn,$query);

    if ($query_run) {
        $_SESSION['message'] = "Başarılı bir şekilde güncellenmiştir."; 
        header("Location: view_cards.php");
        exit(0);
    }
}

?>