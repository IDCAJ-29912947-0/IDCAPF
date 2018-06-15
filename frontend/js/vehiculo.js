function seleccionar_modelo()
{
	var est=document.getElementById('fky_marca').value
	var objAjax=new XMLHttpRequest;
	objAjax.open("GET","../../../backend/controlador/modelo.php?accion=select_generico&valor="+est)
	objAjax.onreadystatechange=function()
	{

	 if(objAjax.status==200 && objAjax.readyState==4)
	 	{
	 		
	 		document.getElementById("zona_modelo").innerHTML=objAjax.responseText
	 	}

	}
	objAjax.send(null)		
}