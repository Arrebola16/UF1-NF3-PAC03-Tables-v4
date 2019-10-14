<?php
//conexion con la base de datos MySQL (servidor)
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect.
Check your connection parameters.');
    
//asegurarse de que la base de datos Discos sea la activa
mysqli_select_db($db,'gamesite') or die(mysqli_error($db));
   
$noRegistros = 2; //Registros por página
$pagina = 1; //Por defecto pagina = 1
    
if( isset ($_GET['pagina'])){
    $pagina = $_GET['pagina']; //Si hay pagina, lo asigna
}
$buskr=$_GET['search']; //Palabra a buscar  
//Utilizo el comando LIMIT para seleccionar un rango de registros
$sSQL = "SELECT game_name,game_year FROM game WHERE game_name LIKE '%$buskr%' LIMIT ". ($pagina-1)*$noRegistros .",$noRegistros";
$result = mysqli_query($db,$sSQL) or die(mysqli_error($db));
//Exploracion de registros
echo "<table>";
while($row = mysqli_fetch_array($result)) { 
	echo "<tr><td height=80 align=center>";
	echo $row["game_name"] ."<br>";
	echo "</td><td align=center><img src='fotos/
    $row[game_id]' width=70 height=70></td>
    <td>$row[game_name].</td>
    <td align=center> $row[game_year].</td>
    </tr>";
    
	
}
//Imprimiendo paginacion 
$sSQL = "SELECT count(*) FROM game WHERE game_name LIKE '%$buskr%'"; //Cuento el total de registros
$result = mysqli_query($db,$sSQL);
$row = mysqli_fetch_array($result);
$totalRegistros = $row["count(*)"]; //Almaceno el total en una variable
$noPaginas = $totalRegistros/$noRegistros; //Determino la cantidad de paginas
?>

<tr>
    <td colspan="1" align="center"><?php echo "<strong>Total registros: </strong>". $totalRegistros; ?></td>
    <td colspan="1" align="center"><?php echo "<strong>Pagina: </strong>". $pagina; ?></td>
</tr>
<tr bgcolor="f3f4f1">
    <td colspan="4" align="right"><strong>Pagina:
    
<?php
//Imprimo las paginas
for($i=1; $i<$noPaginas+1; $i++) { 
	if($i == $pagina)
	   //A la pagina actual no le pongo link
		echo "<font color=red>". $i ."</font>"; //A la pagina actual no le pongo link
	else
		echo "<a href=\"?pagina=". $i ."&searchs=". $buskr ."\" style=color:#000;> ". $i ."</a>";
}
?>

	</strong></td>
</tr>
</table>