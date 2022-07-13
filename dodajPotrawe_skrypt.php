<?php
session_start();
require('connect.php');
$nazwa = $_POST['tytul'];
$opis = $_POST['opis'];   
$cena = $_POST['Cena'];   
$kategoria = $_POST['katergoria_id'];  
if(strlen($nazwa)&& strlen($opis)&& isset($cena)&& strlen($kategoria) ){
   
$kategoria = $_POST['katergoria_id'];  
    $dodaj = "INSERT INTO `food`(`id`, `tytul`, `opis`, `cena`, `kategoria_id`) VALUES ('','$nazwa','$opis','$cena','$kategoria')";
    $dodaj_do_bazy = mysqli_query($polaczenie,$dodaj);
    $_SESSION['potrawa_dodana']=time();
}else{
	$_SESSION['potrawa_nie_dodana']=time();
}
header('Location: dodajPotrawe.php');

?>