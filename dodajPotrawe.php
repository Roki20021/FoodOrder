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
    </div>  <div class="formularz_dodaj_produkt">
            <form method="POST" action="dodajPotrawe_skrypt.php">
            <span class="dodaj_produkt_span">Nazwa</span><input  type="text" name="tytul" class="kontakt" >
            <span class="dodaj_produkt_span">Opis</span><input type="text" name="opis" class="kontakt" >
            <span class="dodaj_produkt_span">Cena</span><input class="number_dodajPotrawe" type="number" name="Cena" min="1" >
            <span class="dodaj_produkt_span_duzy">Kuchnia 1-Polska 2-Azjatycka 3-Amerykanska</span><input class="number_dodajPotrawe" type="number" min="1" max="3" name="katergoria_id" >
            <input type="submit" class="dodaj_potrawe"value="Dodaj"></form>
            </div>
            <div class="error_dodaj_potrawe">
            <?php
            if(isset($_SESSION['potrawa_dodana'])){
                if (time() - $_SESSION['potrawa_dodana'] < 10) {
                    echo"Potrawa dodana";
                } else {
                    
                   unset($_SESSION['potrawa_dodana']);
                }}
            
               
                if(isset($_SESSION['potrawa_nie_dodana'])){
                    if (time() - $_SESSION['potrawa_nie_dodana'] < 10) {
                        echo"Potrawa nie została dodana";
                    } else {
                        
                       unset($_SESSION['potrawa_nie_dodana']);
                    }}
                
            ?>
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