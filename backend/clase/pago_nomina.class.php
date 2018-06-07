<?php
require_once("utilidad.class.php"); 

class pago_nomina extends utilidad
{
   
    public function detalle_nomina($nomina){
 
        $sql="select DISTINCT (fky_empleado), e.nom_emp,e.ape_emp
				FROM pago_nomina pn,empleado e
			  WHERE 
				pn.fky_empleado=e.cod_emp
				and fky_nomina =$nomina";
       
        return $this->ejecutar($sql);  

   }// Fin Filtrar


}
?>