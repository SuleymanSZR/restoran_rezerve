<?php
$conn = mysqli_connect("localhost","root","","restoran" ) or die("mySQL bağlantisi saglanamadi." . mysqli_error($conn));

mysqli_query($conn, "set names 'utf-8'");
mysqli_query($conn, "SET CHARACTER SET utf-8");

?>