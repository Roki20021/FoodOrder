<?php
session_start();
require('connect.php');
$username=$_POST['username'];
$haslo=$_POST['haslo'];

if  ((isset($username)) && (isset($haslo)))
{
        $sprawdz = mysqli_query($polaczenie,"SELECT * From user WHERE Username='$username'");
        while ($rekord = $sprawdz->fetch_assoc()) {
            $id_usera = $rekord['id_usera'];
            $hashedPassword = $rekord['Password'];
            $uprawnienia = $rekord['uprawnienie'];
            $_SESSION['id_usera']= $id_usera;
        }
        
        $poprawne = password_verify($haslo, $hashedPassword);
        if($poprawne == true)
        {
            $_SESSION['zalogowano'] ="jd";
            if($uprawnienia == 1 )
            {$_SESSION['admin'] = "as";}
            header('Location: index.php');
        }
        else{
            $_SESSION['error_haslo']="Złe hasło lub login!";
            header('Location: Logowanie.php');
        }

}

?>