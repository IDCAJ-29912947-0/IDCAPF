<?php
require_once("utilidad.class.php");

class variable_nomina extends utilidad
{
   public $cod_var_nom;
   public $nom_var_nom;
   public $des_var_nom; 
   public $val_var_nom;  
   public $est_var_nom;

//==============================================================================
   public function agregar(){

    	$sql="insert into variable_nomina(nom_var_nom,des_var_nom,val_var_nom,est_var_nom)values('$this->nom_var_nom','$this->des_var_nom',$this->val_var_nom,'$this->est_var_nom');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
      $sql="update variable_nomina 
            set 
              nom_var_nom='$this->nom_var_nom',
              des_var_nom='$this->des_var_nom',
              est_var_nom='$this->est_var_nom',
              val_var_nom=$this->val_var_nom
            where 
            cod_var_nom='$this->cod_var_nom';";
   	return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from variable_nomina where est_var_nom='$this->est_var_nom' order by nom_var_nom asc;";
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

   public function filtrar($cod_var_nom,$nom_var_nom,$est_var_nom){

        $where="where 1=1";
        
        $filtro1 = ($cod_var_nom!="") ? "and cod_var_nom=$cod_var_nom":"";
        $filtro2 = ($nom_var_nom!="") ? "and nom_var_nom like '%$nom_var_nom%'":"";
        $filtro3 = ($est_var_nom!="") ? "and est_var_nom='$est_var_nom'":"";

        $sql="select * from variable_nomina $where $filtro1 $filtro2 $filtro3 order by nom_var_nom asc;"; 
        return $this->ejecutar($sql);  


   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>
