<?php
require("../clase/permiso.class.php");
require("../clase/modulo.class.php");

$obj=new modulo;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
<<<<<<< HEAD
	case 'agregar':
		$res=$obj_mod->agregar();
		if ($res==true) 
		{
			$obj_mod->mensaje("success","M&oacute;dulo agregado correctamente.","agregar");
			$id=$obj_mod->ultimo_id();
			if ($id>0) //Guardamos en Auditoria
			{
				$obj_aud->asignar_valor("fky_opcion",1);
				$obj_aud->asignar_valor("sql_aud","insert");
				$obj_aud->asignar_valor("id_aud",$id);
				$obj_aud->agregar();
			}
		}
		else
			{
				$obj_mod->mensaje("danger","Error al agregar M&oacute;dulo.","agregar");
=======
	$obj->asignar_valor("tab_aud","modulo"); //Para Auditoria
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
				$obj->mensaje("success","M&oacute;dulo agregado correctamente.");
			}else
			{
				$obj->mensaje("danger","Error al agregar M&oacute;dulo.");
>>>>>>> 7c574f57cb41a9a1b61d8657d9fa45d011f507ec
			}
			
		break;

<<<<<<< HEAD
	case 'modificar':
		$obj_mod->cod_mod=$_POST["cod_mod"];
		$obj_mod->modificar();
		$fil_afe=$obj_mod->filas_afectadas();
		if ($fil_afe>0) {
			$obj_mod->mensaje("success","M&oacute;dulo modificado correctamente.","modificar");
			$id=$obj_mod->ultimo_id();
		} else {
			$obj_mod->mensaje("danger","No se modific&oacute; ning&uacute;n registro.","modificar");
		}
		
		break;
	case 'eliminar':
		$obj_mod->cod_mod=$_POST["cod_mod"];
		$obj_mod->eliminar();
		$fil_afe=$obj_mod->filas_afectadas();
		if ($fil_afe>0) {
			$obj_mod->mensaje("success","M&oacute;dulo eliminado correctamente.","eliminar");
			$id=$obj_mod->ultimo_id();
		} else {
			$obj_mod->mensaje("danger","Error al borrar M&oacute;dulo","eliminar");
		}
		
		break;
=======
		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_mod);
				$obj->mensaje("success","M&oacute;dulo modificado correctamente.");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute;n registro.");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_mod);
			  	$obj->mensaje("success","M&oacute;dulo eliminado correctamente.");
			  }else{
			  	$obj->mensaje("danger","Error al borrar M&oacute;dulo.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_mod);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente.");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del M&oacute;dulo.");
			  }
			 
		break;
	
	}

>>>>>>> 7c574f57cb41a9a1b61d8657d9fa45d011f507ec
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina.");
}

<<<<<<< HEAD
 ?>
=======

?>
>>>>>>> 7c574f57cb41a9a1b61d8657d9fa45d011f507ec
