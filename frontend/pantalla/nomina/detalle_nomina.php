<?php
require("../../../backend/clase/nomina.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/pago_nomina.class.php");
require("../../../backend/clase/concepto_nomina.class.php");

$obj=new pago_nomina;
$objNomina=new nomina;
$objPermiso=new permiso;
$objConcepto=new concepto_nomina;


$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

	foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
	} 

 	$pun_nom=$objNomina->filtrar($_REQUEST["cod_nom"],$des_nom="",$est_nom="");
 	$nomina=$objNomina->extraer_dato($pun_nom);
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

	 <div class="row bg-light">
	 	 <div class="col-md-3 col-12 border border-gray text-left">
	 	 	Nombre de la Nómina:
	 	 </div>
	 	 <div class="col-md-9 col-12 border border-gray text-left">
	 	 	<?php echo $nomina["des_nom"] ?>
	 	 </div>	 	 
	  </div>

	 <div class="row bg-light">
	 	 <div class="col-md-3 col-12 border border-gray text-left">
	 	 	Fecha de Inicio:
	 	 </div>
	 	 <div class="col-md-9 col-12 border border-gray text-left">
	 	 	<?php echo $objNomina->voltear_fecha($nomina["ini_nom"]); ?>
	 	 </div>	 	 
	  </div>

	 <div class="row bg-light">
	 	 <div class="col-md-3 col-12 border border-gray text-left">
	 	 	Fecha de Finalización:
	 	 </div>
	 	 <div class="col-md-9 col-12 border border-gray text-left">
	 	 	<?php echo $objNomina->voltear_fecha($nomina["fin_nom"]); ?>
	 	 </div>	 	 
	  </div>

	 <div class="row bg-light">
	 	 <div class="col-md-3 col-12 border border-gray text-left">
	 	 	Estatus:
	 	 </div>
	 	 <div class="col-md-9 col-12 border border-gray text-left">
	 	 	<?php echo $objNomina->ver_estatus_nomina($nomina["est_nom"]); ?>
	 	 </div>	 	 
	  </div>		  	  

	   <div class="row mt-1 bg-primary text-white text-center">


			<div class="col-md-4 col-12 border border-gray ">
			     <span>Empleado</span>
			</div>

			<div class="col-md-2 col-12 border border-gray">
			     <span>Asignación</span>
			</div>	


			<div class="col-md-2 col-12 border border-gray">
			     <span>Deducción</span>
			</div>	

			<div class="col-md-2 col-12 border border-gray">
			     <span>Total</span>
			</div>	

			<div class="col-md-1 col-12 border border-gray">
			     <span>Editar</span>
			</div>	

			<div class="col-md-1 col-12 border border-gray">
			     <span>PDF</span>
			</div>		

		</div> <!-- Fin Row-->

	    <div class="row mt-0 justify-content-center bg-light">
		<?php
		$num_fil=0;
		$acu_asi=0;
		$acu_ded=0;
		$tot_ded=0;
		$resultado=$obj->detalle_nomina($_REQUEST["cod_nom"]);
		while(($datos=$obj->extraer_dato($resultado))>0){
		$num_fil++;	
		?>

		<div class="col-md-4 col-12 border border-gray text-left">
		     <small><?php echo $num_fil." - ".$datos['nom_emp']." ".$datos['ape_emp']; ?></small>
		</div>	

		<div class="col-md-2 col-12 border border-gray">
		     <small>
		     	<?php 
		     	      $pun_asi=$objConcepto->movimiento_nomina($signo="+",$_REQUEST["cod_nom"],$datos['fky_empleado']); 
		     	      $asignacion=$objConcepto->extraer_dato($pun_asi);
		     	      echo $objConcepto->formatear_numero($asignacion["total"],2);
		     	      $acu_asi=$acu_asi+$asignacion["total"];
		     	?>
		    </small>
		</div>	


		<div class="col-md-2 col-12 border border-gray">
		     <small>
		     	<?php 
		     	      $pun_ded=$objConcepto->movimiento_nomina($signo="-",$_REQUEST["cod_nom"],$datos['fky_empleado']); 
		     	      $deduccion=$objConcepto->extraer_dato($pun_ded);
		     	      echo $objConcepto->formatear_numero($deduccion["total"],2);
		     	      $acu_ded=$acu_ded+$deduccion["total"];
		     	?>
		    </small>
		</div>	

		<div class="col-md-2 col-12 border border-gray">
		     <small>
		     	<?php 
		     	      $pagar=$asignacion["total"]-$deduccion["total"];
		     	      echo $objConcepto->formatear_numero($pagar,2);
		     	      $tot_ded=$tot_ded+$pagar;
		     	?>
		     </small>
		</div>					
        <?php $url="detalle_nomina_manual.php?cod_nom=".($_REQUEST['cod_nom'])."&cod_emp=$datos[fky_empleado]"; ?>
		<div class="col-md-1 col-12 border border-gray">
			 <a href="<?php echo $url; ?>"><img src="../../img/editar.png"></a>
		</div>	
        <?php $url="pdf_detalle_nomina.php?cod_nom=".($_REQUEST['cod_nom'])."&cod_emp=$datos[fky_empleado]"; ?>
		<div class="col-md-1 col-12 border border-gray">
		     <a href="<?php echo $url; ?>" target="_blank">Abrir</a>
		</div>	

		<?php
		}
		?>

        <div class="col-md-4 col-12 border border-gray text-right">
		     <b>Totales:</b>
		</div>	
        <div class="col-md-2 col-12 border border-gray text-center">
		     <b><?php echo $obj->formatear_numero($acu_asi,2); ?></b>
		</div>	
        <div class="col-md-2 col-12 border border-gray text-center">
		     <b><?php echo $obj->formatear_numero($acu_ded,2); ?></b>
		</div>	
        <div class="col-md-2 col-12 border border-gray text-center">
		     <b><?php echo $obj->formatear_numero($tot_ded,2); ?></b>
		</div>
        <div class="col-md-2 col-12 border border-gray text-center">
		  
		</div>						

		<?php
		if($num_fil==0){
		?>
		<div class="col-12 border border-gray text-center">
		     Esta nómina aún no ha sido procesada.<hr>
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