<?php include('includes/connection.php');
include('includes/adminheader.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Hosgeldiniz <small><?php echo $_SESSION['adi']; ?></small>
                    </h1>
                    <?php if ($_SESSION['rol'] == 'admin') { 
                        ?>
                        <div class="row">
                            <div class="container">
                                <p id="date" class="cntr"></p>
                                <h2>Randevular</h2>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="cntr">Adı</th>
                                            <th scope="col" class="cntr">Mail</th>
                                            <th scope="col" class="cntr">Rezerve Tarihi</th>
                                            <th scope="col" class="cntr">Rezerve Saati</th>
                                            <th scope="col" class="cntr">Telefon Numarası</th>
                                            <th scope="col" class="cntr">Kisi Sayısı</th>
                                            <th scope="col" class="cntr">Islem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM kullanici as k JOIN rezervasyon_bilgileri AS r ON k.id = r.kullaniciID ORDER BY rezerve_tarihi,rezerve_saati ASC";

                                        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                        if (mysqli_num_rows($run_query) > 0) {
                                            while ($row = mysqli_fetch_array($run_query)) {
                                                $rezerve_id = $row['rezerve_id'];
                                                $adi = $row['adi'];
                                                $email = $row['email'];
                                                $rezerve_tarihi = $row['rezerve_tarihi'];
                                                $rezerve_saati = $row['rezerve_saati'];
                                                $telefon = $row['telefon'];
                                                $kisi_sayisi = $row['kisi_sayisi'];


                                                echo "<tr>";
                                                echo "<td class='cntr' style='text-transform: capitalize'>$adi</td>";
                                                echo "<td class='cntr'>$email</td>";
                                                echo "<td class='cntr'>$rezerve_tarihi</td>";
                                                echo "<td class='cntr'>$rezerve_saati</td>";
                                                echo "<td class='cntr'>$telefon</td>";
                                                echo "<td class='cntr'>$kisi_sayisi</td>";
                                                echo "<td><a onClick=\"javascript: return confirm('Bu rezervasyonu iptal etmek istediğinizden emin misiniz?')\" class='btn islem btn-danger' href='?sil=$rezerve_id'>Iptal Et</a></td>";

                                                echo "</tr>";
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    <?php
                        if (isset($_GET['sil'])) {
                            $rezerve_sil = mysqli_real_escape_string($conn, $_GET['sil']);
                            $sil_query = "DELETE FROM rezervasyon_bilgileri WHERE rezerve_id='$rezerve_sil'";
                            $run_sil_query = mysqli_query($conn, $sil_query) or die(mysqli_error($conn));
                            if (mysqli_affected_rows($conn) > 0) {
                                echo "<script>alert('Rezervasyon Başarıyla İptal Edildi.');
                                        window.location.href='index.php';</script>";
                            }
                        }

                    ?>
                    <?php
                    } else {
                    ?>
                        <div class="row">
                            <div class="container">
                                <p id="date" class="cntr"></p>
                                <h2>Randevularım</h2>
                                <table class="table table-bordered table-striped table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="cntr">Adınız</th>
                                            <th scope="col" class="cntr">Mailiniz </th>
                                            <th scope="col" class="cntr">Rezerve Tarihiniz</th>
                                            <th scope="col" class="cntr">Rezerve Saatiniz</th>
                                            <th scope="col" class="cntr">Telefon No</th>
                                            <th scope="col" class="cntr">Kisi Sayınız</th>
                                            <th scope="col" class="cntr">Düzenle</th>
                                            <th scope="col" class="cntr">Iptal Et</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $Adi = $_SESSION['adi'];

                                        $query = "SELECT * FROM kullanici as k JOIN rezervasyon_bilgileri AS r ON k.id = r.kullaniciID WHERE adi = '$Adi' ORDER BY rezerve_tarihi,rezerve_saati ASC";

                                        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                        if (mysqli_num_rows($run_query) > 0) {
                                            while ($row = mysqli_fetch_array($run_query)) {
                                                $rezerve_id = $row['rezerve_id'];
                                                $adi = $row['adi'];
                                                $email = $row['email'];
                                                $rezerve_tarihi = $row['rezerve_tarihi'];
                                                $rezerve_saati = $row['rezerve_saati'];
                                                $telefon = $row['telefon'];
                                                $kisi_sayisi = $row['kisi_sayisi'];


                                                echo "<tr>";
                                                echo "<td class='cntr' style='text-transform: capitalize'>$adi</td>";
                                                echo "<td class='cntr'>$email</td>";
                                                echo "<td class='cntr'>$rezerve_tarihi</td>";
                                                echo "<td class='cntr'>$rezerve_saati</td>";
                                                echo "<td class='cntr'>$telefon</td>";
                                                echo "<td class='cntr'>$kisi_sayisi</td>";
                                                echo "<td class='cntr'><a href='update.php?rezerve_id=".$rezerve_id."'><button class='btn islem btn-primary' type='button'>Düzenle</button></a></td>";
                                                echo "<td class='cntr'><a onClick=\"javascript: return confirm('Rezervasyonunuzu iptal etmek istediğinizden emin misiniz?')\" class='btn islem btn-danger' href='?sil=$rezerve_id'>Iptal Et</a></td>";    
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                                if (isset($_GET['sil'])) {
                                    $rezerve_sil = mysqli_real_escape_string($conn, $_GET['sil']);
                                    $sil_query = "DELETE FROM rezervasyon_bilgileri WHERE rezerve_id='$rezerve_sil'";
                                    $run_sil_query = mysqli_query($conn, $sil_query) or die(mysqli_error($conn));
                                    if (mysqli_affected_rows($conn) > 0) {
                                        echo "<script>alert('Rezervasyonunuz Başarıyla İptal Edildi');
                                                window.location.href='index.php';</script>";
                                    }
                                }

                            ?>

                            <div class="container text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" id="btnrezerve" data-toggle="modal" data-target="#yeniVeriBtn"> Rezerve Et </button>
                            </div>
                            <a></a>



                            <!-- Rezerve Modal -->
                            <div class="modal fade" id="yeniVeriBtn" tabindex="-1" role="dialog" aria-labelledby="yeniVeriBtnLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rezerveModal">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h1 class="modal-title" id="yeniVeriBtnLabel">Rezerve Yap</h1>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form method="post" id="kayitForm" action="rezerved.php">
                                                <div class="form-group">
                                                    <label for="email">Ad:</label>
                                                    <input type="text" class="form-control" name="Adi" id="Adi" value="<?php echo $_SESSION['adi']; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">E-mail:</label>
                                                    <input type="email" class="form-control" name="Email" id="Email" value="<?php echo $_SESSION['email']; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Kaç kisi olacaksınız?</label>
                                                    <input type="number" class="form-control" placeholder="Ör: 5" name="Kisi" id="Kisi" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Rezervasyon Tarihi:</label>
                                                    <input type="date" class="form-control" name="Tarih" id="Tarih" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Rezervasyon Saati:</label>
                                                    <input type="time" class="form-control" name="Saat" id="Saat" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Telefon Numarası:</label>
                                                    <input type="tel" step="any" class="form-control" placeholder="Telefon numaranız" name="Telefon" id="Telefon" required>
                                                </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                            <button type="button" class="btn btn-primary" id="btnRezerveEt">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        <?php }

        ?>


        </div>
    </div>
</div>



<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
now =  new Date();
year = now.getFullYear();
month = now.getMonth() + 1;
day = now.getDate();
document.getElementById("date").innerHTML = year + " - " + month + " - " + day;
</script>

<script>
$('#btnRezerveEt').click(function () {
    const tarih = $('#Tarih').val();
    const date = new Date();
    const today = date.getFullYear() +'-'+ '0' +(date.getMonth() + 1) +'-'+ '0' + date.getDate();
    
    if (tarih < today) {
        alert("Geçmiş tarihli rezervasyon yapılamaz.");
    } else {
        $("#kayitForm").submit();
    }
});
</script>

    
</body>
</html>