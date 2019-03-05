/* 
ESTE JS CARGA LOS DATOS POR JAVASCRIPT AL CARGAR LA PAGINA
 */

function cargardatosgenerales(jscapitulo, jspregunta, jscogestor,jstitular,jsbarra)
{
//alert("juanpis");
$('#icapitulo').append(jscapitulo);
$('#ipregunta').append(jspregunta);
$('#cogestor').append(jscogestor);
$('#ititular').append(jstitular);
$('#incrementobarra').append(jsbarra + '%');
$('#progressBar .progress-bar').css('width', jsbarra + '%');
    
}

function botonayuda()
{
//$('#vayuda').hide();
}


    

