<?php
session_start();
require('connect.php');
	

    $id_usera =  $_SESSION['id_usera']; 
    if($id_usera==0){
        $_SESSION['error_zamowienie_zaloguj_sie']="Zaloguj się";
        header("Location: koszyk.php");
    }  
    else{
    $wynik = mysqli_query($polaczenie, "select * from adres WHERE id_usera ='$id_usera'");
				while ($rekord = $wynik->fetch_assoc()) {
                $imie = $rekord['Imie'];
                $nazwisko = $rekord['Nazwisko'];
                $miej = $rekord['Miejscowosc'];
                $ulica =$rekord['Ulica'];
                $nr_domu = $rekord['Nr_domu'];
                $nr_tel = $rekord['Nr_tel'];
                }
    $wynik1=mysqli_query($polaczenie, "select * from koszyk WHERE id_usera ='$id_usera'");   
    while ($rekord = $wynik1->fetch_assoc()) {
           $id_usera_z_bazy = $rekord['id_usera'];
           $id_potrawy = $rekord['id_potrawy'];
           $nazwa_potrawy = $rekord['nazwa_potrawy'];
           $cena =$rekord['cena'];
           $ilosc = $rekord['ilosc'];
            $godz_zam = date("h:i:s");
            $data_zam = date("Y.n.j");
           
        if ($id_potrawy ==0)
        {}
        else {
            $wyslij = "INSERT INTO `zamowienia`(`id_zamowienia`, `Imie`, `Nazwisko`, `Adres`, `data_zamowienia`, `Id_usera`, `nazwa_potrawy`, `id_potrawy`, `cena`, `ilosc`) VALUES ('','$imie','$nazwisko','$miej, $ulica, $nr_domu',NOW(),'$id_usera_z_bazy','$nazwa_potrawy','$id_potrawy','$cena','$ilosc')";
            $wstaw_dane = mysqli_query($polaczenie, $wyslij);
            $usun_koszyk = "DELETE FROM `koszyk` WHERE id_usera = $id_usera_z_bazy";
            $usun_dane_koszyk =mysqli_query($polaczenie,$usun_koszyk);
            $_SESSION['zamowienie_true'] = time();  
        }
    }
    if(isset($_SESSION['zamowienie_true'])){
    header("Location: index.php");}
    else{
        $_SESSION['pusty_koszyk']= time();
        header("Location: koszyk.php");
        }
    }
    
?>