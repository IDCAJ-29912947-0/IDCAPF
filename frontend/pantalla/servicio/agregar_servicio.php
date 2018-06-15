<?php 
 	require ("../../../backend/clase/tipo_servicio.class.php");
 	$obj_tip_ser=new tipo_servicio;
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Servicio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>
	<form action="../../../backend/controlador/servicio.php" method="POST">
		<input type="hidden" name="accion" id="accion" value="agregar">
		<div class="container">
			<div class="row">
				<div class="col-12 bg-primary text-white text-center">Agregar Servicio</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Nombre:</div>
				<div class="col-8"><input type="text" name="nom_ser" id="nom_ser" placeholder="Nombre del Servicio" class="form-control" pattern="[a-zA-Z0-9/._? ]+" title="Solo valores Alfa-Númericos y caracteres especiales cómo ( / ) ( . ) ( _ ) ( ? )" required=""></div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Precio:</div>
				<div class="col-8">
					<input type="text" name="pre_ser" id="pre_ser" placeholder="Precio" class="form-control" pattern="[0-9.]+" title="Solo valores Númericos y caracteres especiales cómo ( . )" required="">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Tipo de Servicio:</div>
				<div class="col-8">
					<select name="fky_tipo_servicio" id="fky_tipo_servicio" class="form-control"  required="">
					<option value="">Seleccione...</option>
					<?php 	
							$obj_tip_ser->asignar_valor("est_tip_ser","A");
							$ret=$obj_tip_ser->listar();
							while(($tip_ser=$obj_tip_ser->extraer_dato($ret))>0)
							{
								echo "<option value='$tip_ser[cod_tip_ser]'> 
								      $tip_ser[nom_tip_ser] 
								     </option>";
							}
					?>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4">Estatus:</div>
				<div class="col-8">
					<select name="est_ser" id="est_ser" class="form-control" required="">
						<option value="">Seleccione...</option>
						<option value="A">Activo</option>
						<option value="I">Inactivo</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-12 text-center">
					<input type="submit" class="btn btn-primary" value="Guardar Servicio">
				</div>
			</div>
		</div>
	</form>
</body>
</html>