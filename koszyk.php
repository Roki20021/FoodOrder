<?php
session_start();
require('connect.php');
   
if(!isset($_SESSION['id_usera']))
{
    $id_usera = 0;
    $_SESSION['koszyk_niezalogowany'] ="Aby zamówić musisz być zalogowany";
}
else{
    $id_usera = $_SESSION['id_usera'];
}

    
    if(isset($_POST['id_potrawy']) && isset($_POST['id_zamowienia']))
    {
        $id_potrawy1=$_POST['id_potrawy'];
        $id_zamowienia1=$_POST['id_zamowienia'];
        $usun_z_koszyka = mysqli_query($polaczenie, "DELETE FROM `koszyk` WHERE id_zamowienia = '$id_zamowienia1' && id_potrawy ='$id_potrawy1'");
    }
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food_project</title>
</head>
<body>
<div id="container">
	<div class="div_logo">
        <a href="index.php"><img src="img/logo.png"alt="logo HINHAN"></a>
    </div>
	<div class="nav">
    <ul>
        <?php
			if (isset($_SESSION['zalogowano']))
			{
				echo '<li><a class="link"href="Wyloguj.php">Wylogowanie</a></li>';
				
			}else {
                echo'<li><a class="link"href="Logowanie.php">Logowanie</a></li>';
            }?>
           
            <li><a class="link" href="index.php">Menu</a></li>
            <li><a class="link"href="index.php">Historia</a></li>
            <li><a class="link"href="index.php">Kontakt</a></li>
            
        </ul>
	</div>

        <div class="cart_div">
            
        <?php
                        if (isset($_SESSION['koszyk_niezalogowany']))
                        {
                            echo '<div class="error_koszyk">'.$_SESSION['koszyk_niezalogowany'].'</div>';
                            unset($_SESSION['koszyk_niezalogowany']);
                        }
                        if (isset($_SESSION['error_zamowienie_zaloguj_sie']))
                        {
                            echo '<div class="error_koszyk">'.$_SESSION['error_zamowienie_zaloguj_sie'].'</div>';
                            unset($_SESSION['error_zamowienie_zaloguj_sie']);
                        }
                        ?>
            <table class='styl-tabela-koszyk'>
                <thead>
                <tr>
                <td>Nazwa potrawy</td>
                <td>Cena</td>
                <td>Ilość</td>
                <td></td>
                </tr></thead><tbody>

            <?php

            $select_koszyk = mysqli_query($polaczenie, "SELECT * FROM koszyk where id_usera = '$id_usera'");
            
            while($rekord = $select_koszyk->fetch_assoc()){
                $nazwa_potrawy =$rekord['nazwa_potrawy'];
                $cena = $rekord['cena'];
                $ilosc = $rekord['ilosc'];
                $id_potrawy = $rekord['id_potrawy'];
                $id_zamowienia = $rekord['id_zamowienia'];
                echo"
                <tr>
                <td>$nazwa_potrawy</td>
                <td>$cena</td>
                <td>$ilosc</td>
                <td><form action='#' method='POST'>
                <input type='submit' class='submit_usun_z_koszyka' name='usun_z_koszyka' value='Usuń'>
                <input type='hidden' name='id_zamowienia' value='$id_zamowienia'>
                <input type='hidden' name='id_potrawy' value='$id_potrawy'></form></td>
                </tr>";
            }
            echo"</tbody></table>";
                echo "<center>";
                if(isset($_SESSION['pusty_koszyk'])){
                    if (time() - $_SESSION['pusty_koszyk'] < 5) {
                        echo"<span class='koszyk_pusty_error'>Koszyk jest pusty</span>";
                    } else {
                        
                       unset($_SESSION['pusty_koszyk']);
                    }}
                    echo"</center>";
            ?>
                <div class="do_koszyka">
                    <a href="zamow.php"><span class="do_koszyka">Zamów</span></a>
                </div>
    
        </div>
    
</div>
<div class="stopka">
    
       © 2022 <a hreg="index.php">HinHan.pl</a>
       
</div>
</body>
</html>