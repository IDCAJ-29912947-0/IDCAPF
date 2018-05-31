<?php
require("../../../backend/clase/cliente.class.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/banco.class.php");
require("../../../backend/clase/empleado.class.php");
require("../../../backend/clase/responsable_cliente.class.php");



$obj=new cliente;
$objBanco=new banco;
$objPermiso=new permiso;
$objEmpleado=new empleado;
$objCliRes=new responsable_cliente;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 	

$resultado=$obj->filtrar($obj->cod_cli,$rfc_cli="",$com_cli="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Cliente</title>
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

		<div class="col-md-4 col-12 align-self-center">
		     <label for="">Nombre Comercial:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="com_cli" id="com_cli" required="required" maxlength="80" class="form-control" placeholder="Nombre Comercial" onkeyup="return solo_letras();" value="<?php echo $datos['com_cli'] ?>">
		</div>

	  </div>

	  <div class="row mt-1 bg-light">

		<div class="col-md-4 col-12 align-self-center">
		     <label for="">RFC:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="rfc_cli" id="rfc_cli" required="required" maxlength="15" class="form-control" placeholder="RFC" onkeyup="return solo_numeros();" value="<?php echo $datos['rfc_cli'] ?>">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 align-self-center text-left">
		     <label for="">Banco:</label>
		</div>
		<div class="col-md-4 col-12">
		    <select name="fky_banco" id="fky_banco" class="form-control">
		    <option value="X">Seleccione...</option>
		    <?php
		    $objBanco->asignar_valor("est_ban","A");
		    $pun_ban=$objBanco->listar();
		    while(($banco=$objBanco->extraer_dato($pun_ban))>0)
		    {
		    	if($banco["cod_ban"]==$datos["fky_banco"])
                    $selected='selected';
                      else
                      	 $selected='';

 		    	echo "<option value='$banco[cod_ban]' $selected>$banco[nom_ban]</option>";
		    }	
		    ?>
		    </select>
		</div>

	  </div>


	   <div class="row mt-1 bg-light">

		<div class="col-md-4 col-12 align-self-center">
		     <label for="">Clabe Interbancaria:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="cue_cli" id="cue_cli" required="required" maxlength="20" class="form-control" placeholder="Clabe Interbancaria" value="<?php echo $datos['cue_cli'] ?>">
		</div>

	  </div> 

	   <div class="row mt-1 bg-light">

		<div class="col-md-4 col-12 align-self-center">
		     <label for="">Filiales:</label>
		</div>
		<div class="col-md-6 col-12">
		    <input type="text" name="fil_cli" id="fil_cli" required="required" maxlength="20" class="form-control" placeholder="Filiales"  value="<?php echo $datos['fil_cli'] ?>">
		</div>

	  </div> 	

	   <div class="row mt-1 bg-light">

		<div class="col-md-4 col-12 align-self-center">
		     <label for="">Crédito:</label>
		</div>
		<div class="col-md-4 col-12">
		    <input type="text" name="cre_cli" id="cre_cli" required="required" maxlength="10" class="form-control" placeholder="Credito" value="<?php echo $datos['cre_cli'] ?>">
		</div>

		<div class="col-md-4 col-12 align-self-center">
		    <span> Pesos</span>
		</div>

	  </div>

	   	   <div class="row mt-1 bg-light">

		<div class="col-md-4 col-12 align-self-center">
		     <label for="">Día de Pago:</label>
		</div>
		<div class="col-md-4 col-12">
		    <select name='pag_cli' id='pag_cli' class="form-control">
		    <?php
		    	for ($i=1; $i < 31 ; $i++) { 
                     
                     if($i==$datos['pag_cli'])
                     	 $selected='selected';
                     	   else
                     	   	 $selected='';

		    		echo "<option value='$i' $selected>$i</option>";
		    	}
		    ?>
		    </select>
		</div>

	  </div>

	   <div class="row mt-1 bg-light">

		<div class="col-md-4 col-12 align-self-center">
		     <label for="">Vencimiento del Pago:</label>
		</div>
		<div class="col-md-4 col-12">
		    <select name='ven_cli' id='ven_cli' class="form-control">
		    <?php
		    	for ($i=1; $i < 31 ; $i++) { 

		    		if($i==$datos['ven_cli'])
                     	 $selected='selected';
                     	   else
                     	   	 $selected='';

		    		echo "<option value='$i' $selected>$i</option>";
		    	}
		    ?>
		    </select>
		</div>

	  </div>

	   <div class="row mt-1 bg-light">

		<div class="col-md-4 col-12 align-self-center">
		     <label for="">Días de Crédito:</label>
		</div>
		<div class="col-md-4 col-12">
		    <select name='dia_cli' id='dia_cli' class="form-control">
		    <?php
		    	for ($i=0; $i < 366 ; $i++) { 
		    		if($datos["dia_cli"]==$i)
		    		echo "<option value='$i'>$i</option>";
		    	}
		    ?>
		    </select>
		</div>

	  </div>

	  	<div class="row mt-2 bg-light">
		<div class="col-md-4 col-12 align-self-center text-left">
		     <label for="">Ejecutivo Asociado:</label>
		</div>	 	
	 <div class="col-md-8 col-12">
			   <select name="fky_empleado" id="fky_empleado" class="form-control">
			   <option>Seleccione...</option>
			   <?php
			   $objEmpleado->est_emp="A";
			   $emp=$objEmpleado->listar();
			   while(($empleado=$obj->extraer_dato($emp))>0)
			   {				   		
                    $selected=($empleado['cod_emp']==$datos['fky_empleado'])?"selected":"";
			   		echo "<option value='$empleado[cod_emp]' $selected>$empleado[nom_emp] $empleado[ape_emp]</option>";
			   }
			   ?>
			   </select>
		  </div>
	</div>




	  <div class="row mt-1 bg-light">
	     <div class="col-md-4 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="est_cli" id="est_cli" class="form-control">
			<option value="A" selected="">Activo</option>
			<option value="I">Inactivo</option>	
		</select>
		</div>
	 </div>

<?php	

for($i=1;$i<6;$i++)
{
  $clase=($i>0)?"d-block":"d-none";

  $objCliRes->asignar_valor("fky_cliente",$obj->cod_cli);

  $pun_res=$objCliRes->filtrar($i-1);
  $responsable=$objCliRes->extraer_dato($pun_res);
  
     
?>
<div class="<?php echo $clase ?>" id="responsable<?php echo $i ?>">
	<div class="row mt-1 bg-light">
	  <div class="col-md-12 col-12 align-self-center">
	
			<div class="accordion mt-1 ml-0 mr-0" id="accordionExample">
			  <div class="card">
			    <div class="card-header" id="headingOne">
			      <h5 class="mb-0">
			        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $i ?>" aria-expanded="true" aria-controls="collapseOne">
			          <span class="text-primary">Persona Responsable <?php echo $i ?> </span>
			        </button>
	
			      </h5>
			    </div>
	
			    <div id="collapseOne<?php echo $i ?>" class="collapse hidden" aria-labelledby="headingOne" data-parent="#accordionExample">
			      <div class="card-body">

			      	  <input type="hidden" name="co<?php echo $i ?>_res" id="co<?php echo $i ?>_res" 
			      	  value="<?php echo $responsable['cod_res']; ?>">
					  <div class="row mt-1 bg-light">
	
							<div class="col-md-3 col-12 align-self-center">
							     <label for="">Nombre:</label>
							</div>
							<div class="col-md-6 col-12">
							    <input type="text" name="re<?php echo $i ?>_res" id="re<?php echo $i ?>_res"  maxlength="50" class="form-control" placeholder="Nombre del Responsable Principal" onkeyup="return solo_letras();" 
							    value="<?php echo "$responsable[nom_res]"; ?>">
							</div>
	
						  </div>
	
						  <div class="row mt-1 bg-light">
	
							<div class="col-md-3 col-12 align-self-center">
							     <label for="">Teléfono:</label>
							</div>
							<div class="col-md-4 col-12">
							    <input type="text" name="te<?php echo $i ?>_res" id="te<?php echo $i ?>_res"  maxlength="15" class="form-control" placeholder="Teléfono Responsable Principal" 
							    value="<?php echo "$responsable[tel_res]"; ?>">
							</div>
	
						  </div>
	
					 <div class="row mt-2 bg-light">
	
							<div class="col-md-3 col-12 align-self-center">
							     <label for="">Email:</label>
							</div>
							<div class="col-md-6 col-12">
							    <input type="text" name="em<?php echo $i ?>_res" id="em<?php echo $i ?>_res"  maxlength="80" class="form-control" placeholder="Email del Responsable Principal"
							    value="<?php echo "$responsable[ema_res]"; ?>">
							</div>
					</div>
	
					 <div class="row mt-2 bg-light">
	
							<div class="col-md-3 col-12 align-self-center">
							     <label for="">Área/Departamento:</label>
							</div>
							<div class="col-md-6 col-12">
							    <input type="text" name="ar<?php echo $i ?>_res" id="ar<?php echo $i ?>_res"  maxlength="80" class="form-control" placeholder="Área o Departamento"
							    value="<?php echo "$responsable[are_res]"; ?>">
							</div>
	
					</div>	
	
			      <div class="row mt-2 bg-light">
	
							<div class="col-md-12 col-12 align-self-center text-right">
							     <a href='javascript:agregar_responsable(<?php echo $i ?>)'>Agregar Otra Persona Resposable</a>
							</div>
						
	
					</div>						
	
			      </div>
			    </div>
			  </div>
			  
			</div>
	
		</div>
	</div>
</div>
<?php
 
}
?>	


	  <div class="row mt-1 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Cliente">
		</div>
	   </div>	 

	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="modificar">
	<input type="hidden" name="cod_cli" id="cod_cli" value="<?php echo $datos['cod_cli']; ?>">
	<script src="../../bootstrap-4.0/js/jquery-3.2.1.min.js"></script>
	<script src="../../bootstrap-4.0/js/popper-1.12.6.min.js"></script>
	<script src="../../bootstrap-4.0/js/bootstrap.min.js">	</script>			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>