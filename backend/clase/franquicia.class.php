<?php
require_once("utilidad.class.php");

class franquicia extends utilidad
{
   public $cod_fra;
   public $nom_fra;
   public $est_fra;

//==============================================================================
   public function agregar(){

    	$sql="insert into franquicia(nom_fra,est_fra)values('$this->nom_fra','$this->est_fra');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
      $sql="update franquicia set nom_fra='$this->nom_fra',est_fra='$this->est_fra' where cod_fra='$this->cod_fra';";
   	return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from franquicia where est_fra='$this->est_fra' order by nom_fra asc;";
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

   public function filtrar($cod_fra,$nom_fra,$est_fra){

        $where="where 1=1";
        
        $filtro1 = ($cod_fra!="") ? "and cod_fra=$cod_fra":"";
        $filtro2 = ($nom_fra!="") ? "and nom_fra like '%$nom_fra%'":"";
        $filtro3 = ($est_fra!="") ? "and est_fra='$est_fra'":"";

        $sql="select * from franquicia $where $filtro1 $filtro2 $filtro3 order by nom_fra asc;"; 
        return $this->ejecutar($sql);  


   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>
