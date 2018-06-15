<?php 
require_once ("utilidad.class.php");
class modulo extends utilidad
{
public $cod_mod;	
public $nom_mod;
public $url_mod;
public $est_mod;

	public function agregar()
	{
		$sql="insert into 
		modulo(nom_mod,url_mod,est_mod) 
		values
		('$this->nom_mod','$this->url_mod','$this->est_mod');";
		return $this->ejecutar($sql);
	}
	public function modificar()
	{
		$sql="update modulo
		set 
		nom_mod='$this->nom_mod',url_mod='$this->url_mod', est_mod='$this->est_mod'
		where
		cod_mod=$this->cod_mod;";
		return $this->ejecutar($sql);
	}
	public function eliminar()
	{
		$sql="delete from
		modulo
		where
		cod_mod=$this->cod_mod;";
		return $this->ejecutar($sql);
	}
	public function listar()
	{
		$sql="select * from modulo;";
		return $this->ejecutar($sql);
	}

   	public function filtrar($cod_mod,$nom_mod,$est_mod){

        $where="where 1=1";
        
        $filtro1 = ($cod_mod!="") ? "and cod_mod=$cod_mod":"";
        $filtro2 = ($nom_mod!="") ? "and nom_mod like '%$nom_mod%'":"";
        $filtro3 = ($est_mod!="") ? "and est_mod='$est_mod'":"";

        $sql="select * from modulo $where $filtro1 $filtro2 $filtro3 order by nom_mod asc;"; 
        return $this->ejecutar($sql);  


   }// Fin Filtrar
//==================

}
 ?>
