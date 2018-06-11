<?php 
require_once ("utilidad.class.php");

class opcion extends utilidad
{
	public $cod_opc;
	public $nom_opc;
	public $fky_modulo;
	public $url_opc;
	public $est_opc;



	public function agregar()
	{
		$sql="insert into opcion(nom_opc,fky_modulo,url_opc,est_opc) values('$this->nom_opc',$this->fky_modulo,'$this->url_opc','$this->est_opc');";
		return $this->ejecutar($sql);
	}
	//==============================================================================

   public function listar(){
   		$sql="select * from opcion where cod_opc=$this->cod_opc;";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

 public function modificar(){
   		$sql="update opcion set 
              nom_opc='$this->nom_opc', 
              fky_modulo=$this->fky_modulo, 
              url_opc='$this->url_opc', 
              est_opc='$this->est_opc'
              where
              cod_opc=$this->cod_opc;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
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

   public function filtro($cod_opc,$nom_opc,$est_opc){
        
        $filtro1 = ($cod_opc!="") ? "and cod_opc=$cod_opc":"";
        $filtro2 = ($nom_opc!="") ? "and nom_opc like '%$nom_opc%'":"";
        $filtro3 = ($est_opc!="") ? "and est_opc='$est_opc'":"";

        $sql="select o.*,m.nom_mod
              from opcion o,modulo m
              where 
              o.fky_modulo=m.cod_mod  
              $filtro1 $filtro2 $filtro3;"; 

        return $this->ejecutar($sql);  
        echo $sql;

   }// Fin Filtrar
//==============================================================================

    public function filtrar($num_fil,$fil_ini)
  {
    $sql="select o.*,m.nom_mod from opcion o, modulo m where o.fky_modulo=m.cod_mod 
        order by m.nom_mod,o.nom_opc limit $fil_ini,$num_fil";
    return $this->ejecutar($sql);
  }

}//Fin de la Clase
?>