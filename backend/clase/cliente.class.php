<?php
require_once("utilidad.class.php");
class cliente extends utilidad
{
        public $cod_cli;
        public $com_cli;
        public $rfc_cli;
        public $cue_cli;
        public $fil_cli;
        public $dep_cli;
        public $cre_cli;  
        public $dia_cli;            
        public $pag_cli;  
        public $pdf_cli;  
        public $est_cli; 
        public $fac_cli;
        public $fky_empleado; 
        public $fky_banco;

//==============================================================================
   public function agregar(){

    	$sql="insert into cliente(
            com_cli,
            rfc_cli,
            cue_cli,
            fil_cli,         
            cre_cli,  
            dia_cli,            
            pag_cli,  
            pdf_cli,
            fac_cli,
            fky_empleado,
            fky_banco,  
            est_cli)
    	   values
    	     ('$this->com_cli',
            '$this->rfc_cli',
            '$this->cue_cli',
            '$this->fil_cli',       
            '$this->cre_cli',  
            '$this->dia_cli',           
            '$this->pag_cli',  
            '$this->pdf_cli', 
            '$this->fac_cli',
            '$this->fky_empleado',  
            '$this->fky_banco',             
            '$this->est_cli');";

            
    	return $this->ejecutar($sql);
    	
   }//Fin Agregar
//==============================================================================

   public function modificar(){
   		$sql="update cliente set 
            com_cli='$this->com_cli',
            rfc_cli='$this->rfc_cli',
            cue_cli='$this->cue_cli',
            fil_cli='$this->fil_cli',  
            cre_cli='$this->cre_cli',  
            dia_cli='$this->dia_cli',           
            pag_cli='$this->pag_cli',  
            pdf_cli='$this->pdf_cli',
            fky_empleado='$this->fky_empleado', 
            fky_banco='$this->fky_banco', 
            est_cli='$this->est_cli'
      where 
            cod_cli=$this->cod_cli;";
   		return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from cliente where est_cli='$this->est_cli';";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from cliente where cod_cli=$this->cod_cli;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update cliente set est_cli='$this->est_cli' where cod_cli=$this->cod_cli;";
   		return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function filtrar($cod_cli,$rfc_cli,$com_cli){
        

        $filtro1 = ($cod_cli!="") ? "and cod_cli=$cod_cli":"";
        $filtro2 = ($rfc_cli!="") ? "and rfc_cli='$rfc_cli'":"";
        $filtro3 = ($com_cli!="") ? "and com_cli like '%$com_cli%'":"";
       
      

   		  $sql="select c.*,e.cod_emp,e.nom_emp from cliente c, empleado e  where c.fky_empleado=e.cod_emp $filtro1 $filtro2 $filtro3";
       
   	    return $this->ejecutar($sql);  

   }// Fin Filtrar
//==============================================================================

}//Fin de la Clase
?>