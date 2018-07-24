<?PHP
include_once("../include/funciones.php");
$funciones = new funciones();
$filename = "SentimientoAnalizado.xls";
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$con=mysqli_connect("localhost","root","","sentiment");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,"SELECT * FROM comentarios");
$flag = false;
while ($row = mysqli_fetch_assoc($result)) {
    if (!$flag) {
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}
?>
