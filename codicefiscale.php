<?php

$dbname = "cities";

// Mesi
$mese[0] = "Gennaio";
$mese[1] = "Febbraio";
$mese[2] = "Marzo";
$mese[3] = "Aprile";
$mese[4] = "Maggio";
$mese[5] = "Giugno";
$mese[6] = "Luglio";
$mese[7] = "Agosto";
$mese[8] = "Settembre";
$mese[9] = "Ottobre";
$mese[10] = "Novembre";
$mese[11] = "Dicembre";

$link = mysqli_connect("localhost","root","","$dbname") or die("Error " . mysqli_error($link));
if (!$link)
   echo "Impossibile connettersi al server";


$query = "SELECT `city_name` FROM `cities` ORDER BY `city_name`";
$result = mysqli_query($link, $query);

?>
