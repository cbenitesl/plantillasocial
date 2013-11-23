
<?php
mysql_connect("localhost", "root", "admin") or die(mysql_error());
mysql_select_db("dbsocial") or die(mysql_error());

$query = "INSERT INTO amigo 
            VALUES ('{$_POST['persona']}',
                    '{$_POST['tags']}')";
mysql_query($query) or die(mysql_error());
echo "Ya son amigos";
 header("location:perfil.php?usu_correo={$_POST['persona']}");
?>