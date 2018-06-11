<?php
require_once("utilidad.class.php");
class rol extends utilidad
{
	public $cod_rol;
	public $nom_rol;
	public $est_rol;
	
	 public function agregar()
	 {
		$sql="insert into 
		     rol(nom_rol,est_rol) 
		     values('$this->nom_rol','$this->est_rol');";
		return $this->ejecutar($sql);	 
				
	 }

	 public function modificar()
	 {
		$sql="update rol 
		      set
		      nom_rol='$this->nom_rol',
		      est_rol='$this->est_rol'
		      where
		      cod_rol=$this->cod_rol;";

		return $this->ejecutar($sql);
	 }

	 public function eliminar()
	 {
		$sql="delete from rol
		      where
		      cod_rol=$this->cod_rol;";
		return $this->ejecutar($sql);
	 }

	 public function listar()
	 {
		$sql="select * from rol;";
		return $this->ejecutar($sql);
	 }

	 public function filtrar($cod_rol,$nom_rol,$est_rol)
	 {
        $where="where 1=1";
        
        $filtro1 = ($cod_rol!="") ? "and cod_rol=$cod_rol":"";
        $filtro2 = ($nom_rol!="") ? "and nom_rol like '%$nom_rol%'":"";
        $filtro3 = ($est_rol!="") ? "and est_rol='$est_rol'":"";

        $sql="select * from rol $where $filtro1 $filtro2 $filtro3 order by nom_rol asc;"; 
        return $this->ejecutar($sql);  
   	  }

}
?>
