<?php
require("../../../backend/clase/usuario.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/rol.class.php");

$obj=new usuario;
$objPermiso=new permiso;
$objRol=new rol;


$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_usu,$obj->ema_usu,$obj->nom_usu,$obj->ape_usu,$obj->fky_rol,$obj->est_usu);
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar usuario</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-10 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Usuario</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">
		<div class="col-4">Email:</div>
			<div class="col-8">
				<input type="email" name="ema_usu" id="ema_usu" placeholder="email@email.com" class="form-control" value="<?php echo $datos['ema_usu'] ?>" disabled="">
			</div>
		</div>

		<div class="row mt-2 bg-light">
			<div class="col-4">Nombre:</div>
			<div class="col-8">
				<input type="text" name="nom_usu" id="nom_usu" placeholder="Nombre" class="form-control" pattern="[a-zA-Z ]+" title="Solo Letras" value="<?php echo $datos['nom_usu'] ?>" disabled="">
			</div>
		</div>
		<div class="row mt-2 bg-light">
			<div class="col-4">Apellido:</div>
			<div class="col-8">
				<input type="text" name="ape_usu" id="ape_usu" placeholder="Apellido" class="form-control" pattern="[a-zA-Z ]+" title="Solo Letras" value="<?php echo $datos['ape_usu'] ?>" disabled="">
			</div>
		</div>
		<div class="row mt-2 bg-light">
			<div class="col-4">Rol:</div>
			<div class="col-8">
				<select name="fky_rol" id="fky_rol" class="form-control" disabled="">
					<option value="">Seleccione...</option>
					<?php
		    		$objRol->asignar_valor("est_rol","A");
		    		$pun_rol=$objRol->listar();
		    		while(($rol=$objRol->extraer_dato($pun_rol))>0)
		    		{
		    			if($rol["cod_ban"]==$datos["fky_brol"])
                    		$selected='selected';
                      		else
                      	 		$selected='';

 		    			echo "<option value='$rol[cod_rol]' $selected>$rol[nom_rol]</option>";
		    		}	
		    		?>
				</select>
			</div>
		</div>
	  	<div class="row mt-2 bg-light">
	     	<div class="col-md-4 col-12 align-self-center">
		     	<label for="">Estatus:</label>
			</div>
	  	<div class="col-md-8 col-12">
	     	<select name='est_usu' id='est_usu' class='form-control' disabled="">
		 	<?php
		 		$selected = ($datos['est_usu']=='A') ? "selected":"";
		 		echo "<option value='A' $selected>Activo</option>";
		 		$selected = ($datos['est_usu']=='I') ? "selected":"";
		 		echo "<option value='I' $selected>Inactivo</option>";
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
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>