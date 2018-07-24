<?php

header('Content-Type: application/json');
include_once("../include/funciones.php");
$funciones = new funciones();
// Check connection
    $data_points = array();
    $quersx= "SELECT sentimiento,count(*) as total FROM comentarios GROUP BY sentimiento ";
    $resultsx = $funciones->getData($quersx);
    foreach ($resultsx as $key => $res)
    {
      //$probalil = $res['probabilidad']
      $point = array("label" => $res['sentimiento'] , "y" => $res['total']);
      array_push($data_points, $point);
    }
       echo json_encode($data_points, JSON_NUMERIC_CHECK);

?>
