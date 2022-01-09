<?php include 'includes/connection.php'; include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <?php

  if (isset($_POST['signup'])) {
    require "gump.class.php";
    $gump = new GUMP();
    $_POST = $gump->sanitize($_POST);

    $gump->validation_rules(array(
      'username'    => 'required|alpha_numeric|max_len,20|min_len,1',
      'name'        => 'required|alpha_space|max_len,30|min_len,1',
      'email'       => 'required|valid_email',
      'password'    => 'required|max_len,50|min_len,3',
    ));
    $gump->filter_rules(array(
      'username' => 'trim|sanitize_string',
      'name'     => 'trim|sanitize_string',
      'password' => 'trim',
      'email'    => 'trim|sanitize_email',
    ));
    $validated_data = $gump->run($_POST);

    if ($validated_data === false) {
  ?>
      <center>
        <font color="red">
           <?php echo $gump->get_readable_errors(true); ?>
          </font>
      </center>
  <?php
    } else if ($_POST['password'] !== $_POST['repassword']) {
      echo "<h2 class='onay'>Parolalar uyusmuyor!  lütfen parolaların uyustuğundan emin olun.</h2>";
      header("Refresh:2; url=signup.php");
    } else {
      $kullaniciAdi = $validated_data['username'];
      $kullaniciAdi_kontrol = "SELECT * FROM kullanici WHERE kullaniciAdi = '$kullaniciAdi'";
      $run_kullaniciAdi_kontrol = mysqli_query($conn, $kullaniciAdi_kontrol) or die(mysqli_error($conn));
      $kullaniciAdi_say = mysqli_num_rows($run_kullaniciAdi_kontrol);
      $email = $validated_data['email'];
      $email_kontrol = "SELECT * FROM kullanici WHERE email = '$email'";
      $run_email_kontrol = mysqli_query($conn, $email_kontrol) or die(mysqli_error($conn));
      $email_say = mysqli_num_rows($run_email_kontrol);
      if ($kullaniciAdi_say > 0) {
        echo "<h2 class='onay'>Kullanıcı adı zaten alınmıs! farklı bir tane dene</h2>";

        header("Refresh:1.5; url=signup.php");
      }else if ($email_say > 0) {
        echo "<h2 class='onay'>E-posta zaten alınmıs! farklı bir tane dene</h2>";
        header("Refresh:1.5; url=signup.php");
      } else {
        $adi = $validated_data['name'];
        $sifre = $validated_data['password'];
        $email = $validated_data['email'];
        $joindate = date("F j, Y, G:i, T");
        $add = mysqli_query($conn, "INSERT INTO kullanici(kullaniciAdi,adi,email,sifre,katılma_tarihi) VALUES ('$kullaniciAdi' , '$adi' , '$email', '$sifre' , '$joindate')");
        if ($add) {
          
          echo  "<h2 class='onay'>Kaydınız Basarılı Sekilde Tamamlanmıstır.</h2>";
          header("Refresh:1; url=login.php");
        } else {
          echo  "<h2 class='onay'>Bir şeyler yanlıs gitti. Tekrar deneyin...</h2>";
          header("Refresh:1; url=signup.php");
        }
      }
    }
  }

  ?>

</body>

</html>