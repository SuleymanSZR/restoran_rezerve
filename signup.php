<?php include 'includes/connection.php'; ?>
<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head></head>

<body>


  <div class="kayitform">
    <h1>Kaydol</h1>

    <form action="register.php" method="POST">
      <div class="form-group">
        <label for="name">Ad Soyad</label>
        <input type="text" id="name" name="name" placeholder="Ad ve Soyad Girin" style="text-transform: capitalize;" required="">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="ornek@ornek.com" required="">
      </div>
      <div class="form-group">
        <label for="username">Kullanıcı Adı</label>
        <input type="text" id="username" name="username" placeholder="Kullanici Adi" required="">
      </div>
      <div class="form-group">
        <label for="password">Sifre</label>
        <input type="password" id="password" name="password" placeholder="******" required="">
      </div>
      <div class="form-group">
        <label for="repassword">Sifrenizi Dogrulayın</label>
        <input type="password" id="repassword" name="repassword" placeholder="******" required="">
      </div>
      <button class="btn signup btn-primary" name="signup" id="signup" type="submit">Kaydet</button>
  </div>

</body>

</html>