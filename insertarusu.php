
<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("dbsocial") or die(mysql_error());
$query = "INSERT INTO usuario 
            VALUES (null, 
                    '{$_POST['usu_nombre']}',
                    '{$_POST['usu_apellidos']}',
                    '{$_POST['usu_sexo']}',
                    '{$_POST['usu_nacimiento']}',
                    '{$_POST['usu_correo']}',
                    '{$_POST['usu_clave']}')";
mysql_query($query) or die(mysql_error());
echo "Usuario Registrado";
 header("");
?>