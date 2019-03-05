/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function botonguardar()
{
    $('#siguiente').show(1000);
    $('#siguiente').prop('disabled', false);
    $('#actualizar').show(1000);
    $('#actualizar').prop('disabled', true);
    $('#cancelar').show(1000);
    $('#cancelar').prop('disabled', true);
    $('#guardar').hide(1000);
    $('#anterior').prop('disabled', false);

    mensajito('MENSAJE:','La informacion se guardo');//me llama el mensajito de guardar

}

function botonactualizar()
{
    $('#siguiente').prop('disabled', false);
    $('#actualizar').prop('disabled', true);
    $('#cancelar').prop('disabled', true);
    $('#anterior').prop('disabled', false);

    mensajito('MENSAJE','La informacion se actualizo');//me llama el mensajito de guardar

}

function botoncancelar()
{ 
    location.reload();
}
               
$("#capitulos").click(function ()
{
 //alert('volver');
 location.href = "../c_capituloshogar/fc_capituloshogar?folio=" + $('#folio').val()+ "&idintegrante=0";                  
});

function botonanterior()
{
   
}

function botonsiguiente()
{
    
}
 