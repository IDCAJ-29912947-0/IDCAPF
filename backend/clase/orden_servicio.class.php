<?php
require_once("utilidad.class.php");
class orden_servicio extends utilidad
{
	public $cod_ord;
	public $fec_ord;
	public $kms_ord;
	public $fet_ord;
	public $fee_ord; 
	public $aut_ord; 
	public $fky_taller; 
	public $fky_cliente;
	public $est_ord; 
  public $fky_ciudad;
  public $fky_vehiculo;
  public $fky_empleado;
  public $obs_ord;

//==============================================================================
   public function agregar(){

    	$sql="insert into orden_servicio(
            fec_ord, 
            kms_ord, 
            fet_ord, 
            fee_ord, 
            aut_ord, 
            fky_taller, 
            fky_cliente,
            fky_ciudad,
            fky_empleado,
            fky_vehiculo,
            obs_ord,
            est_ord)
    	   values
    	     ('$this->fec_ord',
            '$this->kms_ord', 
            '$this->fet_ord', 
            '$this->fee_ord', 
            '$this->aut_ord', 
            '$this->fky_taller', 
            '$this->fky_cliente',
            '$this->fky_ciudad', 
            '$this->fky_empleado', 
            '$this->fky_vehiculo',
            '$this->obs_ord',                       
            '$this->est_ord');";

           
    	return $this->ejecutar($sql);
    	
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update orden_servicio set 
      fec_ord='$this->fec_ord', 
      kms_ord=$this->kms_ord, 
      fet_ord='$this->fet_ord', 
      fee_ord='$this->fee_ord', 
      aut_ord='$this->aut_ord', 
      fky_taller=$this->fky_taller, 
      fky_cliente=$this->fky_cliente, 
      fky_ciudad=$this->fky_ciudad,
      fky_empleado=$this->fky_empleado,
      fky_vehiculo=$this->fky_vehiculo,
      obs_ord='$this->obs_ord',
      est_ord='$this->est_ord'      
      where 
      cod_ord=$this->cod_ord;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from orden_servicio where est_ord='$this->est_ord';";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from orden_servicio where cod_ord=$this->cod_ord;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update orden_servicio set est_ord='$this->est_ord' where cod_ord=$this->cod_ord;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_ord,$fec_ord,$kms_ord,$fet_ord,$fee_ord,$aut_ord,$fky_taller,$fky_cliente,$fky_ciudad,$fky_vehiculo,$fky_empleado,$obs_ord,$est_ord){
        
        $where="where 1=1";

        $filtro1 = ($cod_ord!="") ? "and cod_ord=$cod_ord":"";
        $filtro2 = ($fec_ord!="") ? "and fec_ord='$fec_ord'":"";
        $filtro3 = ($kms_ord!="") ? "and kms_ord like '%$kms_ord%'":"";
        $filtro4 = ($fet_ord!="") ? "and fet_ord like '%$fet_ord%'":"";        
      

   		  $sql="select os.*,em.nom_emp,cl.com_cli,ta.nom_tal,ve.pla_veh,ci.nom_ciu
              from orden_servicio os,empleado em,cliente cl, taller ta, vehiculo ve, ciudad ci
              where 
              os.fky_empleado=em.cod_emp and
              os.fky_cliente=cl.cod_cli and
              os.fky_taller=ta.cod_tal and
              os.fky_vehiculo=ve.cod_veh and
              os.fky_ciudad=ci.cod_ciu 
              $filtro1 $filtro2 $filtro3;";
       
   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>