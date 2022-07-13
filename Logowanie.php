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
	</div>
	<div class="logowanie">
		<h1>Zaloguj się</h1>
		<div class="formularz_logowanie">
		<form action="LogowanieSkrypt.php" method="POST">
		<span class="rejestracja_formularz">Nazwa użytkownika</span><input type="text" name="username" class="kontakt">
		<span class="rejestracja_formularz">Hasło</span><input type="password" name="haslo" class="kontakt" >
			<?php
			if (isset($_SESSION['error_haslo']))
			{
				echo '<div class="error">'.$_SESSION['error_haslo'].'</div>';
				unset($_SESSION['error_haslo']);
			}?>
            <input type="submit" class="button_rejestracja"  value="Zaloguj się">
		</form>
    </div>
        
	</div>
    <div class="NieMaszKonta">
        <p class="NieMaszKonta_napis">Nie masz konta? <a class="link_rejestracja" href="Rejestracja.php"><span class="stworz_konto_napis">Swtórz konto</span></a></p>
        </div>
</div>
</body>
</html>