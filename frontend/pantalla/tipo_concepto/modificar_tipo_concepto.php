<?php
require("../../../backend/clase/tipo_concepto.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new tipo_concepto;
$objPermiso=new permiso;


$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_tip_con,$nom_tip_con="",$est_tip_con="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Tipo de Concepto</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/tipo_concepto.php" method="POST">

	<div class="container">
	<div class="row justify-content-center">
	<div class="col-10 text-center ">


	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Tipo de Concepto</h3>
	 	 </div>
	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="nom_tip_con" id="nom_tip_con" required="required" maxlength="50" class="form-control text-capitalize" placeholder="Nombre del Tipo de Concepto" onkeyup="return solo_numeros();" 
		    value="<?php echo $datos['nom_tip_con']; ?>" class="form-control">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">¿Suma o Resta?:</label>
		</div>
		<div class="col-md-8 col-12">
		   <select name="sig_tip_con" id="sig_tip_con" class="form-control">
		   	<option value="+" <?php echo $selected=($datos["sig_tip_con"]=="+")?"selected":""; ?> >Suma</option>
		   	<option value="-" <?php echo $selected=($datos["sig_tip_con"]=="-")?"selected":""; ?>>Resta</option>
		   </select>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-4 col-12">
	     <select name='est_tip_con' id='est_tip_con' class='form-control'>
		 <?php
		 $selected = ($datos['est_tip_con']=='A') ? "selected":"";
		 echo "<option value='A' $selected>Activo</option>";
		 $selected = ($datos['est_tip_con']=='I') ? "selected":"";
		 echo "<option value='I' $selected>Inactivo</option>";
		 ?>
		</select>
	   </div>
	  </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Tipo de Concepto">
		</div>
	   </div>	
	  
	   </div>
	 </div>  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="modificar">
	<input type="hidden" name="cod_tip_con" id="cod_tip_con" value="<?php echo $datos['cod_tip_con']; ?>">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>