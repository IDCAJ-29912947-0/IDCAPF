<?php

require("../clase/permiso.class.php");
require("../clase/cliente.class.php");
require("../clase/responsable.class.php");
require("../clase/responsable_cliente.class.php");

$obj=new cliente;
$objPermiso=new permiso;
$objResponsable=new responsable;
$objCliRes=new responsable_cliente;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{
	$obj->asignar_valor("tab_aud","cliente"); //Para Auditoria
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
				$obj->mensaje("success","Cliente agregado correctamente");
					for ($i=1; $i <6 ; $i++) 
					{ 
						
 							 
 							    if($_REQUEST["re".$i."_res"]!="")
 							    {
 								
		 							 try{
			 								$objResponsable->asignar_valor("nom_res",$_REQUEST["re".$i."_res"]);
											$objResponsable->asignar_valor("tel_res",$_REQUEST["te".$i."_res"]);
											$objResponsable->asignar_valor("ema_res",$_REQUEST["em".$i."_res"]);
											$objResponsable->asignar_valor("are_res",$_REQUEST["ar".$i."_res"]);
			  		 						$objResponsable->agregar();  

		  		 							$prk_aud2=$objResponsable->ultimo_id_insertado();
											if($prk_aud2>0)
											{
												$objResponsable->auditoria($prk_aud2);
												$objCliRes->asignar_valor("fky_cliente",$prk_aud);
												$objCliRes->asignar_valor("fky_responsable",$prk_aud2);
												$objCliRes->agregar();
			  		 					 	}		

										} catch (Exception $e) 
										{
		    							echo "Excepcion en $i";
										}
								
								}
						
					}
				}else
				{
					$obj->mensaje("danger","Error al agregar Cliente");
				}
			
		break;

		case 'modificar':    
			$res=$obj->modificar();
			$num_aff=$obj->filas_afectadas();
			if($num_aff>0){
				$obj->auditoria($obj->cod_cli);
				$obj->mensaje("success","Cliente modificado correctamente");
			}else{
				$obj->mensaje("danger","No se modificó ningun dato del cliente.");
			}

			    $objCliRes->asignar_valor("fky_cliente",$obj->cod_cli);
				$objCliRes->eliminar();
				for ($i=1; $i <6 ; $i++) 
					{ 						
 							if($_REQUEST["re".$i."_res"]!="")
 							{     
 								 try{
		 							 	    $objResponsable->asignar_valor("cod_res",$_REQUEST["co".$i."_res"]);
			 								$objResponsable->asignar_valor("nom_res",$_REQUEST["re".$i."_res"]);
											$objResponsable->asignar_valor("tel_res",$_REQUEST["te".$i."_res"]);
											$objResponsable->asignar_valor("ema_res",$_REQUEST["em".$i."_res"]);
											$objResponsable->asignar_valor("are_res",$_REQUEST["ar".$i."_res"]);
			  		 						$objResponsable->agregar();  
											$objCliRes->asignar_valor("fky_cliente",$obj->cod_cli);
		  		 					
		  		 							$prk_aud2=$objResponsable->ultimo_id_insertado();
											if($prk_aud2>0)
											{
												$objResponsable->auditoria($prk_aud2);											
												$objCliRes->asignar_valor("fky_responsable",$prk_aud2);
												$res_cli=$objCliRes->agregar();
												$num_aff2=$objCliRes->filas_afectadas();
												if($num_aff2>0){
													$obj->mensaje("success","Responsables modificados correctamente");
												}
			  		 					 	}else
			  		 					 	{
												$objResponsable->auditoria($objResponsable->cod_res);
												$objCliRes->asignar_valor("fky_responsable",$objResponsable->cod_res);
												$res_cli=$objCliRes->agregar();
												$num_aff2=$objCliRes->filas_afectadas();
												if($num_aff2>0){
													$obj->mensaje("success","Responsables modificados correctamente");
												}

			  		 					 	}



									} catch (Exception $e) 
									{
		    								echo "Excepcion en $i";
									}							
							}						
					}
			
		break;

		case 'eliminar':    
			  $res=$obj->eliminar();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_cli);
			  	$obj->mensaje("success","Cliente eliminado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al borrar Cliente.");
			  }
		break;

		case 'cambio_estatus': 
			  $res=$obj->cambio_estatus();
			  $num_aff=$obj->filas_afectadas();
			  if($num_aff>0){
			  	$obj->auditoria($obj->cod_cli);
			  	$obj->mensaje("success","Cambio de estatus realizado correctamente");
			  }else{
			  	$obj->mensaje("danger","Error al cambiar el estatus del Cliente.");
			  }
			 
		break;
	
	}

}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}


?>