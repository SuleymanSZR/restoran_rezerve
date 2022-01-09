<?php include 'includes/connection.php';
include 'includes/header.php'; ?>

<?php

session_start();
if ($_POST) {
  $kullaniciAdi  = $_POST['kullaniciAdi'];
  $sifre = $_POST['sifre'];
  mysqli_real_escape_string($conn, $kullaniciAdi);
  mysqli_real_escape_string($conn, $sifre);
  $query = "SELECT * FROM kullanici WHERE kullaniciAdi='" . $kullaniciAdi . "' and sifre='" . $sifre . "' limit 1";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $db_kullaniciAdi = $row['kullaniciAdi'];
      $db_sifre = $row['sifre'];
      $rol = $row['rol'];
      $adi = $row['adi'];
      $email = $row['email'];

      if ($kullaniciAdi == $db_kullaniciAdi && $sifre == $db_sifre) {
        $_SESSION['id'] = $id;
        $_SESSION['kullaniciAdi'] = $kullaniciAdi;
        $_SESSION['adi'] = $adi;
        $_SESSION['rol'] = $rol;
        $_SESSION['email'] = $email;
        $_SESSION['sifre'] = $sifre;

        header('location: dashboard/');
      }
    }
    echo "<script>alert('Geçersiz kullanıcı adı / şifre');
  window.location.href= 'login.php';</script>";
  } else {
    echo "<script>alert('Geçersiz kullanıcı adı / şifre');
      window.location.href= 'login.php';</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<body>
  <div class="login-card">
    <h1>Giris Yap</h1><br>
    <form method="POST">
      <input type="text" name="kullaniciAdi" id="kullaniciAdi" placeholder="Kullanıcı Adı" required="">
      <input type="password" name="sifre" id="sifre" placeholder="Sifre" required="">
      <button class="btn login btn-primary" name="login" id="login" type="submit">Giris Yap </button>
      <a href="signup.php">Kaydol</a>
    </form>
  </div>
</body>

</html>