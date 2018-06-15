<?php
require("../../../backend/clase/modulo.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new modulo;
$objPermiso=new permiso;


$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_mod,$nom_mod="",$est_mod="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Módulo</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-9 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Módulo</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="nom_mod" id="nom_mod" maxlength="50" class="form-control text-capitalize" placeholder="Nombre del Módulo" value="<?php echo $datos['nom_mod']; ?>" pattern="[a-zA-Z0-9 ]+" title="Solo valores Alfa-Númericos" disabled>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		  <div class="col-md-4 col-12 align-self-center">
		  	<label for="">Url del Módulo:</label>
		  </div>
		  <div class="col-8">
			  <input type="text" name="url_mod" id="url_mod" placeholder="modulo/" maxlength="50" class="form-control" value="<?php echo $datos['url_mod']; ?>" pattern="[a-zA-Z0-9/._?]+" title="Solo valores Alfa-Númericos y caracteres especiales cómo ( / ) ( . ) ( _ ) ( ? )" disabled>
		  </div>
	  </div>


	  <div class="row mt-2 bg-light">
	     <div class="col-md-4 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-8 col-12">
	     <select name='est_mod' id='est_mod' class='form-control' disabled>
		 <?php
		 $selected = ($datos['est_mod']=='A') ? "selected":"";
		 echo "<option value='A' $selected>Activo</option>";
		 $selected = ($datos['est_mod']=='I') ? "selected":"";
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