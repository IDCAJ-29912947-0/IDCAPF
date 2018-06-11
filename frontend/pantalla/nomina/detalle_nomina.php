<?php
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/pago_nomina.class.php");
require("../../../backend/clase/concepto_nomina.class.php");

$obj=new pago_nomina;
$objPermiso=new permiso;
$objConcepto=new concepto_nomina;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

	foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
	} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detalle de Nómina</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	
</head>
<body>

<form action="listar_nomina.php" method="POST">

	<div class="container-fluid">

	<div class="row justify-content-center">
	<div class="col-12 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Detalle de Nómina</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-primary text-white text-center">

		<div class="col-md-1 col-12 border border-white ">
		     <span>N°</span>
		</div>

		<div class="col-md-5 col-12 border border-white ">
		     <span>Empleado</span>
		</div>

		<div class="col-md-2 col-12 border border-white">
		     <span>Asignacion</span>
		</div>	


		<div class="col-md-2 col-12 border border-white">
		     <span>Deducción</span>
		</div>	

		<div class="col-md-2 col-12 border border-white">
		     <span>Total</span>
		</div>			

		</div> <!-- Fin Row-->

	    <div class="row mt-1 justify-content-center bg-light">
		<?php
		$num_fil=0;
		$resultado=$obj->detalle_nomina($_REQUEST["cod_nom"]);
		while(($datos=$obj->extraer_dato($resultado))>0){
		$num_fil++;	
		?>

		<div class="col-md-1 col-12 border border-white text-center">
		     <span><?php echo $num_fil; ?></span>
		</div>	

		<div class="col-md-5 col-12 border border-white text-left">
		     <span><?php echo $datos['nom_emp']." ".$datos['ape_emp']; ?></span>
		</div>	

		<div class="col-md-2 col-12 border border-white">
		     <span>
		     	<?php 
		     	      $pun_asi=$objConcepto->movimiento_nomina($signo="+",$_REQUEST["cod_nom"],$datos['fky_empleado']); 
		     	      $asignacion=$objConcepto->extraer_dato($pun_asi);
		     	      echo $objConcepto->formatear_numero($asignacion["total"],2);
		     	?>
		    </span>
		</div>	


		<div class="col-md-2 col-12 border border-white">
		     <span>
		     	<?php 
		     	      $pun_ded=$objConcepto->movimiento_nomina($signo="-",$_REQUEST["cod_nom"],$datos['fky_empleado']); 
		     	      $deduccion=$objConcepto->extraer_dato($pun_ded);
		     	      echo $objConcepto->formatear_numero($deduccion["total"],2);
		     	?>
		    </span>
		</div>	

		<div class="col-md-2 col-12 border border-white">
		     <span>
		     	<?php 
		     	      $pagar=$asignacion["total"]-$deduccion["total"];
		     	      echo $objConcepto->formatear_numero($pagar,2);
		     	?>
		     </span>
		</div>					

		<?php
		}

		if($num_fil==0){
		?>
		<div class="col-12 border border-white text-center">
		     <span>No hay registros</span>
		</div>
		<?php
		}	
		?>

	  </div>

	  </div>

	 </div> 
	  
	</div> <!-- Fin Container -->

</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}

?>