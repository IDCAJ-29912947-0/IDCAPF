<?php
	require("../../../backend/clase/permiso.class.php");
	require("../../../backend/clase/nomina.class.php");
	require("../../../backend/clase/empleado.class.php");
	require("../../../backend/clase/pago_nomina.class.php");
	require("../../../backend/clase/concepto_nomina.class.php");

	$objPermiso=new permiso;
	$objNomina=new nomina;
	$objPago=new pago_nomina;
	$objEmpleado=new empleado;
	$objConcepto=new concepto_nomina;

	$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
	$acceso=$objPermiso->extraer_dato($permiso);

	if($acceso["est_per"]=="A")
	{

	foreach($_REQUEST as $nombre_campo => $valor){
	  	 $objPermiso->asignar_valor($nombre_campo,$valor);
	} 

		$pun_nom=$objNomina->filtrar($_REQUEST["cod_nom"],$des_nom="",$est_nom="");
		$nomina=$objNomina->extraer_dato($pun_nom);

		$pun_emp=$objEmpleado->filtrar($_REQUEST["cod_emp"],$dni_emp="",$nom_emp="",$ape_emp="");
		$empleado=$objEmpleado->extraer_dato($pun_emp);
		$salario=$objEmpleado->formatear_numero($empleado["sal_emp"],2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Nómina</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
	<script src="../../js/nomina.js"></script>
</head>
<body>
<div class="container-fluid">
  <div class="row justify-content-center align-items-center">
	<div class="col-12 ">


	 <div class="row bg-primary text-white align-items-center">
			 	 <div class="col-12 text-center">
			  			<h5>Datos de la Nómina</h5>
			 	 </div>
	 </div>

	  <div class="row  bg-light align-items-center">

				<div class="col-md-3 col-12 text-left border border-gray">
				     <b>Nombre:</b>
				</div>
				<div class="col-md-9 col-12 border border-gray">
				    <?php echo $nomina['des_nom']; ?>
				</div>

	  </div> 

	  <div class="row  bg-light align-items-center">

				<div class="col-md-3 col-12 text-left border border-gray">
				     <b>Fecha de Inicio:</b>
				</div>
				<div class="col-md-9 col-12 border border-gray">
				   <?php echo $objEmpleado->voltear_fecha($nomina['ini_nom']); ?>
				</div>

	  </div>

	  <div class="row  bg-light align-items-center">

				<div class="col-md-3 col-12 text-left border border-gray">
				     <b>Fecha de Finalización:</b>
				</div>
				<div class="col-md-9 col-12 border border-gray">
				    <?php echo $objEmpleado->voltear_fecha($nomina['fin_nom']); ?>
				</div>

	  </div>



	  <div class="row  bg-light align-items-center">
				<div class="col-md-3 col-12 text-left border border-gray">
				     <b>Nombres:</b>
				</div>
				<div class="col-md-3 col-12 border border-gray">
				    <?php echo  $empleado["nom_emp"];?>
				</div>
				<div class="col-md-3 col-12 text-left border border-gray">
				     <b>Apellidos:</b>
				</div>
				<div class="col-md-3 col-12 border border-gray">
				    <?php echo  $empleado["ape_emp"] ?>
				</div>
	  </div> 	  

	  <div class="row  bg-light align-items-center">
				<div class="col-md-3 col-12 text-left border border-gray">
				     <b>Identificación:</b>
				</div>
				<div class="col-md-3 col-12 border border-gray">
				    <?php echo  $empleado["dni_emp"];?>
				</div>
				<div class="col-md-3 col-12 text-left border border-gray">
				     <b>Salario Mensual:</b>
				</div>
				<div class="col-md-3 col-12 border border-gray">
				    <?php echo  $objEmpleado->formatear_numero($empleado["sal_emp"],2) ?>
				</div>
	  </div> 

      <div class="row bg-primary text-white align-items-center">
				<div class="col-md-6 col-12 text-center border border-gray">
				     <b>Descripción</b>
				</div>

				<div class="col-md-3 col-12 text-center border border-gray">
				     <b>Asignación</b>
				</div>
				<div class="col-md-3 col-12 text-center border border-gray">
				     <b>Deducción</b>
				</div>
	   </div>							

     <?php
		$pun_pag=$objPago->filtrar($cod_pag_nom="",$_REQUEST["cod_nom"],$_REQUEST["cod_emp"],$fky_concepto_nomina="",$est_con_nom="",$signo="+");

		$acu_asi=0;
		while(($pago=$objPago->extraer_dato($pun_pag))>0)
		{

			    echo "
				<div class='row  bg-light align-items-center'>
				    <div class='col-md-6 col-12 text-left border border-gray'>
<<<<<<< HEAD
			 		     ($pago[can_pag_nom]) - $pago[des_con_nom]
=======
			 		     $pago[des_con_nom]
>>>>>>> 7c574f57cb41a9a1b61d8657d9fa45d011f507ec
					</div>

					<div class='col-md-3 col-12 text-center border border-gray'>
					     ".$objPago->formatear_numero($pago["mon_pag_nom"],2)."
					</div>
					<div class='col-md-3 col-12 text-center border border-gray'>
					    &nbsp;
					</div>
				</div>";	
		}

		$pun_pag=$objPago->filtrar($cod_pag_nom="",$_REQUEST["cod_nom"],$_REQUEST["cod_emp"],$fky_concepto_nomina="",$est_con_nom="",$signo="-");

		$acu_asi=0;
		while(($pago=$objPago->extraer_dato($pun_pag))>0)
		{

			    echo "
				<div class='row  bg-light align-items-center'>
				    <div class='col-md-6 col-12 text-left border border-gray'>
<<<<<<< HEAD
			 		      ($pago[can_pag_nom]) - $pago[des_con_nom]
=======
			 		     $pago[des_con_nom]
>>>>>>> 7c574f57cb41a9a1b61d8657d9fa45d011f507ec
					</div>

					<div class='col-md-3 col-12 text-center border border-gray'>
					    &nbsp;
					</div>

					<div class='col-md-3 col-12 text-center border border-gray'>
					     ".$objPago->formatear_numero($pago["mon_pag_nom"],2)."
					</div>

				</div>";	
		}
?>

<<<<<<< HEAD
<!-- class="row bg-light align-items-center" -->
	  <div id="zona_dinamica" class="row bg-light align-items-center">
=======
	  <div class="row bg-light align-items-center" id="zona_dinamica">
>>>>>>> 7c574f57cb41a9a1b61d8657d9fa45d011f507ec
			 									
	  </div>	

	  <div class="row mt-5 bg-primary text-white align-items-center">
			 	 <div class="col-12 text-center">
			  			<h5>Conceptos Disponibles para Añadir</h5>
			 	 </div>
	  </div>
	  	<div class="row  bg-primary text-white align-items-center">
			 		<div class='col-md-6 col-12 text-center border border-gray'>
			 			Descripción
					</div>
			 		<div class='col-md-4 col-12 text-center border border-gray'>
			 			Valor Unitario
					</div>
			 		<div class='col-md-2 col-12 text-center border border-gray'>
			 			Acción
					</div>										
	  </div>

	 

<?php		
		$pun_con=$objConcepto->filtrar($cod_con_nom="",$des_con_nom="",$est_con_nom="A",$opc_con_nom="P");	
		while(($concepto_nomina=$objConcepto->extraer_dato($pun_con))>0)
		{
				  echo "<div class='row  bg-light align-items-center'>
							<div class='col-md-6 col-12 text-left border border-gray'>
<<<<<<< HEAD
							  $concepto_nomina[des_con_nom]  
=======
							   $concepto_nomina[des_con_nom]  
>>>>>>> 7c574f57cb41a9a1b61d8657d9fa45d011f507ec
							</div>
							<div class='col-md-4 col-12 border border-gray'>
							    $concepto_nomina[for_con_nom]  
							</div>
							<div class='col-md-2 col-12 border border-gray'>
							   <a href='javascript:asignar_detalle(".$_REQUEST["cod_nom"].",".$_REQUEST["cod_emp"].",$concepto_nomina[cod_con_nom])'>Asignar</a> / <a href='javascript:quitar_detalle()'>Quitar</a>
							</div>
		 			 </div>";
		}



     ?>



    </div>
  </div>
</div>
</body>
</html>

<?php
	}else{
	 $objPermiso->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
	}
?>