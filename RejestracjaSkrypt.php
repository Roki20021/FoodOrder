<?php
session_start();
require('connect.php');
$email=$_POST['email'];
$username=$_POST['username'];
$haslo=$_POST['haslo'];
$haslo_potw=$_POST['haslo_potw'];
$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$miej=$_POST['miejscowosc'];
$ulica=$_POST['ulica'];
$nr_domu=$_POST['nr'];
$nr_tel=$_POST['nr_tel'];

if  ((isset($username))&& (isset($haslo))&& (isset($haslo_potw)) && (isset($imie)) && (isset($nazwisko))&& (isset($miej)) && (isset($ulica)) && (isset($nr_domu)) && (isset($nr_tel)))
{
    $poprawne=true;
    //Walidacja hasła
    if((strlen($haslo)<8) || (strlen($haslo)>32))
    {
        $poprawne=false;
        $_SESSION['error_password']= "Hasło powinno zawierać 8-32 znaki!";
        
    }

    if($haslo!=$haslo_potw)
    {
    $poprawne= false;
    $_SESSION['error_password_inne']= "Hasła są różne!";
    }
    $hashedPassword = password_hash($haslo, PASSWORD_DEFAULT);

//Sprawdzanie czy user istnieje w bazie 

$rezultat_username = $polaczenie->query("SELECT id_usera FROM user WHERE Username='$username'");
				
				if (!$rezultat_username) throw new Exception($polaczenie->error);
				
				$ile_takich_username = $rezultat_username->num_rows;
				if($ile_takich_username>0)
				{
					$poprawne=false;
					$_SESSION['e_username']="Istnieje już konto o takiej nazwie!";
				}		
   
    // Sprawdź poprawność adresu email
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
    {
        $_SESSION['error_email']="Podaj poprawny adres e-mail!";
        $poprawne=false;
    }
   
    // Sprawdzanie czy taki adres e-mail jest w bazie
    $rezultat = $polaczenie->query("SELECT id_usera FROM user WHERE E_mail='$email'");
				
    if (!$rezultat) throw new Exception($polaczenie->error);
    
    $ile_takich_maili = $rezultat->num_rows;
    if($ile_takich_maili>0)
    {
        $poprawne=false;
        $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
    }		

    
    if($poprawne==true ){
        $wprowadz = mysqli_query($polaczenie,"INSERT INTO `user`(`id_usera`, `Username`, `Password`, `E_mail`) VALUES ('','$username','$hashedPassword','$email')" );
        
        $pobierz_id = mysqli_query($polaczenie, "SELECT id_usera FROM user WHERE Username='$username'");
        while ($rekord = $pobierz_id->fetch_assoc()) {
            $id_usera = $rekord['id_usera'];
        }
        $wprowadz_dane_zamieszkania = mysqli_query($polaczenie, "INSERT INTO `adres`(`id_usera`, `Imie`, `Nazwisko`, `Miejscowosc`, `Ulica`, `Nr_domu`, `Nr_tel`) VALUES ('$id_usera','$imie','$nazwisko','$miej','$ulica','$nr_domu','$nr_tel')" );
        header('Location: index.php');
    }
    else{
        header('Location: Rejestracja.php');
        
    }

}
else{
    $_SESSION['error_danych']= "Wprowadź wszystkie dane!";
    
    header('Location: Rejestracja.php');
}
    
?>