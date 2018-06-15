<?php
require("../../../backend/clase/tipo_servicio.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new tipo_servicio;
$objPermiso=new permiso;


$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_tip_ser,$nom_tip_ser="",$est_tip_ser="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Tipo de Servicio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/tipo_servicio.php" method="POST">

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Tipo de Servicio</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="nom_tip_ser" id="nom_tip_ser" required="required" maxlength="50" class="form-control text-capitalize" placeholder="Nombre del Tipo de Servicio" value="<?php echo $datos['nom_tip_ser']; ?>" pattern="[a-zA-Z0-9 ]+" title="Solo valores Alfa-Númericos" required="">
		</div>

	  </div> 


	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-9 col-12">
	     <select name='est_tip_ser' id='est_tip_ser' class='form-control' required="">
		 <?php
		 $selected = ($datos['est_tip_ser']=='A') ? "selected":"";
		 echo "<option value='A' $selected>Activo</option>";
		 $selected = ($datos['est_tip_ser']=='I') ? "selected":"";
		 echo "<option value='I' $selected>Inactivo</option>";
		 ?>
		</select>
	   </div>
	  </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Tipo de Servicio">
		</div>
	   </div>	
	  
	   </div>
	 </div>  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="modificar">
	<input type="hidden" name="cod_tip_ser" id="cod_tip_ser" value="<?php echo $datos['cod_tip_ser']; ?>" >			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina.");
}
?>