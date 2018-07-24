<?php
error_reporting(0);
ini_set('display_errors', 0);
include_once("../include/funciones.php");
$funciones = new funciones();
    if ($_FILES['csv']['size'] > 0)
    {
        $file = $_FILES['csv']['tmp_name'];
        $handle = fopen($file,"r");
        do {
            if ($data[0]) {
              $result = $funciones->execute("INSERT INTO comentarios (comentario,autor,fecha) VALUES
                    (
                        '".addslashes($data[0])."',
                        '".addslashes($data[1])."',
                        '".addslashes($data[2])."'
                    )
                ");
            }
        } while ($data = fgetcsv($handle,1000,";","'"));
        $error = "Archivo cargado a la base";
        $alert = "alert alert-warning";
        header("Location: index.php?logro=".$error."&alert=".$alert);die;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Youtube S.Analysis - Dashboard</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/Chart.js"></script>
    <script src="../js/jquery-2.1.4.min.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Youtube S.Analysis - Dashboard</a>
            </div>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="<?php  $alert = $_GET['alert']; echo $alert; ?>" role="alert">
                <?php  $logro = $_GET['logro']; echo $logro; ?>
                </div>
            </div>
            <div class="row">
              <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                      $quersis= "SELECT count(*) as datos FROM `comentarios`";
                                      $resultsis = $funciones->getData($quersis);
                                      foreach ($resultsis as $key => $res) {
                                           echo  $res['datos'];
                                         }
                                       ?>
                                    </div>
                                    <div>Comentarios</div>
                                </div>
                            </div>
                        </div>
                        <a href="../generador/generar.php">
                            <div class="panel-footer">
                                <span class="pull-left">Descargar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                              <div class="col-lg-4">
                                    <div class="panel panel-yellow">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-file  fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge">Cargar Archivos</div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                              <input type="file" name="csv" class="form-control-file" id="csv" aria-describedby="fileHelp">
                                              <center><input type="submit" class="btn btn-primary" name="Submit" value="Cargar" /></center>
                                          <p><small id="fileHelp" class="form-text text-muted">Por favor ingresar archivos extensión .csv (UTF-8).</small></p>
                                      </form>
                                  </div>
                              </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-eye  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">?</div>
                                    <div>Sentimiento</div>
                                </div>
                            </div>
                        </div>
                        <a href="../generador/procesar.php">
                            <div class="panel-footer">
                                <span class="pull-left">Detectar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
              </div>

<div class="row">
  <div class="col-lg-3 col-md-6">
      <div class="panel panel-info">
          <div class="panel-heading">
              <div class="row">
                  <div class="col-xs-3">
                      <i class="fa fa-angellist   fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                      <div class="huge">+-</div>
                      <div>Analizar sentimiento</div>
                  </div>
              </div>
          </div>
          <a href="../generador/sentimiento.php">
              <div class="panel-footer">
                  <span class="pull-left">Detectar</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
      </div>
  </div>
  <div class="col-lg-4">
      <div class="panel panel-secondary ">
          <div class="panel-heading">
              <div class="row">
                  <div class="col-xs-3">
                      <i class="fa fa-download  fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                      <div class="huge">.CSV</div>
                      <div>Descargar archivo</div>
                  </div>
              </div>
          </div>
          <a href="../generador/descargar.php">
              <div class="panel-footer">
                  <span class="pull-left">Descargar</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
      </div>
  </div>
  <div class="col-lg-3 col-md-6">
      <div class="panel panel-red">
          <div class="panel-heading">
              <div class="row">
                  <div class="col-xs-3">
                      <i class="fa fa-trash  fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                      <div class="huge">!</div>
                      <div>Borrar las tablas!</div>
                  </div>
              </div>
          </div>
          <a href="../generador/borrado.php">
              <div class="panel-footer">
                  <span class="pull-left">Ejecutar</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
      </div>
  </div>
</div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabla de datos - Análisis de comentarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Comentario</th>
                                        <th>Autor</th>
                                        <th>Fecha</th>
                                        <th>Sentimiento</th>
                                        <th>+-</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $quersi= "SELECT comentario,autor,fecha,estado,sentimiento FROM comentarios ";
                                  $resultsi = $funciones->getData($quersi);
                                  foreach ($resultsi as $key => $res) {
                                       echo "<tr>";
                                       echo "<td>".$res['comentario']."</td>";
                                       echo "<td>".$res['autor']."</td>";
                                       echo "<td>".$res['fecha']."</td>";
                                       echo "<td>".$res['estado']."</td>";
                                       echo "<td>".$res['sentimiento']."</td>";
                                       echo"</tr>";
                                     }
                                   ?>
                                </tbody>
                                <tfoot>
                                  <tr>
                                      <th>Comentario</th>
                                      <th>Autor</th>
                                      <th>Fecha</th>
                                      <th>Sentimiento</th>
                                      <th>+-</th>
                                  </tr>
                              </tfoot>
                            </table>

                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Gráfica de barras sentimiento más predominante
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="flot-chart">
                                      <div id="chartContainer" style="height: 370px; width: 100%;"></div>

                                  <script type="text/javascript">
                                    $(document).ready(function () {

                                        $.getJSON("../generador/graficar.php", function (result) {

                                            var chart = new CanvasJS.Chart("chartContainer", {
                                                data: [
                                                    {
                                                        dataPoints: result
                                                    }
                                                ]
                                            });

                                            chart.render();
                                        });
                                    });
                                </script>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>

                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Gráfico de pastel sentimiento
                                </div>
                                <div class="panel-body">
                                    <div class="flot-chart">
                                      <div id="pieContainer" style="height: 370px; width: 100%;"></div>

                                  <script type="text/javascript">
                                    $(document).ready(function () {

                                        $.getJSON("../generador/graficarpastel.php", function (result) {

                                            var chart = new CanvasJS.Chart("pieContainer", {
                                                data: [
                                                    {
                                                        type: "pie",
                                                        dataPoints: result
                                                    }
                                                ]
                                            });

                                            chart.render();
                                        });
                                    });
                                </script>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
