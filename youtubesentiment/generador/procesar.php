<?php
error_reporting(0);
ini_set('display_errors', 0);
include_once("../include/funciones.php");
require('../vendor/paralleldots/apis/autoload.php');
set_api_key("axS9A4ClMugDDDuH5vO9lPqpDlYJTA8KmCNh0tToXEk");
get_api_key();
$funciones = new funciones();
$query= "SELECT id,comentario FROM comentarios ";
$result = $funciones->getData($query);
  foreach ($result as $key => $res)
  {
      $comentario = $res['comentario'];
      $id = $res['id'];
      $json = emotion($comentario);
      $resp = json_decode($json,true);
      $success = $resp['emotion']['emotion'];
      switch($success)
      {
        case "Happy":<z<?=
         ?>
          $success = "Feliz";
          break;
       case "Angry":
                 $success = "Enojado";
         break;
       case "Excited":
                 $success = "Emocionado";
         break;
       case "Sarcasm":
                 $success = "Sárcastico";
         break;
       case "Sad":
                 $success = "Triste";
         break;
       case "Fear":
                 $success = "Asustado";
         break;
       case "Bored":
                 $success = "Aburrido";
         break;
        default:
          $success ="Sin determinar";
          break;
      }
    $resultado = $funciones->execute("UPDATE comentarios SET estado='$success' WHERE id=$id");
  }
        $error = "Emoción detectada";
        $alert = "alert alert-success";
        header("Location: ../pages/index.php?logro=".$error."&alert=".$alert);
 ?>
