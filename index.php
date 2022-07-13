<?php
session_start();
require('connect.php');
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
           
            <li><a class="link" href="#">Menu</a></li>
            <li><a class="link"href="#">Historia</a></li>
            <li><a class="link"href="#">Kontakt</a></li>
            
        </ul>
    </div>  
        
        <div class="koszyk">
           <a href="koszyk.php"> <img class="icon_cart" src="img/carts.png"></a>
        </div>
    
    <div class="propozycje">
        <?php

        if(isset($_SESSION['zamowienie_true'])){
        if (time() - $_SESSION['zamowienie_true'] < 10) {
            echo"<span class='zamowienie_true'>Dziękujemy za zamówienie</span>";
        } else {
            
           unset($_SESSION['zamowienie_true']);
        }}
        ?>
    <div class="slajdy">
        
    </div>
    <h1>U nas zamówisz</h1>
    <hr></hr>
        <?php
                $wynik = mysqli_query($polaczenie, "select * from kategoria ");
				while ($rekord = $wynik->fetch_assoc()) {
					$tytul = $rekord['tytul'];
					$img = $rekord['image_name'];
					$opis = $rekord['opis'];
                    

                    echo "<div class='kuchnia'>";
                    echo "<img class='kuchnie'src=$img alt=$img><br>";
                    echo "<span class='tytul'>$tytul</span><br>";
                    echo "<span class='opis'>$opis</span> </div>";
                }?>
    </div>

<h2>MENU</h2>
<hr>
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
                    echo"<form action='dodaj.php' method='POST'>";
                    echo"<input type='number' class='ilosc_sztuk' min='1' value='1'  name='ilosc'>";
                    echo"<input type='submit' class='button_do_koszyka' name='do_koszyka' value='Dodaj do koszyka'>";
                    echo"<input type='hidden' name='id' value='$id'>";
                    echo"<input type='hidden' name='tytul' value='$tytul'>";
                    echo"<input type='hidden' name='cena' value='$cena'>";
                    echo"</form>";
                    echo"</div>";
                
                }
    ?>
    </div>
    <div class="do_koszyka">
        <a href="koszyk.php"><span class="do_koszyka">Przejdź do koszyka</span></a>
    </div>
    

</div>
<div class="stopka">
    
       © 2022 <a hreg="index.php">HinHan.pl</a>
       
</div>
    </body>
</html>