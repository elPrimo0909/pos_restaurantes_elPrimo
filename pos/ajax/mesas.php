<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings

?>
<script type="text/javascript">
$(document).ready(function(){
    $("#myModalayuda").on('shown.bs.modal', function(){
        $(this).find('#q2').focus();
    });
});
</script>



<?php



//SE LISTA PRODUCTOS PARA AGREGAR A LA FACTURA
/* Connect To Database*/
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
//require_once ("../config/conexssion.php");//Contiene funcion que conecta a la base de datos
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings
define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", "datos");//Nombre de la base de datos
define("DB_USER", "root");//Usuario de tu base de datos
define("DB_PASS", "");//Contraseña del usuario de la base de datos
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$count_query    = mysqli_query($con, "select * from ostemporal_mesas order by id DESC");

echo "Mesas: ";
while ($row = mysqli_fetch_array($count_query)) {
     $mesa       = $row['titulo']; 
$id_producto1       = $row['id'];
?>
	<input type="hidden" class="form-control" style="text-align:right" id="prec2_<?php echo $id_producto;?>"  value="<?php echo ($codigo)?>" >
			<input type="hidden" class="form-control" style="text-align:right" id="codigo_<?php echo $id_producto;?>"  value="<?php echo ($codigsso)?>" >

    			<input type="hidden" class="form-control" style="text-align:right" id="prec88_<?php echo $id_producto;?>"  value="<?php echo ($identificacion)?>" >
			<input type="hidden" class="form-control" style="text-align:right" id="telefono_<?php echo $id_producto;?>"  value="<?php echo ($codigo)?>" >


			<input type="hidden" class="form-control" style="text-align:right" id="cantissdad_<?php echo $id_producto;?>"  value="1" >



			<td ><span ><a href="#" onclick="agregarMesa('<?php echo $id_producto1?>')"> <?php echo $mesa ?>  </i></a></span></td>
<?php
    }
    
?></h4> 