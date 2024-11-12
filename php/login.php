<?php
session_start();
$host= "localhost";
$usuario= "root";
$pass = "josuecmm14";
$bd = "reportes";  

$username = $_POST['usuario'];
$pwd = $_POST['password'];

$conexion = mysqli_connect($host, $usuario, $pass, $bd);

$query = "SELECT * FROM usuario WHERE username = '$username' AND pass = '$pwd'";

$resultado = mysqli_query($conexion, $query); 

$row = mysqli_fetch_array($resultado);

if($row['privilegios']== 'admin'){
  $_SESSION['usuario'] = $_POST['usuario'];
  $_SESSION['privilegios'] = $row['privilegios'];
  header("Location: mkreport.php");
}
elseif($row['privilegios']== 'nu'){
  $_SESSION['usuario'] = $_POST['usuario'];
  $_SESSION['privilegios'] = $row['privilegios'];
  header("Location: mkreport.php");
}
elseif($row['privilegios']== 'su'){
  $_SESSION['usuario'] = $_POST['usuario'];
  $_SESSION['privilegios'] = $row['privilegios'];
  header("Location: mkreport.php");
}
else{
  echo "Usuario o contraseña incorrectos";
}

 ?> 
