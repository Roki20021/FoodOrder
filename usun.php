<?php
session_start();
require('connect.php');
$id = $_POST['id'];
$usun = mysqli_query($polaczenie,"DELETE FROM `food` WHERE id = '$id'" );
header('Location: potrawy.php');
?>