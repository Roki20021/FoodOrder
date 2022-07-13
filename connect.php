<?php
$polaczenie = @new mysqli('localhost', 'root', '', 'foodorder');

if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
?>