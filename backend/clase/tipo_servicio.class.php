<?php
require_once("utilidad.class.php");

class tipo_servicio extends utilidad
{
   public $cod_tip_ser;
   public $nom_tip_ser;
   public $est_tip_ser;

//==============================================================================
   public function agregar(){

    	$sql="insert into tipo_servicio(nom_tip_ser,est_tip_ser)values('$this->nom_tip_ser','$this->est_tip_ser');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
      $sql="update tipo_servicio set nom_tip_ser='$this->nom_tip_ser',est_tip_ser='$this->est_tip_ser' where cod_tip_ser='$this->cod_tip_ser';";
   	return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from tipo_servicio where est_tip_ser='$this->est_tip_ser' order by nom_tip_ser asc;";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from ______ where ;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update _________ set where ;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_tip_ser,$nom_tip_ser,$est_tip_ser){

        $where="where 1=1";
        
        $filtro1 = ($cod_tip_ser!="") ? "and cod_tip_ser=$cod_tip_ser":"";
        $filtro2 = ($nom_tip_ser!="") ? "and nom_tip_ser like '%$nom_tip_ser%'":"";
        $filtro3 = ($est_tip_ser!="") ? "and est_tip_ser='$est_tip_ser'":"";

        $sql="select * from tipo_servicio $where $filtro1 $filtro2 $filtro3 order by nom_tip_ser asc;"; 
        return $this->ejecutar($sql);  


   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>
