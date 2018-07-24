<?php
include_once("../include/funciones.php");
$funciones = new funciones();
$result = $funciones->execute("TRUNCATE TABLE comentarios");
header("Location: ../pages/index.php");
?>
