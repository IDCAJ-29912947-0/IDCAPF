<?php
require("../../../backend/clase/concepto_nomina.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new concepto_nomina;
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
	<title>Listar Concepto de Nómina</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	
</head>
<body>


<form action="listar_concepto_nomina.php" method="POST">

	<div class="container-fluid">

	<div class="row justify-content-center">
	<div class="col-12 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Concepto de Nómina</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-primary text-white text-center">

	  	<div class="col-md-2 col-12 border border-white">
		  Ver 
		  Editar 
		  
		</div>

		<div class="col-md-1 col-12  border border-white">
		     <small>Num.</small>
		</div>

		<div class="col-md-3 col-12 border border-white ">
		     <small>Nombre del Concepto</small>
		</div>
		<div class="col-md-2 col-12 border border-white ">
		     <small>¿Obligatorio?</small>
		</div>

		<div class="col-md-2 col-12 border border-white ">
		     <small>Tipo de Concepto</small>
		</div>

		<div class="col-md-2 col-12 border border-white">
		     <small>Estatus</small>
		</div>

		</div> <!-- Fin Row-->

	    <div class="row mt-1 justify-content-center bg-light">
		<?php
		
		$num_fil=0;

		$resultado=$obj->filtrar("",$obj->des_con_nom,"","");
		while(($datos=$obj->extraer_dato($resultado))>0){
		$num_fil++;	
		?>

		<div class="col-md-2 col-12 border border-white text-center">
		  <a href="<?php echo "ver_concepto_nomina.php?cod_con_nom=$datos[cod_con_nom]"?>">Ver</a> 
		  <a href="<?php echo "modificar_concepto_nomina.php?cod_con_nom=$datos[cod_con_nom]"?>">Editar</a>  
		</div>

		<div class="col-md-1 col-12 border border-white">
		     <small><?php echo $num_fil; ?></small>
		</div>

		<div class="col-md-3 col-12 border border-white text-left">
		     <small><?php echo $datos['des_con_nom']; ?></small>
		</div>

		<div class="col-md-2 col-12 border border-white text-left">
		     <small><?php echo ($datos['opc_con_nom']=="O")?"Obligatorio":"Opcional"; ?></small>
		</div>

		<div class="col-md-2 col-12 border border-white text-left">
		     <small><?php  echo $datos['nom_tip_con'];  ?></small>
		</div>

		<div class="col-md-2 col-12 border border-white">
		     <small>
		     	<?php echo ($datos['est_con_nom']=="A") ? "Activa":"Inactiva"; ?>
		     </small>
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