<?php
require_once("utilidad.class.php");
class responsable extends utilidad
{

    public $cod_res; 
    public $nom_res; 
    public $tel_res; 
    public $ema_res;  
    public $are_res;  

//==============================================================================
   public function agregar(){

    	$sql="insert into responsable(
            nom_res,
            tel_res,
            ema_res,
            are_res)
    	   values
    	     (
            '$this->nom_res', 
            '$this->tel_res', 
            '$this->ema_res',  
            '$this->are_res' 
         );";

            
    	return $this->ejecutar($sql);
    	
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update responsable set 
            nom_res='$this->nom_res', 
            tel_res='$this->tel_res', 
            ema_res='$this->ema_res',  
            are_res='$this->are_res'             
      where 
            cod_res=$this->cod_res;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from responsable where est_res='$this->est_res';";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from responsable where cod_res=$this->cod_res;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update responsable set est_res='$this->est_res' where cod_res=$this->cod_res;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_res,$nom_res){
        
        $where="where 1=1";

        $filtro1 = ($cod_res!="") ? "and cod_res=$cod_res":"";
        $filtro2 = ($nom_res!="") ? "and nom_res=$nom_res":"";      
      

   		  $sql="select * from responsable $where $filtro1 $filtro2";
       
   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>