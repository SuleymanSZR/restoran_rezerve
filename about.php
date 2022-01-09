<?php include 'includes/connection.php'; ?>
<?php include 'includes/header.php'; ?>


<!DOCTYPE html>
<html>

<head>

</head>

<body>
  <!-- jQuery -->
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <!-- FlexSlider -->
  <script type="text/javascript" src="assets/js/jquery.flexslider-min.js"></script>
  <script type="text/javascript" charset="utf-8">
    var $ = jQuery.noConflict();
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "fade"
      });
    });
  </script>
  <div class="slider_container">
    <div class="flexslider">
      <ul class="slides">
        <li>
          <a href="#"><img src="assets/images/slider/resim1.jpg" alt="" title="" /></a>
        </li>
      </ul>
    </div>
  </div>

  <section id="about" class="about">
    <div class="container">
        <div class="content">
        <h3>SZR Restoran 2021 tarihinde Süleyman SEZER tarafından açılmıstır. </h3>
          <p class="font-italic">
            Müsterilerin aradıkları zaman ulasamama sorununa son.
          </p>
          <p class="font-italic">
            Istedigin zaman istedigin yerden anında online rezerve sansı.
          </p>
          <p class="font-italic">
            Dilediginiz anda anlık olarak rezervasyonunuzu düzenleyebilir veya iptal edebilirsiniz.
          </p>
        </div>
    </div>
  </section>

</body>

</html>