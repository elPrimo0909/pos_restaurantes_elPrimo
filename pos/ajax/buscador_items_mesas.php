

  <style>
    .contenido{
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-gap: 125px;
    }
    
    @media screen and (max-width: 480px) {
      .contenido{
        grid-template-columns: 1fr;
        color: red;
      }
    }


  </style>



<?php

error_reporting(E_ERROR | E_PARSE); ////no listar Warnings

define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", "datos");//Nombre de la base de datos
define("DB_USER", "root");//Usuario de tu base de datos
define("DB_PASS", "");//Contraseña del usuario de la base de datos
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$perfil2    = mysqli_query($con, "select * from perfil limit 0,1");
$rw_perfil2 = mysqli_fetch_array($perfil2);


$sql_proveedor2t = mysqli_query($con, "select * from ostemporal_mesas2  where titulo!='' order by id DESC limit 1");
$rw_proveedor2t  = mysqli_fetch_array($sql_proveedor2t);
$mesa5=$rw_proveedor2t['titulo'];

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if ($action == 'ajax') {
	// escaping, additionally removing everything that could be (html/javascript-) code
	$q        = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
	$aColumns = array('id');//Columnas de busqueda
	$sTable   = "ostemporal_mesas";
	$sWhere   = "";
	if ($_GET['q'] != "") {
		$sWhere = "WHERE (";
		for ($i = 0; $i < count($aColumns); $i++) {
			$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
		}
		$sWhere = substr_replace($sWhere, "", -3);
		$sWhere .= ')';
	}
	include 'pagination.php';//include pagination file
	//pagination variables
	$page      = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page  = 20;//how much records you want to show
	$adjacents = 4;//gap between pages after number of adjacents
	$offset    = ($page-1)*$per_page;
	//Count the total number of row in your table*/
	$count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere ");
	$row         = mysqli_fetch_array($count_query);
	$numrows     = $row['numrows'];
	$total_pages = ceil($numrows/$per_page);
	$reload      = './index.php';
	//main query to fetch the data
	$sql   = "SELECT * FROM  $sTable $sWhere ORDER by id DESC LIMIT $offset,$per_page";
	$query = mysqli_query($con, $sql);
	//loop through fetched data
	if ($numrows > 0) {

		?>
		<div class="contenedor">
            <span  style="font-size:2em  " > Mesas: </span>  
<tr  class="">


<?
if ($rw_perfil2['regimen']=="Comun") {

	?>
	



<?
}

?>






</tr>
		<?php while ($row = mysqli_fetch_array($query)) {
			$id_producto       = $row['id'];
            $titulo       = $row['titulo'];
		





			?>
			<tr>
		



		
			<!--  enviar la variable a ajax-->
			<input type="hidden" class="form-control" style="text-align:right" id="codigo_<?php echo $id_producto;?>"  value="<?php echo ($titulo)?>" >

			<input type="hidden" class="form-control" style="text-align:right" id="articulo_<?php echo $id_producto;?>"  value="<?php echo ($articulo)?>" >
			<input type="hidden" class="form-control" style="text-align:right" id="prec88_<?php echo $id_producto;?>"  value="<?php echo ($prec)?>" >


			<input type="hidden" class="form-control" style="text-align:right" id="cantidad_<?php echo $id_producto;?>"  value="1" >



			<?php 





$ersa=($prec*$imp1)/100;

 $cel2aa= floor($ersa);

$przzec=$prec+$cel2aa;





			 ?>


		<input type="hidden" class="form-control" style="text-align:right" id="prec_<?php echo $id_producto;?>"  value="<?php

	



			echo  ($przzec)?>" >



<?php




if($mesa5==$titulo){
?>


<span >	
<a   href="#"  onclick="agregarMesa('<?php echo $id_producto?>')"><button type="button" style="background-color:white; border:15px solid " ><?php  echo " "; echo"<h3>";  echo $titulo ; echo "</h3> ";  ?></button> </a>

<?php
}else{ ?>


<span >	
<a   href="#"  onclick="agregarMesa('<?php echo $id_producto?>')"><button type="button"  class="btn btn-sample"><?php  echo " "; echo"<h3>";  echo $titulo ; echo "</h3> ";  ?></button> </a>


<?php
}

?>
</span>



<div class="contenedor"  style="background-color:blue  " >
</div>
</a>
</div>
			
			

<?
}

?>



</tr></div>


			</div></td>
			</tr>
			<?php
		}
		?>

		</table>

		
		</div>
		<?php
	}
}
?>
<style>
	.contenedor{
    position: relative;
    display: inline-block;
    text-align: center;
	
}
.texto-encima{
    position: absolute;
    top: 10px;
    left: 10px;
}
.centrado{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>

