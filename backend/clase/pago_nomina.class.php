<?php
require_once("utilidad.class.php"); 

class pago_nomina extends utilidad
{
   
    public function detalle_nomina($nomina){
 
        $sql="SELECT DISTINCT (fky_empleado), e.nom_emp,e.ape_emp
				FROM pago_nomina pn,empleado e
			  WHERE 
				pn.fky_empleado=e.cod_emp
				and fky_nomina =$nomina";
       
        return $this->ejecutar($sql);  

   }// Fin Filtrar

   public function filtrar($cod_pag_nom,$fky_nomina,$fky_empleado,$fky_concepto_nomina,$est_con_nom,$sig_tip_con)
   {
       
        $filtro1 = ($cod_pag_nom!="") ? "and cod_pag_nom=$cod_pag_nom":"";
        $filtro2 = ($fky_nomina!="") ? "and fky_nomina=$fky_nomina":"";
        $filtro3 = ($fky_empleado!="") ? "and fky_empleado=$fky_empleado":"";
        $filtro4 = ($fky_concepto_nomina!="") ? "and fky_concepto_nomina=$fky_concepto_nomina":"";
        $filtro5 = ($est_con_nom!="")? "and est_con_nom='$est_con_nom'":"";
        $filtro6 = ($sig_tip_con!="")? "and sig_tip_con='$sig_tip_con'":"";

        $sql="SELECT pn.*,cn.des_con_nom, tc.sig_tip_con
              from pago_nomina pn,concepto_nomina cn, tipo_concepto tc
              where 
              pn.fky_concepto_nomina=cn.cod_con_nom and
              cn.fky_tipo_concepto=tc.cod_tip_con 
              $filtro1 
              $filtro2 
              $filtro3 
              $filtro4
              $filtro5
              $filtro6
              order by est_tip_con";
        return $this->ejecutar($sql);  
   }


}
?>