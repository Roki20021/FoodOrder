<?php
session_start();
require('connect.php');
$id_usera = $_SESSION['id_usera'];
$id = $_POST['id'];
$nazwa_potrawy = $_POST['tytul'];
 $id_potrawy = $_POST['id'];
 $tytul = $_POST['tytul'];
 $cena = $_POST['cena'];
 $ilosc = $_POST['ilosc'];
 //$godz_zam = date("h:i:s");
 //$data_zam = date("j. n. Y");
 $suma = $cena *$ilosc;

 



    $query = "INSERT INTO `koszyk`(`id_zamowienia`, `id_usera`, `id_potrawy`,`nazwa_potrawy`, `cena`, `ilosc`) VALUES ('','$id_usera','$id','$nazwa_potrawy','$suma','$ilosc');";      
    $wynik = mysqli_query($polaczenie, $query);           
      
 header('Location: index.php');
?>