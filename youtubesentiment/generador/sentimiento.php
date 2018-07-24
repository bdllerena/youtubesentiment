<?php
error_reporting(0);
ini_set('display_errors', 0);
include_once("../include/funciones.php");
require('../vendor/paralleldots/apis/autoload.php');
set_api_key("axS9A4ClMugDDDuH5vO9lPqpDlYJTA8KmCNh0tToXEk");
get_api_key();
$funciones = new funciones();
$query= "SELECT id,comentario FROM comentarios";
$result = $funciones->getData($query);
  foreach ($result as $key => $res)
  {
      $comentario = $res['comentario'];
      $id = $res['id'];
      $json = sentiment($comentario);
      $resp = json_decode($json,true);
      $success = $resp['sentiment'];
      echo "comentario:".$success;
      switch($success)
      {
        case "positive":
          $success = "Positivo";
          break;
       case "negative":
                 $success = "Negativo";
         break;
       case "neutral":
        $result = $funciones->execute("INSERT INTO corpus(comentario,sentimiento) SELECT comentarios.comentario,comentarios.sentimiento FROM comentarios WHERE sentimiento='$success'");
         break;
        default:
          $success ="Sin determinar";
          break;
      }
    $resultado = $funciones->execute("UPDATE comentarios SET sentimiento='$success' WHERE id=$id");
  }
        $error = "Emoción analizada";
        $alert = "alert alert-success";
        header("Location: ../pages/index.php?logro=".$error."&alert=".$alert);
 ?>
