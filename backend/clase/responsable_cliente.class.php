<?php
//==============================================================================
//===   cliente_responsable: Tabla asociativa que enlaza a los responsables con sus clientes..                         
//==============================================================================
require_once("utilidad.class.php");

class responsable_cliente extends utilidad
{

  public $fky_cliente;
  public $fky_responsable;

  public function agregar()
  {
  	$sql="insert into responsable_cliente
  	     		(fky_cliente,
  		  		 fky_responsable)
  		  values($this->fky_cliente,
  		         $this->fky_responsable);";

    	return $this->ejecutar($sql);
  }

  public function filtrar($i)
  {
  	$sql="select r.* from  
  	      responsable r,responsable_cliente rc 
  	      where 
  	      r.cod_res=rc.fky_responsable and
  	      fky_cliente='$this->fky_cliente'
  	      LIMIT $i,1";

  	   return $this->ejecutar($sql);   

  }

  public function eliminar(){
   		$sql="delete from responsable_cliente where fky_cliente=$this->fky_cliente;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar 

}
?>