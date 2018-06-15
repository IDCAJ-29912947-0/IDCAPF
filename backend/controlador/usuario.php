<?php

require("../clase/permiso.class.php");
require("../clase/usuario.class.php");

$obj=new usuario;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
<<<<<<< HEAD
	$obj_usu->asignar_valor($campo,$valor);
}
$obj_usu->asignar_valor("cla_usu",md5($_REQUEST['cla_usu']));
$obj_usu->asignar_valor("reg_usu",date("Y-m-d H:i:s"));
$obj_aud->asignar_valor("fec_aud",date("Y-m-d H:i:s"));
$obj_aud->asignar_valor("ip_aud","127.0.0.1");
$obj_aud->asignar_valor("fky_usuario",1);
switch ($accion) {
	case 'agregar':
		$res=$obj_usu->agregar();
		if ($res==true) 
		{
			$obj_usu->mensaje("success","Usuario agregado correctamente.","agregar");
			$id=$obj_usu->ultimo_id();
			if ($id>0) 
=======
	$obj->asignar_valor("tab_aud","usuario"); //Para Auditoria
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
				$obj->mensaje("success","Usuario agregado correctamente.");
			}else
>>>>>>> 7c574f57cb41a9a1b61d8657d9fa45d011f507ec
			{
				$obj->mensaje("danger","Error al agregar Usuario.");
			}
<<<<<<< HEAD
		} else 
		{
			$obj_usu->mensaje("danger","Error al agregar el Usuario.","agregar");
		}
		
		break;
	
	case 'modificar':
		$obj_usu->cod_usu=$_POST["cod_usu"];
		$obj_usu->modificar();
		$fil_afe=$obj_usu->filas_afectadas();
		if ($fil_afe>0) 
		{
			$obj_usu->mensaje("success","Usuario modificado correctamente.","modificar");
			$id=$obj_usu->ultimo_id();
		} else {
			$obj_usu->mensaje("danger","No se modific&oacute; ning&uacute;n registro.","modificar");
		}
		
		break;
	case 'eliminar':
		$obj_usu->cod_usu=$_POST["cod_usu"];
		$obj_usu->eliminar();
		$fil_afe->$obj_usu->filas_afectadas();
		if ($fil_afe>0) 
		{
			$obj_usu->mensaje("success","Usuario eliminado correctamente.","eliminar");
			$id=$obj_usu->ultimo_id();
		} else {
			$obj_usu->mensaje("danger","Error al borrar Usuario.","eliminar");
		}
		
		break;
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina.");
=======
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_usu);
				$obj->mensaje("success","Usuario modificado correctamente.");
			}else{
				$obj->mensaje("danger","No se modific&oacute; ning&uacute;n registro.");
			}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_usu);
			  	$obj->mensaje("success","Usuario eliminado correctamente.");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Usuario.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_usu);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente.");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Usuario.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
>>>>>>> 7c574f57cb41a9a1b61d8657d9fa45d011f507ec
}


?>