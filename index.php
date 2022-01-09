<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

            $(function() {
                $('.show_menu').click(function() {
                    $('.menu').fadeIn();
                    $('.show_menu').fadeOut();
                    $('.hide_menu').fadeIn();
                });
                $('.hide_menu').click(function() {
                    $('.menu').fadeOut();
                    $('.show_menu').fadeIn();
                    $('.hide_menu').fadeOut();
                });
            });
        });
    
    </script>
    
    <div class="container">
        <div class="row justify-content-center">
        <h2 class="hg">SZR Restoran'a Hosgeldiniz</h2> 
        </div>
   </div>

    <div class="slider_container">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <a href="#"><img src="assets/images/slider/resim1.jpg" alt="" title="" /></a>
                    <div class="flex-caption">
                        <div class="caption_title_line">
                            <h2>SZR Restoran</h2>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#"><img src="assets/images/slider/resim2.jpg" alt="" title="" /></a>
                    <div class="flex-caption">
                        <div class="caption_title_line">
                            <h2>SZR Restoran</h2>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#"><img src="assets/images/slider/resim3.jpg" alt="" title="" /></a>
                    <div class="flex-caption">
                        <div class="caption_title_line">
                            <h2>SZR Restoran</h2>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#"><img src="assets/images/slider/resim4.jpg" alt="" title="" /></a>
                    <div class="flex-caption">
                        <div class="caption_title_line">
                            <h2>SZR Restoran</h2>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    

    <div class="container kısım2 ">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: center;">
                <h2>Rezervasyon yapmak için tıklayınız ...</h2>
                <a href="login.php"> <button class="btn btn-success">Rezerve Et</button> </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: center;">
                <h2>Kayıt olmak için tıklayınız ...</h2>
                <a href="signup.php"><button class="btn btn-primary">Kaydol</button> </a>
            </div>

        </div>
    </div>


<footer id="footer">
    <div class="container">
      <h3>SZR Restoran</h3>
    </div>
</footer>
  
</body>
</html>