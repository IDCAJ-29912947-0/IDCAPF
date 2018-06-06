<?php
require_once("utilidad.class.php");

class tipo_concepto extends utilidad
{
  public $cod_tip_con;
  public $nom_tip_con;
  public $sig_tip_con;
  public $est_tip_con;

//==============================================================================
   public function agregar(){

    	$sql="insert into tipo_concepto(
            nom_tip_con,
            sig_tip_con,
            est_tip_con)
            values(
            '$this->nom_tip_con',
            '$this->sig_tip_con',            
            '$this->est_tip_con'
            );";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update tipo_concepto 
               set 
               nom_tip_con='$this->nom_tip_con',
               sig_tip_con='$this->sig_tip_con',
               est_tip_con='$this->est_tip_con'
               where 
               cod_tip_con=$this->cod_tip_con;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from tipo_concepto where est_tip_con='$this->est_tip_con';";
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

   public function filtrar($cod_tip_con,$nom_tip_con,$est_tip_con){
        
        $where="where 1=1";
        
        $filtro1 = ($cod_tip_con!="") ? "and cod_tip_con=$cod_tip_con":"";
        $filtro2 = ($nom_tip_con!="") ? "and nom_tip_con like '%$nom_tip_con%'":"";
        $filtro3 = ($est_tip_con!="") ? "and est_tip_con='$est_tip_con'":"";

        $sql="select * from tipo_concepto $where $filtro1 $filtro2 $filtro3;";

        return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>