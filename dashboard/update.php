<?php include 'includes/connection.php';
include 'includes/adminheader.php'; ?>
<?php

$rezerve_id = $_GET['rezerve_id'];

$show = mysqli_query($conn, "SELECT * FROM kullanici as k JOIN rezervasyon_bilgileri AS rb ON k.id = rb.kullaniciID where rb.rezerve_id=$rezerve_id limit 1");
$result = mysqli_fetch_array($show);

if (!$result) {
    echo "<h2 class='onay'>Veri bulanamadı.</h2>";
    header("refresh:1; url=index.php");
    die();
}

?>
<div class="container">
    <div class="updateform">
        <form method="post" id="updateForm" action="updated.php">
            <h1>Rezerve Güncelle</h1>
            <div class="form-group">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $result['rezerve_id']; ?>" readonly>
            </div>            
            <div class="form-group">
                <label for="email">Ad:</label>
                <input type="text" class="form-control" name="Adi" id="Adi" value="<?php echo $result['adi']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="Email" id="Email"  value="<?php echo $result['email']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">Kaç kisi olacaksınız?</label>
                <input type="number" class="form-control" name="Kisi" id="Kisi" placeholder="Ör:5" value="<?php echo $result['kisi_sayisi']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Rezervasyon Tarihi:</label>
                <input type="date" class="form-control" name="Tarih" id="Tarih" value="<?php echo $result['rezerve_tarihi']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Rezervasyon Saati:</label>
                <input type="time" class="form-control" name="Saat" id="Saat" value="<?php echo $result['rezerve_saati']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Telefon Numarası:</label>
                <input type="tel" step="any" class="form-control" placeholder="Telefon numaranız" name="Telefon" id="Telefon" value="<?php echo $result['telefon']; ?>" required>
            </div>
            <div style="text-align: center;">
                <button type="submit" class="btn update btn-success" style=" font-size: 20px; border-radius:20px;">Güncelle</button>
            </div>
        </form>
    </div>
</div>