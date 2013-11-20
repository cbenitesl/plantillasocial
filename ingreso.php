<?php
ini_set('display_errors', 'Off');
ini_set('display_startup_errors', 'Off');
error_reporting(0);

$usuario = $_POST['usu_correo'];
$clave = $_POST['usu_clave'];

function Conectarse()
{
   if (!($link=mysql_connect("localhost", "root", "")))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("dbsocial",$link))
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   return $link;
}

$con = Conectarse();
$query = "SELECT * FROM usuario WHERE usu_correo ='".$usuario."' AND usu_clave = '".$clave."'";
$q = mysql_query($query,$con);
try{
if(mysql_result($q,0))
{$result = mysql_result($q, 0);
    echo "LogIn Correcto";
    header("");
}else
    echo "LogIn Errado";
    header("");
}catch(Exception $error){}
mysql_close($con);
?>
