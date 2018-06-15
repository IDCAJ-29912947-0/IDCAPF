<?php
require("../../../backend/clase/orden_servicio.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new orden_servicio;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filtrar Orden de Servicio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="listar_orden_servicio.php" method="POST">

	<div class="container">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Buscar Orden de Servicio</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light"">

		<div class="col-md-4 col-12 align-self-center">
		     <label for="">Código de Autorización:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="aut_ord" id="aut_ord" maxlength="20" class="form-control" placeholder="XA,./-#$" pattern="[a-zA-Z0-9,./-#$]+" title="Solo valores Alfa-Númericos y Caracteres especiales cómo ( , ) ( . ) ( / ) ( - ) ( # ) ( $ )">
		</div>

	  </div>

	  <div class="row mt-2 bg-light" >
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Filtrar Orden de Servicio">
		</div>
	   </div>	  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="filtrar">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>