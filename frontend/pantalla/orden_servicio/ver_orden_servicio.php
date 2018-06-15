<?php
require("../../../backend/clase/orden_servicio.class.php");
require("../../../backend/clase/taller.class.php");
require("../../../backend/clase/cliente.class.php");
require("../../../backend/clase/ciudad.class.php");
require("../../../backend/clase/vehiculo.class.php");
require("../../../backend/clase/empleado.class.php");
require("../../../backend/clase/permiso.class.php");


$obj=new orden_servicio;
$objTaller=new taller;
$objCliente=new cliente;
$objCiudad=new ciudad;
$objEmpleado=new empleado;
$objVehiculo=new vehiculo;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
}
$resultado=$obj->filtrar($obj->cod_ord,$obj->fec_ord,$obj->kms_ord,$obj->fet_ord,$obj->fee_ord,$obj->aut_ord,$obj->fky_taller,$obj->fky_cliente,$obj->fky_ciudad,$obj->fky_vehiculo,$obj->fky_empleado,$obj->obs_ord,$obj->est_ord);
$orden_servicio=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Orden de Servicio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

	<div class="container">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la Orden de Servicio</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">
	  	<div class="col-md-3 col-12 align-self-center">
		     <label for="">Fecha:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="fec_ord" id="fec_ord" disabled="" class="form-control" value="<?php echo $orden_servicio['fec_ord']; ?>">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Kilometraje del Vehículo:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="kms_ord" id="kms_ord" disabled maxlength="25" class="form-control" placeholder="Kilometros" pattern="[0-9]+" title="Solo Números" value="<?php echo $orden_servicio['kms_ord']; ?>">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">
	  	<div class="col-md-3 col-12 align-self-center">
		     <label for="">Ingreso al Taller:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="date" name="fet_ord" id="fet_ord" disabled="" class="form-control"  value="<?php echo $orden_servicio['fet_ord']; ?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	  	<div class="col-md-3 col-12 align-self-center">
		     <label for="">Salida del Taller:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="date" name="fee_ord" id="fee_ord" disabled="" class="form-control" value="<?php echo $orden_servicio['fee_ord']; ?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Código de Autorización:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="aut_ord" id="aut_ord" disabled maxlength="20" class="form-control" placeholder="" pattern="[a-zA-Z0-9 ]+" title="Solo valores Alfa-Númericos" value="<?php echo $orden_servicio['aut_ord']; ?>">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Taller:</label>
		</div>
		<div class="col-md-9 col-12">
		    <select name="fky_taller" id="fky_taller" class="form-control" disabled="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objTaller->asignar_valor("est_tal","A");
		    $pun_tal=$objTaller->listar();
		    while(($taller=$objTaller->extraer_dato($pun_tal))>0)
		    {
		    	$selected=($taller["cod_tal"]==$orden_servicio["fky_taller"])?"selected":""; 
		    	echo "<option value='$taller[cod_tal]' $selected>$taller[nom_tal]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Cliente:</label>
		</div>
		<div class="col-md-9 col-12">
		    <select name="fky_cliente" id="fky_cliente" class="form-control" disabled="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objCliente->asignar_valor("est_cli","A");
		    $pun_cli=$objCliente->listar();
		    while(($cliente=$objCliente->extraer_dato($pun_cli))>0)
		    {
		    	$selected=($cliente["cod_cli"]==$orden_servicio["fky_cliente"])?"selected":""; 
		    	echo "<option value='$cliente[cod_cli]' $selected>$cliente[com_cli]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Ciudad:</label>
		</div>
		<div class="col-md-9 col-12">
		    <select name="fky_ciudad" id="fky_ciudad" class="form-control" disabled="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objCiudad->asignar_valor("est_ciu","A");
		    $pun_ciu=$objCiudad->listar();
		    while(($ciudad=$objCiudad->extraer_dato($pun_ciu))>0)
		    {
		    	$selected=($ciudad["cod_ciu"]==$orden_servicio["fky_ciudad"])?"selected":""; 
		    	echo "<option value='$ciudad[cod_ciu]' $selected>$ciudad[nom_ciu]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Empleado:</label>
		</div>
		<div class="col-md-9 col-12">
		    <select name="fky_empleado" id="fky_empleado" class="form-control" disabled="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objEmpleado->asignar_valor("est_emp","A");
		    $pun_emp=$objEmpleado->listar();
		    while(($empleado=$objEmpleado->extraer_dato($pun_emp))>0)
		    {
		    	$selected=($empleado["cod_emp"]==$orden_servicio["fky_empleado"])?"selected":""; 
		    	echo "<option value='$empleado[cod_emp]' $selected>$empleado[nom_emp]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Vehículo:</label>
		</div>
		<div class="col-md-9 col-12">
		    <select name="fky_vehiculo" id="fky_vehiculo" class="form-control" disabled="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objVehiculo->asignar_valor("est_veh","A");
		    $pun_veh=$objVehiculo->listar();
		    while(($vehiculo=$objVehiculo->extraer_dato($pun_veh))>0)
		    {
		    	$selected=($vehiculo["cod_veh"]==$orden_servicio["fky_vehiculo"])?"selected":""; 
		    	echo "<option value='$vehiculo[cod_veh]' $selected>$vehiculo[pla_veh]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Observación:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="obs_ord" id="obs_ord" disabled maxlength="80" class="form-control" placeholder="obs_ord" pattern="[a-zA-Z0-9 ]+" title="Solo Valores Alfa-Numéricos" value="<?php echo $orden_servicio['obs_ord']; ?>">
		</div>

	  </div>


	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-9 col-12">
		<select name="est_ord" id="est_ord" class="form-control" disabled="">
		<option value="">Seleccione...</option>
		<?php
		    $selected=($orden_servicio["est_ord"]=="A")?"selected":"";
		  	echo "<option value='A' $selected>Activa</option>";
		    $selected=($orden_servicio["est_ord"]=="I")?"selected":"";		  	
			echo "<option value='I' $selected>Inactiva</option>";	
		?>	
		</select>
		</div>
	   </div>	 

	</div> <!-- Fin Container -->
	<input type="hidden" name="cod_ord" id="cod_ord" value="<?php echo $orden_servicio["cod_ord"];?>">					
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>