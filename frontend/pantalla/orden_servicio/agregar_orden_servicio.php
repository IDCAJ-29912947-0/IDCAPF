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

<form action="../../../backend/controlador/orden_servicio.php" method="POST">

	<div class="container">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la  Orden de Servicio</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">
	  	<div class="col-md-3 col-12 align-self-center">
		     <label for="">Fecha de la Orden:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="date" name="fec_ord" id="fec_ord" required="" class="form-control">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Kilometraje del Vehículo:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="kms_ord" id="kms_ord" required="required" maxlength="25" class="form-control" placeholder="XXXXX" pattern="[0-9]+" title="Solo Números">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">
	  	<div class="col-md-3 col-12 align-self-center">
		     <label for="">Ingreso al Taller:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="date" name="fet_ord" id="fet_ord" required="" class="form-control">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	  	<div class="col-md-3 col-12 align-self-center">
		     <label for="">Salida del Taller:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="date" name="fee_ord" id="fee_ord" required="" class="form-control">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Código de Autorización:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="aut_ord" id="aut_ord" required="required" maxlength="20" class="form-control" placeholder="" pattern="[a-zA-Z0-9,./-#$]+" title="Solo valores Alfa-Númericos y Caracteres especiales cómo ( , ) ( . ) ( / ) ( - ) ( # ) ( $ )">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Taller:</label>
		</div>
		<div class="col-md-9 col-12">
		    <select name="fky_taller" id="fky_taller" class="form-control" required="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objTaller->asignar_valor("est_tal","A");
		    $pun_tal=$objTaller->listar();
		    while(($orden_servicio=$objTaller->extraer_dato($pun_tal))>0)
		    {
		    	echo "<option value='$orden_servicio[cod_tal]'>$orden_servicio[nom_tal]</option>";
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
		    <select name="fky_cliente" id="fky_cliente" class="form-control" required="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objCliente->asignar_valor("est_cli","A");
		    $pun_cli=$objCliente->listar();
		    while(($orden_servicio=$objCliente->extraer_dato($pun_cli))>0)
		    {
		    	echo "<option value='$orden_servicio[cod_cli]'>$orden_servicio[com_cli]</option>";
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
		    <select name="fky_ciudad" id="fky_ciudad" class="form-control" required="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objCiudad->asignar_valor("est_ciu","A");
		    $pun_ciu=$objCiudad->listar();
		    while(($orden_servicio=$objCiudad->extraer_dato($pun_ciu))>0)
		    {
		    	echo "<option value='$orden_servicio[cod_ciu]'>$orden_servicio[nom_ciu]</option>";
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
		    <select name="fky_empleado" id="fky_empleado" class="form-control" required="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objEmpleado->asignar_valor("est_emp","A");
		    $pun_emp=$objEmpleado->listar();
		    while(($orden_servicio=$objEmpleado->extraer_dato($pun_emp))>0)
		    {
		    	echo "<option value='$orden_servicio[cod_emp]'>$orden_servicio[nom_emp]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Vehiculo:</label>
		</div>
		<div class="col-md-9 col-12">
		    <select name="fky_vehiculo" id="fky_vehiculo" class="form-control" required="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objVehiculo->asignar_valor("est_veh","A");
		    $pun_veh=$objVehiculo->listar();
		    while(($orden_servicio=$objVehiculo->extraer_dato($pun_veh))>0)
		    {
		    	echo "<option value='$orden_servicio[cod_veh]'>$orden_servicio[pla_veh]</option>";
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
		    <input type="text" name="obs_ord" id="obs_ord" required="required" maxlength="80" class="form-control" placeholder="Observación" pattern="[a-zA-Z0-9 ]+" title="Solo Valores Alfa-Numéricos">
		</div>

	  </div>


	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-9 col-12">
		<select name="est_ord" id="est_ord" class="form-control" required="">
			<option value="">Seleccione...</option>
			<option value="A">Activo</option>
			<option value="I">Inactivo</option>	
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Orden de Servicio">
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