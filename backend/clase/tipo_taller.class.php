<?php
require_once("utilidad.class.php");

class tipo_taller extends utilidad
{
   public $cod_tip_tal;
   public $nom_tip_tal;
   public $est_tip_tal;

//==============================================================================
   public function agregar(){

    	$sql="insert into tipo_taller(nom_tip_tal,est_tip_tal)values('$this->nom_tip_tal','$this->est_tip_tal');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
      $sql="update tipo_taller set nom_tip_tal='$this->nom_tip_tal',est_tip_tal='$this->est_tip_tal' where cod_tip_tal='$this->cod_tip_tal';";
   	return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from tipo_taller where est_tip_tal='$this->est_tip_tal' order by nom_tip_tal asc;";
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

   public function filtrar($cod_tip_tal,$nom_tip_tal,$est_tip_tal){

        $where="where 1=1";
        
        $filtro1 = ($cod_tip_tal!="") ? "and cod_tip_tal=$cod_tip_tal":"";
        $filtro2 = ($nom_tip_tal!="") ? "and nom_tip_tal like '%$nom_tip_tal%'":"";
        $filtro3 = ($est_tip_tal!="") ? "and est_tip_tal='$est_tip_tal'":"";

        $sql="select * from tipo_taller $where $filtro1 $filtro2 $filtro3 order by nom_tip_tal asc;"; 
        return $this->ejecutar($sql);  


   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>
