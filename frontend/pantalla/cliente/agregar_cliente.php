<?php
require("../../../backend/clase/cliente.class.php");
require("../../../backend/clase/permiso.class.php");


$obj=new cliente;
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
	<title>Agregar Cliente</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/Cliente.php" method="POST">

	<div class="container">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Cliente</h3>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre Comercial:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="com_cli" id="com_cli" required="required" maxlength="25" class="form-control" placeholder="Nombre Comercial" onkeyup="return solo_letras();">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">RFC:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="rfc_cli" id="rfc_cli" required="required" maxlength="15" class="form-control" placeholder="RFC" onkeyup="return solo_numeros();">
		</div>

	  </div> 

	   <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Referencia Bancaria:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="ref_cli" id="ref_cli" required="required" maxlength="20" class="form-control" placeholder="Referencia Bancaria">
		</div>

	  </div> 


	   <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Clabe Interbancaria:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="cue_cli" id="cue_cli" required="required" maxlength="20" class="form-control" placeholder="Clabe Interbancaria">
		</div>

	  </div> 

	   <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Filiales:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="fil_cli" id="fil_cli" required="required" maxlength="20" class="form-control" placeholder="Filiales">
		</div>

	  </div> 	

	   <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Departamento:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="dep_cli" id="dep_cli" required="required" maxlength="20" class="form-control" placeholder="Departamento">
		</div>

	  </div>


	   <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Crédito:</label>
		</div>
		<div class="col-md-3 col-12">
		    <input type="text" name="cre_cli" id="cre_cli" required="required" maxlength="10" class="form-control" placeholder="Credito">
		</div>

	  </div>

	   <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Fecha de Pago:</label>
		</div>
		<div class="col-md-3 col-12">
		    <input type="date" name="pag_cli" id="pag_cli" required="required"  class="form-control" placeholder="Fecha de Pago">
		</div>

	  </div>

	   <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Días de Crédito:</label>
		</div>
		<div class="col-md-3 col-12">
		    <select name='dia_cli' id='dia_cli' class="form-control">
		    <?php
		    	for ($i=0; $i < 366 ; $i++) { 
		    		echo "<option value='$i'>$i</option>";
		    	}
		    ?>
		    </select>
		</div>

	  </div>



	  <div class="row mt-1 bg-light">
	     <div class="col-md-3 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="est_cli" id="est_cli" class="form-control">
			<option value="A" selected="">Activo</option>
			<option value="I">Inactivo</option>	
		</select>
		</div>
	 </div>

	 <div class="row  mt-1 bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h4>Responsable Principal</h4>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="re1_cli" id="re1_cli" required="required" maxlength="25" class="form-control" placeholder="Nombre del Responsable Principal" onkeyup="return solo_letras();">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Teléfono:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="te1_cli" id="te1_cli" required="required" maxlength="15" class="form-control" placeholder="Teléfono Responsable Principal">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Dirección:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="di1_cli" id="di1_cli" required="required" maxlength="80" class="form-control" placeholder="Dirección del Responsable Principal">
		</div>

	  </div>

	  	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Email:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="em1_cli" id="em1_cli" required="required" maxlength="80" class="form-control" placeholder="Email del Responsable Principal">
		</div>

	  </div>




     <div class="row  mt-1 bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h4>Responsable Secundario</h4>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="re2_cli" id="re2_cli"  maxlength="25" class="form-control" placeholder="Nombre del Responsable Secundario" onkeyup="return solo_letras();">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Teléfono:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="te2_cli" id="te2_cli" maxlength="15" class="form-control" placeholder="Teléfono Responsable Secundario">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Dirección:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="di2_cli" id="di2_cli"  maxlength="80" class="form-control" placeholder="Dirección del Responsable Secundario">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Email:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="em2_cli" id="em2_cli"  maxlength="80" class="form-control" placeholder="Email del Responsable Secundario">
		</div>

	  </div>




    <div class="row  mt-1 bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h4>Otro Responsable</h4>
	 	 </div>
	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="re3_cli" id="re3_cli"  maxlength="25" class="form-control" placeholder="Nombre del Tercer Responsable" onkeyup="return solo_letras();">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Teléfono:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="te3_cli" id="te3_cli"  maxlength="15" class="form-control" placeholder="Teléfono Otro Responsable">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Dirección:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="di3_cli" id="di3_cli"  maxlength="80" class="form-control" placeholder="Dirección Otro Responsable">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Email:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="em3_cli" id="em3_cli"  maxlength="80" class="form-control" placeholder="Email Otro Responsable">
		</div>

	  </div>


	  <div class="row mt-1 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Cliente">
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