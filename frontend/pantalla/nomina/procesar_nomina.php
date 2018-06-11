
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Procesar Nómina</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/nomina.php" method="POST">

<?php
require("../../../backend/clase/nomina.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/empleado.class.php");
require("../../../backend/clase/concepto_nomina.class.php");

$obj=new nomina;
$objPermiso=new permiso;
$objEmpleado=new empleado;
$objConcepto=new concepto_nomina;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
	} 

	$pun_nom=$obj->filtrar($cod_nom="",$des_nom="",$est_nom="A");
	$datos=$obj->extraer_dato($pun_nom);
	if($datos["cod_nom"]=="")
	{
      $obj->mensaje("danger","No hay nómina generada");
      exit;
	}	
	?>


	<div class="container-fluid">
	<div class="row justify-content-center align-items-center">
	<div class="col-12 ">


	 <div class="row bg-primary text-white align-items-center">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la Nómina</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-light align-items-center">

		<div class="col-md-3 col-12 text-left">
		     Nombre:
		</div>
		<div class="col-md-9 col-12">
		    <?php echo $datos['des_nom']; ?>
		</div>

	  </div> 

	  <div class="row mt-1 bg-light align-items-center">

		<div class="col-md-3 col-12 text-left">
		     Fecha de Inicio:
		</div>
		<div class="col-md-8 col-12">
		   <?php echo $obj->voltear_fecha($datos['ini_nom']); ?>
		</div>

	  </div>

	  <div class="row mt-1 bg-light align-items-center">

		<div class="col-md-3 col-12 text-left">
		     Fecha de Finalización:
		</div>
		<div class="col-md-8 col-12">
		    <?php echo $obj->voltear_fecha($datos['fin_nom']); ?>
		</div>

	  </div>

	  <div class="row mt-1 bg-light align-items-center">
			<div class="col-md-3 col-12 text-left">
			     N° Empleados a Procesar:
			</div>
			<div class="col-md-8 col-12">
			       
                   <?php
                   	$pun_emp=$objEmpleado->contar_filas($tabla="empleado",$variable="est_emp",$valor="A");
                   	$empleado=$objEmpleado->extraer_dato($pun_emp);
                   	echo $empleado["total"];
                   ?>
                   Empleados
			       <span class="badge badge-danger mt-2 mb-2">Solo se procesarán empleados con estatus activo</span>
			</div>
 	  </div>  



	  <div class="row mt-1 bg-light align-items-center">
			<div class="col-md-12 col-12 text-center bg-primary text-white">
			     <h5>Conceptos de Nómina Obligatorios</h5>
			</div>
 	  </div> 

	  <div class="row mt-1 bg-primary text-white text-center">

		<div class="col-md-4 col-12 border border-white ">
		     <small>Nombre del Concepto</small>
		</div>
		

		<div class="col-md-4 col-12 border border-white ">
		     <small>Tipo de Concepto</small>
		</div>


		<div class="col-md-4 col-12 border border-white ">
		     <small>Fórmula</small>
		</div>

		</div> <!-- Fin Row-->

	    <div class="row mt-1 justify-content-center bg-light">
		<?php
		
		$num_fil=0;

		$resultado=$objConcepto->filtrar("","","",$opc_con_nom="O");
		while(($concepto=$objConcepto->extraer_dato($resultado))>0){
		$num_fil++;	
		?>

		<div class="col-md-4 col-12 border border-white text-left">
		     <small><?php echo $concepto['des_con_nom']; ?></small>
		</div>

		<div class="col-md-4 col-12 border border-white text-left">
		     <small><?php  echo $concepto['nom_tip_con'];  ?></small>
		</div>
		<div class="col-md-4 col-12 border border-white text-left">
		     <small><?php  echo $concepto['for_con_nom'];  ?></small>
		</div>
		<?php
		}

		if($num_fil==0){
		?>
		<div class="col-12 border border-white text-center">
		     <small>No hay registros</small>
		</div>
		<?php
		}	
		?>

	  </div>

	  <div class="row mt-5">
	  	 <div class="col-12  text-center">
	  	 	 <input type="hidden" name="accion" id="accion" value="procesar">	
		     <input type="submit" class="btn btn-primary btn-lg" value="Continuar">
		     <input type="hidden" name="cod_nom" id="cod_nom" value="<?php echo $datos['cod_nom'] ?>">

		</div>
	   </div>	
	  
	   </div>
	 </div>  	  
	</div> <!-- Fin Container -->
	<script src="../../bootstrap-4.0/js/jquery-3.2.1.min.js"></script>
	<script src="../../bootstrap-4.0/js/popper-1.12.6.min.js"></script>
	<script src="../../bootstrap-4.0/js/bootstrap.min.js">	</script>	



	<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>
</form>
</body>
</html>