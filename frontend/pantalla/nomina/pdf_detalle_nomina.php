<?php 
require("../../fpdf181/fpdf.php");
require("../../../backend/clase/permiso.class.php");
require("../../../backend/clase/nomina.class.php");
require("../../../backend/clase/empleado.class.php");
require("../../../backend/clase/pago_nomina.class.php");

$objPermiso=new permiso;
$objNomina=new nomina;
$objPago=new pago_nomina;
$objEmpleado=new empleado;

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../img/logo2.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Recibo de Pago',0,0,'C');
    $this->SetFont('Arial','B',8);
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/1',0,0,'R');
    $this->Ln();
    $this->Cell(0,10,'Emitido: '.date("d/m/Y"),0,0,'R');
    $this->Ln(8);
}

// Pie de página

}

    $pdf = new PDF();   

	$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
	$acceso=$objPermiso->extraer_dato($permiso);

	if($acceso["est_per"]=="A")
	{

	foreach($_REQUEST as $nombre_campo => $valor){
	  	 $objPermiso->asignar_valor($nombre_campo,$valor);
	} 


		$pun_nom=$objNomina->filtrar($_REQUEST["cod_nom"],$des_nom="",$est_nom="");
		$nomina=$objNomina->extraer_dato($pun_nom);

		$pun_emp=$objEmpleado->filtrar($_REQUEST["cod_emp"],$dni_emp="",$nom_emp="",$ape_emp="");
		$empleado=$objEmpleado->extraer_dato($pun_emp);
		$salario=$objEmpleado->formatear_numero($empleado["sal_emp"],2);


		$borde=0;
		$lugar=0;
		$fondo=false;
		$url="";
		$alto="6";


		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);
		$pdf->Ln();
		$pdf->Cell(30,$alto,"Nomina:",$borde,$lugar,$alinear="L",$fondo,$url);
		$pdf->Cell(160,$alto,$nomina["des_nom"],$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Ln();
		$pdf->Cell(30,$alto,"Fecha de Inicio:",$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Cell(65,$alto,$objNomina->voltear_fecha($nomina["ini_nom"]),$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Cell(30,$alto,"Fecha Fin:",$borde,$lugar,$alinear="L",$fondo,$url);
		$pdf->Cell(65,$alto,$objNomina->voltear_fecha($nomina["fin_nom"]),$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Ln();
		$pdf->Cell(30,$alto,"Nombres:",$borde,$lugar,$alinear="L",$fondo,$url);
		$pdf->Cell(65,$alto,$empleado["nom_emp"],$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Cell(30,$alto,"Apellidos:",$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Cell(65,$alto,$empleado["ape_emp"],$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Ln();
		$pdf->Cell(30,$alto,"Identificacion:",$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Cell(65,$alto,$empleado["dni_emp"],$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Cell(30,$alto,"Salario Mensual:",$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Cell(65,$alto,$salario,$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Ln();
		$pdf->Cell(190,$alto,"Detalle del Recibo",1,$lugar,$alinear="C",$fondo,$url);


		$pdf->Ln();
		$pdf->Cell(10,$alto,"Ref.",$borde="1",$lugar,$alinear,$fondo,$url);
		$pdf->Cell(100,$alto,"Descripcion",$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Cell(40,$alto,"Asignacion",$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Cell(40,$alto,"Deduccion",$borde,$lugar,$alinear,$fondo,$url);


		$pun_pag=$objPago->filtrar($cod_pag_nom="",$_REQUEST["cod_nom"],$_REQUEST["cod_emp"],$fky_concepto_nomina="",$est_con_nom="",$signo="+");

		$acu_asi=0;
		while(($pago=$objPago->extraer_dato($pun_pag))>0)
		{
			$pdf->Ln();
			$pdf->Cell(10,$alto,$pago["cod_pag_nom"],$borde="1",$lugar,$alinear="L",$fondo,$url);
			$pdf->Cell(100,$alto,$pago["des_con_nom"],$borde,$lugar,$alinear,$fondo,$url);
			$pdf->Cell(40,$alto,$objPago->formatear_numero($pago["mon_pag_nom"],2),$borde,$lugar,$alinear="R",$fondo,$url);
			$pdf->Cell(40,$alto,"",$borde,$lugar,$alinear,$fondo,$url);
			$acu_asi+=$pago["mon_pag_nom"];
		}


		$pun_pag=$objPago->filtrar($cod_pag_nom="",$_REQUEST["cod_nom"],$_REQUEST["cod_emp"],$fky_concepto_nomina="",$est_con_nom="",$signo="-");

		$acu_ded=0;
		while(($pago=$objPago->extraer_dato($pun_pag))>0)
		{
			$pdf->Ln();
			$pdf->Cell(10,$alto,$pago["cod_pag_nom"],$borde="1",$lugar,$alinear="L",$fondo,$url);
			$pdf->Cell(100,$alto,$pago["des_con_nom"],$borde,$lugar,$alinear="L",$fondo,$url);
			$pdf->Cell(40,$alto,"",$borde,$lugar,$alinear="R",$fondo,$url);
			$pdf->Cell(40,$alto,$objPago->formatear_numero($pago["mon_pag_nom"],2),$borde,$lugar,$alinear,$fondo,$url);
			$acu_ded+=$pago["mon_pag_nom"];
		}

		$pdf->Ln();
		$pdf->Cell(10,$alto,"",$borde="0",$lugar,$alinear,$fondo,$url);
		$pdf->Cell(100,$alto,"Sub-Totales:",$borde,$lugar,$alinear="R",$fondo,$url);
		$pdf->Cell(40,$alto,$objPago->formatear_numero($acu_asi,2),$borde,$lugar,$alinear,$fondo,$url);
		$pdf->Cell(40,$alto,$objPago->formatear_numero($acu_ded,2),$borde,$lugar,$alinear,$fondo,$url);


		$total=$acu_asi-$acu_ded;

		$pdf->Ln();
		$pdf->Cell(10,$alto,"",$borde="0",$lugar,$alinear,$fondo,$url);
		$pdf->Ln(2);
		$pdf->Cell(110,$alto,"Total a Pagar:",$borde,$lugar,$alinear="R",$fondo,$url);
		$pdf->Cell(80,$alto,$objPago->formatear_numero($total,2),$borde=1,$lugar,$alinear="C",$fondo,$url);
		$pdf->Ln(5);
		$pdf->Cell(95,$alto,"______________________________________",$borde=0,$lugar,$alinear="C",$fondo,$url);
		$pdf->Ln();
		$pdf->Cell(95,$alto,"Firma",$borde=0,$lugar,$alinear="C",$fondo,$url);
		$pdf->Output();
		

}else{
	 $objPermiso->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>