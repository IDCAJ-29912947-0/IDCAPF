<?php
require_once("utilidad.class.php");

class nomina extends utilidad
{
   public $cod_nom;
   public $des_nom;
   public $ini_nom;    
   public $fin_nom;      
   public $tot_nom=0;   
   public $tot_asi=0;    
   public $tot_ded=0; 
   public $est_nom;

//==============================================================================
   public function agregar(){

    	$sql="insert into nomina(des_nom,ini_nom,fin_nom,tot_nom,tot_asi,tot_ded,est_nom)values('$this->des_nom','$this->ini_nom','$this->fin_nom',$this->tot_nom,$this->tot_asi,$this->tot_ded,'$this->est_nom');";
    	return $this->ejecutar($sql);
   }//Fin Agregar
//==============================================================================

   public function modificar(){
      $sql="update nomina set des_nom='$this->des_nom',ini_nom='$this->ini_nom',fin_nom='$this->fin_nom',tot_nom=$this->tot_nom,tot_asi=$this->tot_asi,tot_ded=$this->tot_ded where cod_nom='$this->cod_nom';";
   	return $this->ejecutar($sql);
   	
   }//Fin Modificar  
//==============================================================================

   public function listar(){
   		$sql="select * from nomina where est_nom='$this->est_nom' order by cod_nom desc;";
   		return $this->ejecutar($sql);
   	
   }//Fin Listar 
//==============================================================================

   public function eliminar(){
   		$sql="delete from ______ where ;";
   		return $this->ejecutar($sql);  	
   }//Fin Eliminar  
//==============================================================================

   public function cambio_estatus(){
   		$sql="update nomina set est_nom='$this->est_nom' where cod_nom=$this->cod_nom;";

   	return $this->ejecutar($sql);  
   	
   }//Fin Cambio Estatus   
//==============================================================================

   public function ver_estatus_nomina($est_nom)
   {
      switch ($est_nom) 
      {
         case 'A':
           return "Abierta";
          break;

          case 'G':
            return "Generada";
          break;
 
          case 'C':
            return "Cerrada";
          break;

          case 'I':
            return "Anulada";
          break;   
          default:
            return "Sin Estatus Valido";
          break;              
      }
   }

//==============================================================================

   public function filtrar($cod_nom,$des_nom,$est_nom){

        $where="where 1=1";
        
        $filtro1 = ($cod_nom!="") ? "and cod_nom=$cod_nom":"";
        $filtro2 = ($des_nom!="") ? "and des_nom like '%$des_nom%'":"";
        $filtro3 = ($est_nom!="") ? "and est_nom='$est_nom'":"";

        $sql="select * from nomina $where $filtro1 $filtro2 $filtro3 order by cod_nom desc;"; 
        return $this->ejecutar($sql);  


   }// Fin Filtrar

   public function procesar()
   {
     
     $error=0;
     $pun_nom=$this->filtrar($this->cod_nom,"","");
     $nomina=$this->extraer_dato($pun_nom);

     $sql="select e.cod_emp,e.sal_emp from empleado e where e.est_emp='A'";
     $pun_emp=$this->ejecutar($sql);
     while(($empleado=$this->extraer_dato($pun_emp))>0)
     {
      
        $sql2="select cn.cod_con_nom,cn.for_con_nom,cn.for_con_nom,tc.nom_tip_con
              from concepto_nomina cn, tipo_concepto tc
              where 
              fky_tipo_concepto=cod_tip_con and
              cn.est_con_nom='A' and cn.opc_con_nom='O'";
        $pun_con_nom=$this->ejecutar($sql2); 
        $formula="";
        while(($concepto_nomina=$this->extraer_dato($pun_con_nom))>0)
        {
            $formula=$concepto_nomina["for_con_nom"];
            $sql3="select vn.nom_var_nom,vn.val_var_nom from variable_nomina vn where vn.est_var_nom='A'";
            $pun_var_nom=$this->ejecutar($sql3);
              while(($variable_nomina=$this->extraer_dato($pun_var_nom))>0)    
              {
                if($variable_nomina["nom_var_nom"]=="SALME")
                 {
                    $variable_nomina["val_var_nom"]=$empleado["sal_emp"];
                 } 
                
                $formula=str_replace($variable_nomina["nom_var_nom"],$variable_nomina["val_var_nom"], $formula);
                
              }     
                $sql4="select $formula as monto";
                $pun_for=$this->ejecutar($sql4);
                $valor=$this->extraer_dato($pun_for);
                $mon_pag_nom=$valor["monto"];

              $sql5="insert into pago_nomina
                (mon_pag_nom,
                 fky_nomina,
                fky_empleado,
                fky_concepto_nomina,
                can_pag_nom,
                est_pag_nom) 
              values
                ($mon_pag_nom,
                $this->cod_nom,
                $empleado[cod_emp],
                $concepto_nomina[cod_con_nom],
                1,
                'D')";

              $pun_pag_nom=$this->ejecutar($sql5);
              $prk_aud=$this->ultimo_id_insertado();
              if($prk_aud>0){
                $this->auditoria($prk_aud);
              }else
              {
               $error=1;
              }

               
        }     

     }

     return ($error==1)?false:true;

   }

//==============================================================================

 public function agregar_detalle_nomina($fky_nomina,$fky_empleado,$fky_concepto,$frecuencia)
 {
    
      $sql0="select e.cod_emp,e.sal_emp from empleado e where cod_emp=$fky_empleado";
      $pun_emp=$this->ejecutar($sql0);
      $empleado=$this->extraer_dato($pun_emp);

      $sql="select for_con_nom from concepto_nomina where cod_con_nom=$fky_concepto";
      $pun_pag_nom=$this->ejecutar($sql);
      $form=$this->extraer_dato($pun_pag_nom);
      $formula=$form["for_con_nom"];

      $sql1="select vn.nom_var_nom,vn.val_var_nom from variable_nomina vn where vn.est_var_nom='A'";
      $pun_var_nom=$this->ejecutar($sql1);

      while(($variable_nomina=$this->extraer_dato($pun_var_nom))>0)    
      {
                if($variable_nomina["nom_var_nom"]=="SALME")
                 {
                    $variable_nomina["val_var_nom"]=$empleado["sal_emp"];
                 } 
                
                $formula=str_replace($variable_nomina["nom_var_nom"],$variable_nomina["val_var_nom"], $formula);
                
      }     

      $sql2="select $formula as monto";
      $pun_for=$this->ejecutar($sql2);
      $monto=$this->extraer_dato($pun_for);
      $mon_pag_nom=$monto["monto"]*$frecuencia;

     $sql3="INSERT into pago_nomina
            (mon_pag_nom,
             fky_nomina,
             fky_empleado,
             fky_concepto_nomina,
             can_pag_nom,
             est_pag_nom         
          )values
            ($mon_pag_nom,
             $fky_nomina,
             $fky_empleado,
             $fky_concepto,
             $frecuencia,
             'D'
           )";
      return $this->ejecutar($sql3);  
 }



}//Fin de la Clase
?>
