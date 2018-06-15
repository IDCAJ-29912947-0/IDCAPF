<?php
require("../../../backend/clase/nomina.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new nomina;
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
	<title>Listar Nómina</title>
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
	  	<h3>Datos de la Nómina</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-primary text-white text-center">

	  	<div class="col-md-2 col-12 border border-white">
		 <small>
		  Ver 
		  Editar 
		  </small>
		</div>

		<div class="col-md-1 col-12  border border-white">
		     <span>Código</span>
		</div>

		<div class="col-md-6 col-12 border border-white ">
		     <span>Nombre del Nómina</span>
		</div>


		<div class="col-md-1 col-12 border border-white">
		     <span>Detalle</span>
		</div>		

		<div class="col-md-2 col-12 border border-white">
		     <span>Estatus</span>
		</div>	

		</div> <!-- Fin Row-->

	    <div class="row mt-1 justify-content-center bg-light">
		<?php
		
		$num_fil=0;
		$resultado=$obj->filtrar("",$obj->des_nom,"");
		while(($datos=$obj->extraer_dato($resultado))>0){
		$num_fil++;	
		?>

		<div class="col-md-2 col-12 border border-white text-center">
		  <a href="<?php echo "ver_nomina.php?cod_nom=$datos[cod_nom]"?>"><small>Ver</small></a> 
		  <a href="<?php echo "modificar_nomina.php?cod_nom=$datos[cod_nom]"?>"><small>Editar</small></a>  
		</div>

		<div class="col-md-1 col-12 border border-white">
		     <small><?php echo $datos['cod_nom']; ?></small>
		</div>

		<div class="col-md-6 col-12 border border-white text-left text-capitalize">
		     <small><?php echo $datos['des_nom']; ?></small>
		</div>

		<div class="col-md-1 col-12 border border-white">
		     <small>
		     	<a href="detalle_nomina.php?cod_nom=<?php echo $datos['cod_nom']?>">Detalle</a>
		     </small>
		</div>	

		<div class="col-md-2 col-12 border border-white">
		     <small>
		     	<?php echo $obj->ver_estatus_nomina($datos['est_nom']); ?>
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