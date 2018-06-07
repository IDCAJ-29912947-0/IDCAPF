<?php
require("../../../backend/clase/concepto_nomina.class.php");
require("../../../backend/clase/tipo_concepto.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/variable_nomina.class.php");

$obj=new concepto_nomina;
$objTipoConcepto=new tipo_concepto;
$objPermiso=new permiso;
$objVariable=new variable_nomina;


$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

	foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
	} 

$resultado=$obj->filtrar($obj->cod_con_nom,$nom_con_nom="",$est_con_nom="",$opc_con_nom="");
$concepto_nomina=$obj->extraer_dato($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Concepto</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script src="../../js/concepto_nomina.js"></script>

</head>
<body>

<form action="../../../backend/controlador/concepto_nomina.php" method="POST">
<input type="hidden" name="accion" id="accion" value="procesar">
<div class="container">
	<div class="row justify-content-center">
	<div class="col-11  ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Concepto de Nómina</h3>
	 	 </div>
	  </div>

	<div class="row mt-1 bg-light">
  		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Código:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="cod_con_nom" id="cod_con_nom" required="required" 
		           value="<?php echo $concepto_nomina['cod_con_nom']?>" readonly class="form-control">
		</div>
    </div>


  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-9 col-12">
		    <input type="text" name="des_con_nom" id="des_con_nom" required="required" maxlength="80" class="form-control" placeholder="Nombre del Concepto de Nómina" pattern="[a-zA-Z0-9 ]+" title="Solo valores Alfa-Númericos" required 
		           value="<?php echo $concepto_nomina['des_con_nom']?>" >
		</div>

	  </div>

	  <div class="row mt-1 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">El concepto es:</label>
		</div>
	    <div class="col-md-9 col-12">
		<select name="opc_con_nom" id="opc_con_nom" class="form-control" required="">
			<option value="O" <?php echo $selected=($concepto_nomina["opc_con_nom"]=="O")?"selected":""; ?> >Obligatorio</option>
			<option value="P" <?php echo $selected=($concepto_nomina["opc_con_nom"]=="P")?"selected":""; ?>>Opcional</option>	
		</select>
		</div>
	   </div>



	  <div class="row mt-1 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Tipo de Concepto:</label>
		</div>
		<div class="col-md-9 col-12">
		    <select name="fky_tipo_concepto" id="fky_tipo_concepto" class="form-control" required="">
		    <option value="">Seleccione...</option>
		    <?php
		    $objTipoConcepto->asignar_valor("est_tip_con","A");
		    $pun_tip_con=$objTipoConcepto->listar();
		    while(($tipo_concepto=$objTipoConcepto->extraer_dato($pun_tip_con))>0)
		    {
		    	
		    	$selected=($tipo_concepto["cod_tip_con"]==$concepto_nomina["fky_tipo_concepto"])?"selected":"";

		    	echo "<option value='$tipo_concepto[cod_tip_con]' $selected>$tipo_concepto[nom_tip_con]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>


	  <div class="row mt-1 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-9 col-12">
		<select name="est_con_nom" id="est_con_nom" class="form-control" required="">
			<option value="A"  <?php echo $selected=($concepto_nomina["est_con_nom"]=="A")?"selected":""; ?>>Activa</option>
			<option value="I"  <?php echo $selected=($concepto_nomina["est_con_nom"]=="I")?"selected":""; ?>>Inactiva</option>	
		</select>
		</div>
	   </div>

	  <div class="row mt-1 bg-light">
	     <div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Fórmula Creada:</label>
		</div>
		    <div class="col-md-9 col-12" ml="0" mr="0">
	        	 <input type="text" class="form-control" name="for_con_nom" id="for_con_nom" 
	        	 value="<?php echo $concepto_nomina['for_con_nom']?>">
			</div>																								
	   </div>

	 	 <div class="row mt-1 bg-primary text-white text-center">

			<div class="col-md-12 col-12 align-self-center text-left">
			     <h4>Variables Disponibles:</h4>
			</div>	 				 
		</div>

	 	 <div class="row mt-1 bg-primary text-white text-center">
			<div class="col-md-3 col-12 align-self-center text-left">
		     	<label for="">Variable</label>
			</div>
			<div class="col-md-6 col-12 align-self-center text-center">
		     	<label for="">Descripción</label>
			</div>	
			<div class="col-md-3 col-12 align-self-center text-left">
		     	<label for="">Valor</label>
			</div>					 			
		</div>
		<?php
		$objVariable->asignar_valor("est_var_nom","A");
		$pun_var1=$objVariable->listar();
		while(($variable=$objVariable->extraer_dato($pun_var1))>0)
		{
			echo "<div class='row mt-1 bg-light'>
			<div class='col-md-3 col-12 align-self-center text-left'>
		        <a href='javascript:agregar_formula($variable[cod_var_nom],\"".$variable['nom_var_nom']."\")'>$variable[nom_var_nom]</a>
			</div>
			<div class='col-md-6 col-12 align-self-center text-left'>
		     	$variable[des_var_nom]
			</div>	
			<div class='col-md-3 col-12 align-self-center text-left'>
		     	$variable[val_var_nom]
			</div>
			</div>";

		}
	    ?>

	  </div>
	   <div class="row mt-2">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Concepto">
		</div>
	   </div>	

	   <input type="hidden" name="accion" id="accion" value="modificar">
  	  
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