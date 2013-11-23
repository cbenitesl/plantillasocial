
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" type="text/css" media="all">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,300' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="js/jquery-1.7.1.js" ></script>
  <script type="text/javascript" src="js/scripts.js"></script>

<script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>

  
<?php
$server = "localhost";//nombre del servidor
$usuario = "root";//nombre del usuario
$pwd = "admin";//contraseña de mysql
$db = "dbsocial";//nombre de la base de datos, en nuestro caso se llama autocompleta
$conexion = mysql_connect($server,$usuario,$pwd);
    if($conexion){
    }else{
        echo "No hay Conexion";
}
$base = mysql_select_db($db);
    if($base){
    }else{
        echo "Error en la base de datos";
}
$con = "select * from usuario";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$query = mysql_query($con);
    ?>
    
    <script>
    $(function() {
        
        <?php
        
        while($row= mysql_fetch_array($query)) {//se reciben los valores y se almacenan en un arreglo
      $elementos[]= '"'.$row['usu_correo'].'"';
      
}
$arreglo= implode(", ", $elementos);//junta los valores del array en una sola cadena de texto
        ?>  
        
        var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript
                
        $( "#tags" ).autocomplete({
            source: availableTags
        });
    });
    </script>

</head>
<body>
<div class="glob">
<div class="page_spinner"></div>  
<div class="main">
    <div class="center"> 
   <!--header -->                   
 <div class="headerHolder">
       <header>
       <div class="logoHolder">
            <h1><a href="#!/pageGallery" id="logo">oratorio</a></h1>
       </div>
        </header>
        <div class="followHolder">
                        <span></span>
                            <ul>
                                <li><a href="#"><img src="images/followIcon1.png" alt=""></a></li>
                                <li><a href="#"><img src="images/followIcon2.png" alt=""></a></li>
                                <li><a href="#"><img src="images/followIcon3.png" alt=""></a></li>
                        
                            </ul>
                        </div>
 </div>
<!--header end--> 
    
            <div class="menuHolder">
            <nav class="menu">
				    	<ul id="menu"> 
					       	           
                             <li><a href=""><span class="overPlane"></span><span class="mText">Noticias</span></a></li>
                             <li><a href=""><span class="overPlane"></span><span class="mText">Mensajes</span></a></li>
                             <li><a href=""><span class="overPlane"></span><span class="mText">Eventos</span></a></li>
                             <li><a href=""><span class="overPlane"></span><span class="mText">Fotos</span></a></li>
                             <li><a href=""><span class="overPlane"></span><span class="mText">Grupos</span></a></li>
                             
					   </ul>
				    </nav>
                 </div> 
                 <?php
                 $usuario = $_GET['usu_correo'];
                 ?>
			<form action="regisamigo.php" method="post">
    <label for="tags">Buscar : </label>
    
    <input id="tags" name="tags"/>
    <input type="hidden" id="persona" name="persona" value="<?php echo $usuario; ?>"/>
    <input value="Amigo" name="Enviar" type="submit" />
</form>
<br>
<br>
<?php

$sql = "select concat(u.usu_nombre, ' ', u.usu_apellido) as nombre from amigo a inner join usuario u on a.ami_amigo=u.usu_correo where a.ami_correo = '$usuario';"; 
mysql_query($sql,$conexion);//REALIZA LA CONSULTA

echo "<table border='1' bordercolor='##0000FF'>"; //EMPIEZA A CREAR LA TABLA CON LOS ENCABEZADOS DE TABLA
echo "<tr>";//<tr> CREA UNA NUEVA FILA
echo "<td>Amigo</td>";//<td> CREA NUEVA COLUMNA
echo "</tr>";
$result = mysql_query($sql, $conexion);
$sumar1 = 0;
  while($row = mysql_fetch_array($result))
  {
    echo "<tr><td>".$row["nombre"]."</td></tr>";
  }
echo "</table>";//FINALIZA LA TABLA
mysql_close($conexion);
?>
           	<!--footer end-->
            </div>
		</div>
</div>

<script>
$(window).load(function() {	
	$('.page_spinner').fadeOut();
	$('body').css({overflow:'auto', 'min-height':'800px'})
})
</script>
</body>
</html>