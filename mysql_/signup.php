<?php
session_start();
require "connect.php";


if (isset($_POST['send'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];

  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email='$email' ");
  $query = mysqli_query($conn, "SELECT * FROM user");
  $row = mysqli_fetch_assoc($query);
  if (mysqli_num_rows($duplicate) > 0) {
    $_SESSION['message'] = "Kullanıcı adı veya email daha önceden kullanılmış!";
  } else {
    $query = "INSERT INTO user(username,password,email,name,lastname) VALUES('$username','$password','$email','$name','$lastname')";
    $check_query = mysqli_query($conn, $query);

    if ($check_query) {
      $_SESSION['message'] = "Kayıt Başarılı bir şekilde oluşturulmuştur.";
      header('Location: ../anasayfa/main.php');
      exit(0);
    }
  }
}



?>

<!doctype html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/log.css?v=<?php echo time(); ?>">

  <title>Kayıt Olunuz</title>


</head>


<body class="">

  <section>
    <div class="form-box">
      <div class="form-value">
        <form action="" method="post">
          <?php include("message.php"); ?>
          <h2>Kayıt Olun</h2>
          
          <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" name="email" id="email" required>
            <label for="email">Email</label>
          </div>

          <div class="inputbox">
            <ion-icon name="person-outline"></ion-icon>
            <input type="text" name="name" id="name" required>
            <label for="name">İsim</label>
          </div>

          <div class="inputbox">
            <ion-icon name="person-outline"></ion-icon>
            <input type="text" name="lastname" id="lastname" required>
            <label for="lastname">Soyisim</label>
          </div>

          <div class="inputbox">
            <ion-icon name="person-outline"></ion-icon>
            <input type="text" name="username" id="username" required>
            <label for="username">Kullanıcı Adı</label>
          </div>



          <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="password" id="password" required>
            <label for="password">Şifre</label>
          </div>

         

          <button name="send" type="submit">Kayıt Olun</button>
          <div class="register">
            <p>Hesabınız Mı Var <a href="login.php">Giriş Yap</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>



  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>















