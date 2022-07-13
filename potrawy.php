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
            <li><a class="link"href="potrawy.php.php">Potrawy</a></li>
            
        </ul>
        
    </div>  
    <div class="menu">
    <?php

$wynik = mysqli_query($polaczenie, "select * from food ");
				while ($rekord = $wynik->fetch_assoc()) {
					$id = $rekord['id'];
                    $tytul = $rekord['tytul'];
					$opis = $rekord['opis'];
					$cena = $rekord['cena'];
                    $kategoria_id =$rekord['kategoria_id'];

                    echo"<div class='menu_pozycje'>";
                    echo"<span class='pozycje_tytul'>$tytul</span><br>";
                    echo"<span class='pozycje_cena'>$cena Zł</span><br>";
                    echo"<span class='pozycje_opis'>$opis</span><br>";
                    if ($kategoria_id==1)echo"<span class='pozycje_kategoria'>Kuchnia Polska</span>";
                    if ($kategoria_id==2)echo"<span class='pozycje_kategoria'>Kuchnia Azjatycka</span>";
                    if ($kategoria_id==3)echo"<span class='pozycje_kategoria'>Kuchnia Amerykańska</span>";
                    echo"<form action='usun.php' method='POST'>";
                    echo"<input type='submit' class='button_do_koszyka' name='do_koszyka' value='Usun'>";
                    echo"<input type='hidden' name='id' value='$id'>";
                    echo"</form>";
                    echo"</div>";
                
                }?>
                
            
   
    </div>
</div>
<div class="stopka">
    
       © 2022 <a hreg="index.php">HinHan.pl</a>
       
</div>
    </body>
</html>
<?php
}
echo "Nie tym razem";?>