$(document).ready(function(){

	MostrarGrilla();
});


function MostrarGrilla()
{
	var pagina= "./nexoadministrador.php";
	$.ajax({
		type:'POST',
		url:pagina,
		data: {queHacer:"mostrarLista"},
		datatype:"html",
		async: true
	})
	.then(
	function(exito){
		$("#GrillaMascotas").html(exito)
	},
	function(error){
		//alert("algo pasa");
	});
}


function AgregarMascota()
{ 
	
	var pagina= "./nexoadministrador.php";
	var nombre=$("#Nombre").val();
	var edad=$("#Edad").val();
	var fnac=$("#fnac").val();
	

	var mascota={};

	mascota.nombre= nombre;
	mascota.edad=edad;
	mascota.fnac=fnac;
	
		if(mascota.nombre==""){
		alert("Debe Ingresar Nombre");
		return;
	}
	if(mascota.edad==""){
		alert("Debe Ingresar Edad");
		return;
	}
	if(mascota.fnac==""){
		alert("Debe Ingresar Fnac");
		return;
	}

   $.ajax({url:pagina,type:"post",data:{queHacer:"Agregar",mascota:mascota}})
   .then(function(exito){
   
   },function(error){

   });
}

function BorrarMascota(mascota)
{
	if(!confirm("Desea Eliminar la mascota"+mascota.nombre+" "+mascota.edad+"??"))
	{return;}
	var pagina = "./nexoadministrador.php"

   $.ajax({
   	url:pagina,
   	type:"post",
   	datatype:"json",
   	data:{queHacer:"eliminar",mascota:mascota}}).then
   (function(exito){   
	
   },function(error){

   });

   MostrarGrilla();
}
function Modificar(mascota)
{
		var pagina= "./nexoadministrador.php";
	$("#Nombre").val(mascota.nombre);
	$("#Edad").val(mascota.edad);
	$("#fnac").val(mascota.fnac);
	$("#hdnQueHacer").val("modificar");

	$.ajax({
   	url:pagina,
   	type:"post",
   	datatype:"json",
   	data:{queHacer:"eliminar",mascota:mascota}}).then
   (function(exito){
  // alert(exito);
   //	alert(exito);
   //	alert("Modificado Exitosamente!");
	
   },function(error){

   });
}