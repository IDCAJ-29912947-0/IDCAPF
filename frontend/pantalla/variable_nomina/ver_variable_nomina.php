<?php
require("../../../backend/clase/variable_nomina.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new variable_nomina;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_var_nom,$nom_var_nom="",$est_var_nom="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver Variable</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/variable_nomina.php" method="POST">

  <div class="container">

	<div class="row justify-content-center">
	<div class="col-10 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center text-left">
	  	<h3>Datos de la Variable</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Código:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" class="form-control" value="<?php echo $datos['cod_var_nom']; ?>" readonly>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text"  class="form-control text-capitalize" value="<?php echo $datos['nom_var_nom']; ?>" size="10" readonly >
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Descripción:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="des_var_nom" id="des_var_nom" required="required" maxlength="50" class="form-control" placeholder="Descripción de la Variable de Nómina" onkeyup="return solo_letras();" value="<?php echo $datos['des_var_nom']; ?>" readonly>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-4 col-12">
	  <fieldset disabled>
	     <select class='form-control'>
	     <option value="X">Seleccione...</option>
		 <?php
		 $selected = ($datos['est_var_nom']=='A') ? "selected":"";
		 echo "<option value='A' $selected>Activa</option>";
		 $selected = ($datos['est_var_nom']=='I') ? "selected":"";
		 echo "<option value='I' $selected>Inactiva</option>";	
		 ?>
		</select>
		</fieldset>
	   </div>
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