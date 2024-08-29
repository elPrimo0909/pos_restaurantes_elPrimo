<?php
include '../config/conexion.php';
?>


<?php



//SE LISTA PRODUCTOS PARA AGREGAR A LA FACTURA
/* Connect To Database*/

$count_query    = mysqli_query($con, "select * from ostemporal_mesas2 where titulo!='' order by id DESC limit 1");

	$row1         = mysqli_fetch_array($count_query);
    $titulo=$row1['titulo'];

?> <h1  style="background-color:green ; padding:5px; width:200px; text-align:center; color:white "  > <?php
echo "Mesa: "	;
if($titulo==0){

    echo number_format($row1['num']) ;
    exit();
}

	 echo number_format($row1['titulo'])	;

    exit();
?></h4> 