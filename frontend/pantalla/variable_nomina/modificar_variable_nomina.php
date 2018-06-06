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
	<title>Modificar Variable</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/variable_nomina.php" method="POST">

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-10 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la Variable</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="nom_var_nom" id="nom_var_nom" required="required" maxlength="10" class="form-control text-capitalize" placeholder="Nombre de la Variable" onkeyup="return solo_numeros();" 
		    value="<?php echo $datos['nom_var_nom']; ?>" class="form-control">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Descripción:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="des_var_nom" id="des_var_nom" required="required" maxlength="50" class="form-control" placeholder="Descripción de la Variable de Nómina" onkeyup="return solo_letras();" value="<?php echo $datos['des_var_nom']; ?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Valor:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="val_var_nom" id="val_var_nom" required="required" maxlength="6" class="form-control" placeholder="Valor en Unidades o Porcentajes" value="<?php echo $datos['val_var_nom']; ?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-4 col-12">
	     <select name='est_var_nom' id='est_var_nom' class='form-control'>
		 <?php
		 $selected = ($datos['est_var_nom']=='A') ? "selected":"";
		 echo "<option value='A' $selected>Activo</option>";
		 $selected = ($datos['est_var_nom']=='I') ? "selected":"";
		 echo "<option value='I' $selected>Inactivo</option>";
		 ?>
		</select>
	   </div>
	  </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Variable">
		</div>
	   </div>	
	  
	   </div>
	 </div>  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="modificar">
	<input type="hidden" name="cod_var_nom" id="cod_var_nom" value="<?php echo $datos['cod_var_nom']; ?>">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>