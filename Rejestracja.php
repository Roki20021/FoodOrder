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
	<div class="rejestracja">
		<h1>Zarejestruj się</h1>
		<div class="formularz_rejestracja">
		<form action="RejestracjaSkrypt.php" method="POST">
			<span class="rejestracja_formularz">E-mail</span><input type="text" name="email" class="kontakt"  >
			<?php if (isset($_SESSION['e_email']))
			{
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
			
			if (isset($_SESSION['error_email']))
			{
				echo '<div class="error">'.$_SESSION['error_email'].'</div>';
				unset($_SESSION['error_email']);
			} ?>
			<span class="rejestracja_formularz">Nazwa użytkownika</span><input type="text" name="username" class="kontakt" ></input>
			<?php
			if (isset($_SESSION['e_username']))
			{
				echo '<div class="error">'.$_SESSION['e_username'].'</div>';
				unset($_SESSION['e_username']);
			}?>
			<span class="rejestracja_formularz">Hasło</span><input type="password" name="haslo" class="kontakt"  >
			<span class="rejestracja_formularz">Powtórz hasło</span><input type="password" name="haslo_potw" class="kontakt"  >
			<?php
			if (isset($_SESSION['error_password_inne']))
			{
				echo '<div class="error">'.$_SESSION['error_password_inne'].'</div>';
				unset($_SESSION['error_password_inne']);
			}

			if (isset($_SESSION['error_password']))
			{
				echo '<div class="error">'.$_SESSION['error_password'].'</div>';
				unset($_SESSION['error_password']);
			}?>
        	<span class="rejestracja_formularz">Imie</span><input type="text" name="imie" class="kontakt">
			<span class="rejestracja_formularz">Nazwisko</span><input type="text" name="nazwisko" class="kontakt">
            <span class="rejestracja_formularz">Miejscowość</span><input type="text" name="miejscowosc" class="kontakt">
            <span class="rejestracja_formularz">Ulica</span><input type="text" name="ulica" class="kontakt">
            <span class="rejestracja_formularz">Nr.domu / mieszkania</span><input type="text" name="nr" class="kontakt">
            <span class="rejestracja_formularz">Nr.tel</span><input type="text" name="nr_tel" class="kontakt">
			<?php
			if (isset($_SESSION['error_danych']))
			{
				echo '<div class="error">'.$_SESSION['error_danych'].'</div>';
				unset($_SESSION['error_danych']);
			}?>
            <input type="submit" class="button_rejestracja"  value="Zarejestruj się">
		</form>
		
	</div>
	</div>
</div>
</body>
</html>