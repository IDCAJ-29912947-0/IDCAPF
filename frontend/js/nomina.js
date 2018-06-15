function asignar_detalle(nomina,empleado,concepto)
{
	do{
	   var frecuencia=prompt("Por favor seleccione el numeros de dias/veces/frecuencia a asignar")
	   valor=isNaN(frecuencia)
	   if(valor==true)
	   	 alert("Debe colocar valores numericos.")

	}while(valor==true)


    objAjax=new XMLHttpRequest()
    objAjax.open("GET","../../../backend/controlador/nomina.php?accion=agregar_detalle_nomina&nomina="+nomina+"&empleado="+empleado+"&concepto="+concepto+"&valor="+frecuencia)
    objAjax.onreadystatechange=function()
    {
 		if(objAjax.status==200 && objAjax.readyState==4)
 		{
 			respuesta=objAjax.responseText
 			if(respuesta==false)
 				{
 					alert("No puede asignar un concepto previamente asignado")
 				}else
 				{	

		 			res=respuesta.split("#")
		            if(res[2]=="+")
		            {
		            	asignacion=res[0];
		            	deduccion="&nbsp;"
		            }else
		            if(res[2]=="-")
		             {
		            	asignacion="&nbsp;"
		            	deduccion=res[0];
		             }
			        var zona_dinamica="<div class='col-md-6 col-12 text-left border border-gray'>";
			        zona_dinamica=zona_dinamica+"("+frecuencia+") -"+res[1]
					zona_dinamica=zona_dinamica+"</div>"
					zona_dinamica=zona_dinamica+"<div class='col-md-3 col-12 text-center border border-gray'>"+asignacion+"</div>"
					zona_dinamica=zona_dinamica+"<div class='col-md-3 col-12 text-center border border-gray'>"+deduccion+"</div>"
					document.getElementById('zona_dinamica').innerHTML=document.getElementById('zona_dinamica').innerHTML+zona_dinamica
		 		}
		 	}	

    }
    objAjax.send(null)
}


function quitar_detalle()
{


}