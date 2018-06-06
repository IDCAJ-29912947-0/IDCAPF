<?php
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/modelo.class.php");
require("../../../backend/clase/marca.class.php");

$obj=new modelo;
$objMarca=new marca;
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
	<title>Agregar Modelo</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/modelo.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8  ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Modelo de Vehículo</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Marca:</label>
		</div>
		<div class="col-md-9 col-12">
		    <select name="fky_marca" id="fky_marca" class="form-control" required="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objMarca->asignar_valor("est_mar","A");
		    $pun_mar=$objMarca->listar();
		    while(($banco=$objMarca->extraer_dato($pun_mar))>0)
		    {
		    	echo "<option value='$banco[cod_mar]'>$banco[nom_mar]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="nom_mod" id="nom_mod" required="required" maxlength="35" class="form-control" placeholder="Nombre del Modelo" pattern="[a-zA-Z0-9 ]+" title="Solo valores Alfa-Númericos" required>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-9 col-12">
		<select name="est_mod" id="est_mod" class="form-control" required="">
			<option value="">Seleccione...</option>
			<option value="A">Activa</option>
			<option value="I">Inactiva</option>	
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Modelo">
		</div>
	   </div>	  	  
    </div>
  </div>
</div> <!-- Fin Container -->
<input type="hidden" name="accion" id="accion" value="agregar">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>