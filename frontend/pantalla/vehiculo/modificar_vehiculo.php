<?php
require("../../../backend/clase/vehiculo.class.php");
require("../../../backend/clase/marca.class.php");
require("../../../backend/clase/modelo.class.php");
require("../../../backend/clase/cliente.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new vehiculo;
$objModelo=new modelo;
$objMarca=new marca;
$objCliente=new cliente;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

	$resultado=$obj->filtrar($obj->cod_veh,$obj->pla_veh,$obj->ser_veh,$obj->fky_modelo,$obj->fol_ser);
	$vehiculo=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Vehículo</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script src="../../js/vehiculo.js" type="text/javascript"></script>
</head>
<body>

<form action="../../../backend/controlador/vehiculo.php" method="POST">

	<div class="container">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Vehículo</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Placa Actual:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="pla_veh" id="pla_veh" required="required" maxlength="10" class="form-control" placeholder="XXXXX" pattern="[a-zA-Z0-9,./#$]+" title="Solo Valores Alfa-Numéricos y caracteres especiales cómo ( , ) ( . ) ( / ) ( # ) ( $ )" value="<?php echo $vehiculo['pla_veh']; ?>">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">
	        <div class="col-md-3 col-12 align-self-center text-left">
			     <label for="">Cliente:</label>
			</div>
			<div class="col-md-9 col-12 text-muted">
			 <select name="fky_cliente" id="fky_cliente" class="form-control" required="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objCliente->asignar_valor("est_cli","A");
		    $pun_cli=$objCliente->listar();
		    while(($cliente=$objCliente->extraer_dato($pun_cli))>0)
		    {
		    	if($cliente['cod_cli']==$vehiculo['fky_cliente'])
		    		$selected='selected';
		    	     else
		    	     	$selected=''; 

		    	echo "<option value='$cliente[cod_cli]' $selected>$cliente[com_cli]</option>";
		    }	
		    ?>
		    </select>
			</div>
	</div>


<div class="row mt-2 bg-light">
	  <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Marca:</label>
	  </div>
	  <div class="col-md-9 col-12">
		    <select name="fky_marca" id="fky_marca" class="form-control" onchange="seleccionar_modelo()" required="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objMarca->asignar_valor("est_mar","A");
		    $pun_mar=$objMarca->listar();
		    	while(($marca=$objMarca->extraer_dato($pun_mar))>0)
		    	{
		    		if($marca['cod_mar']==$vehiculo['cod_mar'])
		    		$selected='selected';
		    	     else
		    	     	$selected=''; 

		    	echo "<option value='$marca[cod_mar]' $selected>$marca[nom_mar]</option>";


		    	}
		    	
		    ?>
		    </select>
	    </div>
	</div>


	<div class="row mt-2 bg-light">
	        <div class="col-md-3 col-12 align-self-center text-left">
			     <label for="">Modelo:</label>
			</div>
			<div class="col-md-9 col-12 text-muted" id="zona_modelo">
			 <select name="fky_modelo" id="fky_modelo" class="form-control" required="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objModelo->asignar_valor("est_mod","A");
		    $pun_mod=$objModelo->listar();
		    while(($modelo=$objModelo->extraer_dato($pun_mod))>0)
		    {
		    	if($modelo['cod_mod']==$vehiculo['fky_modelo'])
		    		$selected='selected';
		    	     else
		    	     	$selected=''; 

		    	echo "<option value='$modelo[cod_mod]' $selected>$modelo[nom_mod]</option>";
		    }	
		    ?>
		    </select>
			</div>
	</div>	

	  <div class="row mt-2 bg-light">
	  	<div class="col-md-3 col-12 align-self-center">
		     <label for="">Serial:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="ser_veh" id="ser_veh" maxlength="20" class="form-control" placeholder="XXXXX" pattern="[a-zA-Z0-9,.-/#$]+" title="Solo Valores Alfa-Numéricos y caracteres especiales cómo ( , ) ( . ) ( - ) ( / ) ( # ) ( $ )"  value="<?php echo $vehiculo['ser_veh']; ?>" required="">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	  	<div class="col-md-3 col-12 align-self-center">
		     <label for="">Año:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="number" max="2019" min="1980" name="ano_veh" id="ano_veh" pattern="[0-9]+" title="Solo Números" required="" class="form-control" value="<?php echo $vehiculo['ano_veh']; ?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	  	<div class="col-md-3 col-12 align-self-center">
		     <label for="">Último Kilometraje:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="kms_veh" id="kms_veh" pattern="[0-9]+" title="Solo Números" required="" class="form-control" value="<?php echo $vehiculo['kms_veh']; ?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Folio de Servicio:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="fol_ser" id="fol_ser" required="required" maxlength="10" class="form-control" placeholder="" pattern="[a-zA-Z0-9,./-#$]+" title="Solo valores Alfa-Númericos y Caracteres especiales cómo ( , ) ( . ) ( / ) ( - ) ( # ) ( $ )" value="<?php echo $vehiculo['fol_ser']; ?>">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">
	  	<div class="col-md-3 col-12 align-self-center">
		     <label for="">Número Económico:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="num_veh" id="num_veh" pattern="[0-9]+" maxlength="10" title="Solo Números" required="" class="form-control" value="<?php echo $vehiculo['num_veh']; ?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Conductor Actual:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="con_veh" id="con_veh" required="required" maxlength="50" class="form-control" placeholder="Conductor Actual" pattern="[a-zA-Z0-9 ]+" title="Solo Valores Alfa-Numéricos" value="<?php echo $vehiculo['con_veh']; ?>">
		</div>

	  </div> 

	   <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-9 col-12">
		<select name="est_veh" id="est_veh" class="form-control" required="">
		<option value="">Seleccione...</option>
		<?php
		    $selected=($vehiculo["est_veh"]=="A")?"selected":"";
		  	echo "<option value='A' $selected>Activa</option>";
		    $selected=($vehiculo["est_veh"]=="I")?"selected":"";		  	
			echo "<option value='I' $selected>Inactiva</option>";	
		?>	
		</select>
		</div>
	   </div>
		
	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Vehículo">
		</div>
	   </div>	 

	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="modificar">	
	<input type="hidden" name="cod_veh" id="cod_veh" value="<?php echo $vehiculo["cod_veh"];?>">				
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>