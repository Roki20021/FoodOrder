<?php
 $id = $_POST['id'];
 $tytul = $_POST['tytul'];
 $cena = $_POST['cena'];
 $ilosc = $_POST['ilosc'];

?>
<html>
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
            <li><a class="link" href="#">Menu</a></li>
            <li><a class="link"href="#">Historia</a></li>
            <li><a class="link"href="#">Kontakt</a></li>
        </ul>
        
        </div>

    <div class="dane_kontaktowe">
        <h1>Formularz Dostawy</h1>
        <form class="formularz" action="#" method="POST">
            <input type="text" name="imie" class="kontakt" value="Imie" onfocus="this.value=''" >
            <input type="text" name="nazwisko" class="kontakt" value="Nazwisko" onfocus="this.value=''">
            <input type="text" name="miejscowosc" class="kontakt" value="Miejscowość " onfocus="this.value=''">
            <input type="text" name="ulica" class="kontakt" value="Ulica" onfocus="this.value=''">
            <input type="text" name="nr" class="kontakt" value="Nr domu/lokalu" onfocus="this.value=''">
            <input type="text" name="nr_tel" class="kontakt" value="Nr Tel." onfocus="this.value=''">
            <input type="submit" value="Akceptuj">
                    <?php echo"<input type='hidden' name='id' value='$id'>";
                          echo"<input type='hidden' name='tytul' value='$tytul'>";
                          echo"<input type='hidden' name='cena' value='$cena'>";
                          echo"<input type='hidden' name='ilosc' value='$ilosc'>";?>
        </form>
    
    </div>

</div>
<div class="stopka">
    
       © 2022 <a hreg="index.php">HinHan.pl</a>
       
</div>
    </body>
</html>