<?php

require("../clase/permiso.class.php");
require("../clase/nomina.class.php");
require("../clase/pago_nomina.class.php");

$obj=new nomina;
$objPermiso=new permiso;
$objPago=new pago_nomina;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","nomina"); //Para Auditoria
	$obj->asignar_valor("fky_usuario","1"); //Para Auditoria
	$obj->asignar_valor("acc_aud",$_REQUEST["accion"]); //Para Auditoria

//Recibimos todas las variables enviadas por el método POST o GET
	foreach($_REQUEST as $nombre_campo => $valor){
  		 $obj->asignar_valor($nombre_campo,$valor);
	} 

	switch ($_REQUEST["accion"]) {

		case 'agregar':
			$obj->asignar_valor("est_nom","A");		    
			$res=$obj->agregar();
			$prk_aud=$obj->ultimo_id_insertado();
			if($prk_aud>0){
				$obj->auditoria($prk_aud);
				$obj->mensaje("success","Nómina agregada correctamente");

			}else
			{
				$obj->mensaje("danger","Error al agregar la nómina");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_nom);
				$obj->mensaje("success","Nómina modificada correctamente");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute; registro");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_nom);
			  	$obj->mensaje("success","Nómina eliminada correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar nómina.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_nom);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del nomina.");
			  }
			 
		break;

		case 'procesar':
			  $num_aff=$obj->procesar();
			  if($num_aff>0){
			  	$obj->asignar_valor("est_nom","G");
			  	$res=$obj->cambio_estatus();
			  	$obj->mensaje("success","Nómina Generada correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al procesar nómina.");
			  }
		break;

		case 'agregar_detalle_nomina': 

		      $obj->agregar_detalle_nomina($_GET["nomina"],$_GET["empleado"],$_GET["concepto"],$_GET["valor"]);
		      $prk_aud=$obj->ultimo_id_insertado();
			 	if($prk_aud>0){
					$obj->auditoria($prk_aud);
					$pun_pag=$objPago->filtrar($prk_aud,"","","","","");
					$pago=$objPago->extraer_dato($pun_pag);
					echo $pago["mon_pag_nom"]."#".$pago["des_con_nom"]."#".$pago["sig_tip_con"];
				 }else
				 {
					echo false;
				 }
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>