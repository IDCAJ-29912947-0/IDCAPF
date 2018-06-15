<?php 
require_once ("utilidad.class.php");

class servicio extends utilidad
{
	public $cod_ser;
	public $nom_ser;
	public $fky_tipo_servicio;
	public $pre_ser;
	public $est_ser;



	public function agregar()
	{
		$sql="insert into servicio(nom_ser,pre_ser,fky_tipo_servicio,est_ser) values('$this->nom_ser','$this->pre_ser',$this->fky_tipo_servicio,'$this->est_ser');";
		return $this->ejecutar($sql);
	}
	//==============================================================================

   public function listar(){
   		$sql="select * from servicio where est_ser='$this->est_ser';";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

 public function modificar(){
   		$sql="update servicio set 
              nom_ser='$this->nom_ser', 
              pre_ser='$this->pre_ser', 
              fky_tipo_servicio=$this->fky_tipo_servicio, 
              est_ser='$this->est_ser'
              where
              cod_ser=$this->cod_ser;";
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

   public function filtrar($cod_ser,$nom_ser,$est_ser){
        
        $filtro1 = ($cod_ser!="") ? "and cod_ser=$cod_ser":"";
        $filtro2 = ($nom_ser!="") ? "and nom_ser like '%$nom_ser%'":"";
        $filtro3 = ($est_ser!="") ? "and est_ser='$est_ser'":"";

        $sql="select s.*,ts.nom_tip_ser
              from servicio s,tipo_servicio ts
              where 
              s.fky_tipo_servicio=ts.cod_tip_ser  
              $filtro1 $filtro2 $filtro3;";

        return $this->ejecutar($sql);  

   }// Fin Filtrar

}
?>