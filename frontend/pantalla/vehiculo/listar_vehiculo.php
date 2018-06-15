<?php
require("../../../backend/clase/vehiculo.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new vehiculo;
$objPermiso=new permiso;

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
	<title>Lista de Vehículos</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	
</head>
<body>

<form action="listar_vehiculo.php" method="POST">

	<div class="container-fluid">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Vehículo</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-primary text-white text-center">

	  	<div class="col-md-2 col-12 border border-white">
		  <a>Ver</a> 
		  <a>Editar</a>  
		  
		</div>

		<div class="col-md-2 col-12  border border-white">
		     <span>Placa</span>
		</div>

		<div class="col-md-3 col-12 border border-white ">
		     <span>Serial</span>
		</div>

		<div class="col-md-3 col-12 border border-white">
		     <span>Modelo</span>
		</div>
		
	 	<div class="col-md-2 col-12 border border-white">
		     <span>Folio</span>
		</div>



		</div> <!-- Fin Row-->

	    <div class="row mt-1 justify-content-center bg-light">
		<?php
		$num_fil=0;
		$resultado=$obj->filtrar($obj->cod_veh,$obj->pla_veh,$obj->ser_veh,$obj->fky_modelo,$obj->fol_ser);
		while(($datos=$obj->extraer_dato($resultado))>0){
		$num_fil++;	
		?>
		
		<div class="col-md-2 col-12 border border-white text-center">
		  <a href="<?php echo "ver_vehiculo.php?cod_veh=$datos[cod_veh]"?>">Ver</a> 
		  <a href="<?php echo "modificar_vehiculo.php?cod_veh=$datos[cod_veh]"?>">Editar</a>  
		</div>

		<div class="col-md-2 col-12 border border-white">
		     <span><?php echo $datos['pla_veh']; ?></span>
		</div>

		<div class="col-md-3 col-12 border border-white text-uppercase">
		     <span><?php echo $datos['ser_veh']; ?></span>
		</div>

		<div class="col-md-3 col-12 border border-white text-uppercase">
		     <span><?php echo $datos['nom_mod']; ?></span>
		</div>
		
	 	<div class="col-md-2 col-12 border border-white">
		     <span><?php echo $datos['fol_ser']; ?></span>
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
	  
	</div> <!-- Fin Container -->

</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>