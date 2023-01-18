<?php

require '../connection.php';
require '../Prevoz.php';

$prevoz = new Prevoz(null, $_POST['kamion'], $_POST['datum'], $_POST['cena'], $_POST['polazak'], $_POST['dolazak']);

$SQL = "INSERT INTO prevoz VALUES (null, '" . $prevoz->kamion_id . "', '" . $prevoz->datum . "', '" . $prevoz->cena . "', '" . $prevoz->polazak . "', '" . $prevoz->dolazak . "')";

$connection->query($SQL);

$SQL2 = "UPDATE kamion SET dostupnost='ne' WHERE id=" . $prevoz->kamion_id;
$connection->query($SQL2);
