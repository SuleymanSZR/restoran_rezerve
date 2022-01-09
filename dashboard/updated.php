<?php include 'includes/connection.php';
include 'includes/adminheader.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div id="update">
    <div class="container">
        <?php

        if ($_POST) {

            $rezerveId = $_POST["id"];
            $kisisayisi = $_POST["Kisi"];
            $rezervetarihi = $_POST["Tarih"];
            $rezervesaati = $_POST["Saat"];
            $telefon = $_POST["Telefon"];

            if ($rezervetarihi < date('Y-m-d')) {
                echo "<script>alert('Geçmiş tarihli rezervasyon yapılamaz.'); window.location.href='update.php?rezerve_id=$rezerveId';</script>";
                die();
            }

            $update = mysqli_query($conn, "UPDATE rezervasyon_bilgileri 
    SET kisi_sayisi = '$kisisayisi', rezerve_tarihi = '$rezervetarihi', rezerve_saati = '$rezervesaati' , telefon = '$telefon'  WHERE  rezerve_id = '$rezerveId'");
            if ($update) {
                echo "<h2 class='onay'>Rezervasyonunuz Güncellenmistir.</h2>";
                header("Refresh:1; url=index.php");
            } else {
                echo "<h2 class='onay'>Beklenmeyen bir hata meydana geldi.</h2>";
            }
        }
        ?>
    </div>
    </div>
</body>

</html>