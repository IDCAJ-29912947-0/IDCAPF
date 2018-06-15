<?php
require("../../../backend/clase/servicio.class.php");
require("../../../backend/clase/tipo_servicio.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new servicio;
$objTipo_servicio=new tipo_servicio;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($servicio=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_ser,$nom_ser="",$est_ser="");
$servicio=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Servicio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row justify-content-center">
	<div class="col-9 ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Servicio</h3>
	 	 </div>
	 </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="nom_ser" id="nom_ser" maxlength="35" class="form-control" placeholder="Nombre del Servicio" value="<?php echo $servicio['nom_ser']?>" pattern="[a-zA-Z0-9 ]+" title="Solo valores Alfa-Númericos" disabled>
		</div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 align-self-center">
		     <label for="">Precio:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="pre_ser" id="pre_ser" maxlength="35" class="form-control" placeholder="Precio del Servicio" value="<?php echo $servicio['pre_ser']?>" pattern="[0-9,]+" title="Solo valores Númericos y caracteres especiales cómo ( , )" disabled>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 align-self-center text-left">
		     <label for="">Tipo de Servicio:</label>
		</div>
		<div class="col-md-8 col-12">
		    <select name="fky_tipo_servicio" id="fky_tipo_servicio" class="form-control" disabled>
		    <option value="">Seleccione...</option>
		   		<?php
		    		$objTipo_servicio->asignar_valor("est_tip_ser","A");
		    		$pun_tip_ser=$objTipo_servicio->listar();
		    		while(($tipo_servicio=$objTipo_servicio->extraer_dato($pun_tip_ser))>0)
		    		{
		    			$selected=($tipo_servicio["cod_tip_ser"]==$servicio["fky_tipo_servicio"])?"selected":""; 
		    			echo "<option value='$tipo_servicio[cod_tip_ser]' $selected>$tipo_servicio[nom_tip_ser]</option>";
		    		}	
		    	?>
		    </select>
		</div>

	  </div>
	

	  <div class="row mt-2 bg-light">
	     <div class="col-md-4 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-8 col-12">
		<select name="est_ser" id="est_ser" class="form-control" disabled>
		<option value="">Seleccione...</option>
		<?php
		    $selected=($servicio["est_ser"]=="A")?"selected":"";
		  	echo "<option value='A' $selected>Activa</option>";
		    $selected=($servicio["est_ser"]=="I")?"selected":"";		  	
			echo "<option value='I' $selected>Inactiva</option>";	
		?>	
		</select>
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
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina.");
}
?>