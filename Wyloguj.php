
<?php
session_start();
unset($_SESSION['zalogowano']);
unset($_SESSION['id_usera']);
unset($_SESSION['admin']);
header('Location: index.php');
?>
<script>
    alert("Wylogowani Cię");
</script>