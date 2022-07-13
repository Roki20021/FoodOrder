<?php
session_start();
require('connect.php');
if (isset($_SESSION['admin']))
{
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
        if (isset($_SESSION['admin']))
			{
				echo '<li><a class="link"href="PanelAdmina.php">Panel Admina</a></li>';
			}
			if (isset($_SESSION['zalogowano']))
			{
				echo '<li><a class="link"href="Wyloguj.php">Wylogowanie</a></li>';
			}else {
                echo'<li><a class="link"href="Logowanie.php">Logowanie</a></li>';
            }?>
           
            <li><a class="link" href="dodajPotrawe.php">Dodaj Potrawe</a></li>
            <li><a class="link"href="analiza.php">Anazliza</a></li>
            <li><a class="link"href="potrawy.php">Potrawy</a></li>
            
        </ul>
        
    </div>  
    <center>
    <div class="Analiza">
        <h1>Zamówienia z ostatnich 30 dni</h1>
            <?php
                echo"<table class='styl-tabela'>
                <thead>
                <tr>
                <td>ZAM.</td>
                <td>Imie</td>
                <td>Nazwisko</td>
                <td>Adres</td>
                <td>IdU</td>
                <td>Nazwa potrawy</td>
                <td>IdP</td>
                <td>Cena</td>
                <td>Ilość</td>
                <td>Data zamowienia</td>
                </tr></thead><tbody>";

            $wynik1 = mysqli_query($polaczenie,"SELECT * FROM zamowienia WHERE data_zamowienia>DATE_SUB(NOW(),INTERVAL 30 DAY);");
				while ($rekord = $wynik1->fetch_assoc()) {
					$id_zan = $rekord['id_zamowienia'];
					$imie = $rekord['Imie'];
					$nazwisko = $rekord['Nazwisko'];
                    $Adres = $rekord['Adres'];
                    $data_zamowienia = $rekord['data_zamowienia'];
                    $Id_usera = $rekord['Id_usera'];
                    $nazwa_potrawy = $rekord['nazwa_potrawy'];
                    $id_potrawy = $rekord['id_potrawy'];
                    $cena = $rekord['cena'];
                    $ilosc= $rekord['ilosc'];
                    echo"
                    <tr>
                    <td>$id_zan</td>
                    <td>$imie</td>
                    <td>$nazwisko</td>
                    <td>$Adres</td>
                    <td>$Id_usera</td>
                    <td>$nazwa_potrawy</td>
                    <td>$id_potrawy</td>
                    <td>$cena</td>
                    <td> $ilosc</td>
                    <td>$data_zamowienia</td>
                    </tr>";
                }
                echo"</tbody></table>";?> 
            
   
    </div></center>
</div>
<div class="stopka">
    
       © 2022 <a hreg="index.php">HinHan.pl</a>
       
</div>
    </body>
</html>
<?php
}
echo "Nie tym razem";?>