<?php
require_once("utilidad.class.php");
class vehiculo extends utilidad
{
	public $cod_veh;
	public $pla_veh;
	public $ser_veh;
	public $ano_veh;
	public $kms_veh; 
	public $fol_ser; 
	public $num_veh; 
	public $con_veh;
	public $est_veh; 
  public $fky_cliente;
  public $fky_modelo;

//==============================================================================
   public function agregar(){

    	$sql="insert into vehiculo(
            pla_veh, 
            ser_veh, 
            ano_veh, 
            kms_veh, 
            fol_ser, 
            num_veh, 
            con_veh,
            fky_modelo,
            fky_cliente,
            est_veh)
    	   values
    	     ('$this->pla_veh',
            '$this->ser_veh', 
            $this->ano_veh, 
            $this->kms_veh, 
            '$this->fol_ser', 
            '$this->num_veh', 
            '$this->con_veh', 
            $this->fky_modelo, 
            $this->fky_cliente,                     
            '$this->est_veh');";

           
    	return $this->ejecutar($sql);
    	
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update vehiculo set 
      pla_veh='$this->pla_veh', 
      ser_veh='$this->ser_veh', 
      ano_veh='$this->ano_veh', 
      kms_veh='$this->kms_veh', 
      fol_ser='$this->fol_ser', 
      num_veh=$this->num_veh, 
      con_veh='$this->con_veh', 
      fky_modelo=$this->fky_modelo,
      fky_cliente=$this->fky_cliente,
      est_veh='$this->est_veh'      
      where 
      cod_veh=$this->cod_veh;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from vehiculo where est_veh='$this->est_veh';";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from vehiculo where cod_veh=$this->cod_veh;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update vehiculo set est_veh='$this->est_veh' where cod_veh=$this->cod_veh;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_veh,$pla_veh,$ser_veh,$fol_ser,$fky_modelo){
        
        $where="where 1=1";

        $filtro1 = ($cod_veh!="") ? "and cod_veh=$cod_veh":"";
        $filtro2 = ($pla_veh!="") ? "and pla_veh='$pla_veh'":"";
        $filtro3 = ($ser_veh!="") ? "and ser_veh like '%$ser_veh%'":"";
        $filtro4 = ($fol_ser!="") ? "and fol_ser like '%$fol_ser%'":"";        
      

   		  $sql="select ve.*,mo.nom_mod,cl.com_cli,ma.nom_mar,ma.cod_mar
              from vehiculo ve,modelo mo,cliente cl,marca ma
              where 
              ve.fky_cliente=cl.cod_cli and
              ve.fky_modelo=mo.cod_mod and
              mo.fky_marca=ma.cod_mar
              $filtro1 $filtro2 $filtro3;";
       
   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>