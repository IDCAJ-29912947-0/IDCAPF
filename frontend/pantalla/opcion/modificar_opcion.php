<?php
require("../../../backend/clase/opcion.class.php");
require("../../../backend/clase/modulo.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new opcion;
$objModulo=new modulo;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtro($obj->cod_opc,$nom_opc="",$est_opc="");
$opcion=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Opción</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/opcion.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-8 ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la Opción</h3>
	 	 </div>
	 </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="nom_opc" id="nom_opc" required="required" maxlength="35" class="form-control" placeholder="Nombre de la Opción" value="<?php echo $opcion['nom_opc']?>" pattern="[a-zA-Z0-9 ]+" title="Solo valores Alfa-Númericos" required>
		</div>
	  </div>
	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Módulo:</label>
		</div>
		<div class="col-md-9 col-12">
		    <select name="fky_modulo" id="fky_modulo" class="form-control" required="">
		    <option value="">Seleccione...</option>
		   		<?php
		    		$objModulo->asignar_valor("est_mod","A");
		    		$pun_mod=$objModulo->listar();
		    		while(($modulo=$objModulo->extraer_dato($pun_mod))>0)
		    		{
		    			$selected=($modulo["cod_mod"]==$opcion["fky_modulo"])?"selected":""; 
		    			echo "<option value='$modulo[cod_mod]' $selected>$modulo[nom_mod]</option>";
		    		}	
		    	?>
		    </select>
		</div>

	  </div>
	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">URL:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="url_opc" id="url_opc" required="required" maxlength="35" class="form-control" placeholder="URL de la Opción" value="<?php echo $opcion['url_opc']?>" pattern="[a-zA-Z0-9/._?-]+" title="Solo valores Alfa-Númericos y caracteres especiales cómo ( / ) ( . ) ( _ ) ( ? ) ( - )" required="">
		</div>

	  </div>
	

	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-9 col-12">
		<select name="est_opc" id="est_opc" class="form-control" required="">
		<option value="">Seleccione...</option>
		<?php
		    $selected=($opcion["est_opc"]=="A")?"selected":"";
		  	echo "<option value='A' $selected>Activa</option>";
		    $selected=($opcion["est_opc"]=="I")?"selected":"";		  	
			echo "<option value='I' $selected>Inactiva</option>";	
		?>	
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Opción">
		</div>
	   </div>	  	  
    </div>
  </div>
</div> <!-- Fin Container -->
<input type="hidden" name="accion" id="accion" value="modificar">	
<input type="hidden" name="cod_opc" id="cod_opc" value="<?php echo $opcion["cod_opc"];?>">		
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina.");
}
?>