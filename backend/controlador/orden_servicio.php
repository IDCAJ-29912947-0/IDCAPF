<?php

require("../clase/permiso.class.php");
require("../clase/orden_servicio.class.php");

$obj=new orden_servicio;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","orden_servicio"); //Para Auditoria
	$obj->asignar_valor("fky_usuario","1"); //Para Auditoria
	$obj->asignar_valor("acc_aud",$_REQUEST["accion"]); //Para Auditoria

//Recibimos todas las variables enviadas por el método POST o GET
	foreach($_REQUEST as $nombre_campo => $valor){
  		 $obj->asignar_valor($nombre_campo,$valor);
	} 

	switch ($_REQUEST["accion"]) {

		case 'agregar':    
			$res=$obj->agregar();
			$prk_aud=$obj->ultimo_id_insertado();
			if($prk_aud>0){
				$obj->auditoria($prk_aud);
				$obj->mensaje("success","Orden de Servicio agregada correctamente.");
			}else
			{
				$obj->mensaje("danger","Error al agregar orden_servicio.");
			}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_ord);
				$obj->mensaje("success","Orden de Servicio modificada correctamente.");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute;n registro.");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_ord);
			  	$obj->mensaje("success","Orden de Servicio eliminada correctamente.");
			  }else{
			  	$obj->mensaje("danger","Error al borrar orden_servicio.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_ord);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente.");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del orden_servicio.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina.");
}


?>