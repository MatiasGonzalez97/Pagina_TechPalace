//Contador 
$('.contador-horas').countdown('2019/10/12 09:00:00',function(event){
    $('#horas').html(event.strftime('%H'));
    $('#minutos').html(event.strftime('%M'));
    $('#segundos').html(event.strftime('%S'));
});

// Variables del DOM de Celulares
let SamS9=document.getElementById('SamS9');
let Moto=document.getElementById('Motorola');
let SamNote=document.getElementById('Samsung_note');
let Lg_Q7=document.getElementById('Lg_Q7');
let Iphone_7=document.getElementById('Iphone_7');
let Huawei_p20=document.getElementById('Huawei_p20');
let Lg_V10=document.getElementById('LG_V10');
let Galaxy7=document.getElementById('Galaxy7');
let Admiral=document.getElementById('Admiral');
let phillips10=document.getElementById('phillips10');

// Variables del DOM de Monitor
let Benq32=document.getElementById('Benq32');
let Acer195=document.getElementById('Acer195');
let Sam32=document.getElementById('Samsung32');
let Sam27=document.getElementById('Samsung27');
let Lg34=document.getElementById('LG34');
let ToshibaTV=document.getElementById('ToshibaTV');
let Lg4k=document.getElementById('LG4K');
let Phillips55=document.getElementById('Phillips55');
let Lg4kHD=document.getElementById('LG4KHD');
let Phillips4K=document.getElementById('Phillips4K');

//Variables del DOM del gaming
let CorsairK55=document.getElementById('CorsairK55');
let Razer_Huntsman=document.getElementById('Razer_Huntsman');
let Razer_diamond=document.getElementById('Razer_diamond');
let Razer_Kraken=document.getElementById('Razer_kraken');
let HP_elite=document.getElementById('HP_elite');

let agregar=document.getElementById('sumar');

if(document.getElementById('calcular')){
    let calcular=document.getElementById('calcular');


    //Almaceno el valor que ingresó el usuario en variables
    let cantidad_SamS9=parseInt(SamS9.value,10) || 0;
    let cantidad_Moto=parseInt(Moto.value,10) || 0;
    let cantidad_SamNote=parseInt(SamNote.value,10) || 0;
    let cantidad_Lg_Q7=parseInt(Lg_Q7.value,10) || 0;
    let cantidad_Iphone_7=parseInt(Iphone_7.value,10) || 0;
    let cantidad_Huawei_p20=parseInt(Huawei_p20.value,10) || 0;
    let cantidad_Lg_V10=parseInt(Lg_V10.value,10) || 0;
    let cantidad_Galaxy7=parseInt(Galaxy7.value,10) || 0;
    let cantidad_Admiral=parseInt(Admiral.value,10) || 0;
    let cantidad_phillips10=parseInt(phillips10.value,10) || 0;
    //Almaceno monitor
    let cantidad_Benq32=parseInt(Benq32.value,10) || 0;
    let cantidad_Acer195=parseInt(Acer195.value,10) || 0;
    let cantidad_Sam32=parseInt(Sam32.value,10) || 0;
    let cantidad_Sam27=parseInt(Sam27.value,10) || 0;
    let cantidad_Lg34=parseInt(Lg34.value,10) || 0;
    let cantidad_ToshibaTV=parseInt(ToshibaTV.value,10) || 0;
    let cantidad_Lg4k=parseInt(Lg4k.value,10) || 0;
    let cantidad_phill55=parseInt(Phillips55.value,10) || 0;
    let cantidad_Lg4kHD=parseInt(Lg4kHD.value,10) || 0;
    let cantidad_phill4k=parseInt(Phillips4K.value,10) || 0;
    //Almaceno gaming
    let cantidad_CorsairK55=parseInt(CorsairK55.value,10) || 0;
    let cantidad_Razer_hunt=parseInt(Razer_Huntsman.value,10) || 0;        
    let cantidad_Razer_diamond=parseInt(Razer_diamond.value,10) || 0;
    let cantidad_Razer_Kraken=parseInt(Razer_Kraken.value,10) || 0;
    let cantidad_Hp_elite=parseInt(HP_elite.value,10) || 0;

}
$('.barras').click(function(){
    $('.mostrar').slideToggle();
});

$('#check').click(function(){
    $('.Total-carrito').slideToggle();
});

$('#pagar').click(function(){
    $('.iniciarses').slideDown();
    $('.iniciarses').addClass('borderojo');
    setTimeout(() => {
        $('.iniciarses').removeClass('borderojo');
    }, 2000);
});

// -------------------------------ESPACIO PARA TEST-----------------------------------------

function obtener_registros(productos)
{
	$.ajax({
		url : 'consulta.php',
		type : 'POST',
		dataType : 'html',
		data : { productos: productos },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});


// ----------------------------------------------------------------------------------------------}
$('body.index header nav ul li a:contains("Home")').addClass('activo');
$('body.contacto header nav ul li a:contains("Contacto")').addClass('activo');
$('body.login header nav ul li a:contains("Iniciar")').addClass('activo');
$('body.nosotros header nav ul li a:contains("Nosotros")').addClass('activo');
$('body.productos header nav ul li a:contains("Productos")').addClass('activo');
$('body.signup header nav ul li a:contains("Crear")').addClass('activo');

$('#enviado').click(function(){
    alert("Gracias por enviar el mensaje! en breve le será respondido");
});