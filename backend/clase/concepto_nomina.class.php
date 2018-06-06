<?php

require_once("utilidad.class.php"); 

class concepto_nomina extends utilidad
{
    public  $cod_con_nom;  
    public  $des_con_nom;  
    public  $opc_con_nom;  
    public  $fky_tipo_concepto;  
    public  $for_con_nom;
    public  $est_con_nom;  


//==============================================================================
   public function agregar(){

    	$sql="insert into concepto_nomina(
            des_con_nom, 
            opc_con_nom,
            fky_tipo_concepto,
            for_con_nom,
            est_con_nom)
            values(
            '$this->des_con_nom', 
            '$this->opc_con_nom', 
             $this->fky_tipo_concepto, 
            '$this->for_con_nom', 
            '$this->est_con_nom'               
            );";

    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update concepto_nomina set 
                  des_con_nom='$this->des_con_nom', 
                  opc_con_nom='$this->opc_con_nom', 
                  fky_tipo_concepto=$this->fky_tipo_concepto, 
                  for_con_nom='$this->for_con_nom',
                  est_con_nom='$this->est_con_nom'  
              where
                  cod_con_nom=$this->cod_con_nom;";

                  
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from concepto_nomina where cod_con_nom=$this->cod_con_nom;";
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

   public function filtrar($cod_con_nom,$des_con_nom,$est_con_nom){
        
        $filtro1 = ($cod_con_nom!="") ? "and cod_con_nom=$cod_con_nom":"";
        $filtro2 = ($des_con_nom!="") ? "and des_con_nom like '%$des_con_nom%'":"";
        $filtro3 = ($est_con_nom!="") ? "and est_con_nom='$est_con_nom'":"";

        $sql="select cn.*,tc.nom_tip_con
              from concepto_nomina cn, tipo_concepto tc
              where 
              fky_tipo_concepto=cod_tip_con
              $filtro1 $filtro2 $filtro3;"; 

        return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>


     
