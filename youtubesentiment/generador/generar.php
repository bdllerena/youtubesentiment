<?php
$command = escapeshellcmd('comments.py');
$output = shell_exec($command);
$output = passthru('python comments.py --youtubeid 0aBtq9kwPyM --output generado.txt');
$error = "Archivos Descargados";
$alert = "alert alert-info";
header("Location: ../pages/index.php?logro=".$error."&alert=".$alert);
?>
