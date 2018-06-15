<?php
require("../../../backend/clase/opcion.class.php");
require("../../../backend/clase/modulo.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new opcion;
$objmodulo=new modulo;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

$resultado=$obj->filtro($obj->cod_opc,$nom_opc="",$est_opc="");
$opcion=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Opcion</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/opcion.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-9">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la Opcion</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="nom_opc" id="nom_opc" required="required" maxlength="35" class="form-control" placeholder="Nombre del opcion" onkeyup="return solo_letras();" value="<?php echo $opcion['nom_opc']?>" disabled>
		</div>

	  </div>	
  	  



	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Modulo:</label>
		</div>
		<div class="col-md-9 col-12">
		   <fieldset disabled>
		    <select name="fky_modulo" id="fky_modulo" class="form-control">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objmodulo->asignar_valor("est_mod","A");
		    $pun_mod=$objmodulo->listar();
		    while(($modulo=$objmodulo->extraer_dato($pun_mod))>0)
		    {
		    	$selected=($modulo["cod_mod"]==$opcion["fky_modulo"])?"selected":""; 
		    	echo "<option value='$modulo[cod_mod]' $selected>$modulo[nom_mod]</option>";
		    }	
		    ?>
		    </select>
		    </fieldset>
		</div>

	  	</div>

	  		<div class="row mt-2">
			<div class="col-3">URL:</div>
			<div class="col-9">
				<input type="text" name="url_opc" id="url_opc" placeholder="URL de la opcion" class="form-control" value="<?php echo $opcion['url_opc']?>" disabled>
			</div>

		</div>

	  <div class="row mt-2 bg-light">

	    	<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
			</div>
	    	<div class="col-md-9 col-12">
	    	<fieldset disabled>
			<select name="est_opc" id="est_opc" class="form-control">
			<?php
		   	 	$selected=($opcion["est_opc"]=="A")?"selected":"";
		  		echo "<option value='A' $selected>Activa</option>";
		   	 	$selected=($opcion["est_opc"]=="I")?"selected":"";		  	
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