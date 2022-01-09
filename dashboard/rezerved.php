<?php include 'includes/connection.php'; include 'includes/adminheader.php'; ?>

<?php 

$kullaniciId = $_SESSION["id"];
$rezervetarihi = $_POST["Tarih"]; 
$kisisayisi = $_POST["Kisi"];
$rezervesaati = $_POST["Saat"];
$telefon = $_POST["Telefon"];


$add = mysqli_query($conn, "INSERT INTO rezervasyon_bilgileri(kullaniciID,rezerve_tarihi,rezerve_saati,telefon,kisi_sayisi) 
VALUES 
('$kullaniciId' , '$rezervetarihi' , '$rezervesaati', '$telefon' , '$kisisayisi')");
if ($add) {
    echo "<h2 class='onay'>Rezervasyonunuz Tamamlanmıştır.</h2>";
    header("Refresh:1; url=index.php");
}

?>