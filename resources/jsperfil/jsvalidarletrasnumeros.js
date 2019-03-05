function soloNumeros(e)
{
    //    alert(e);
    var key = window.Event ? e.which : e.keyCode
    if ((key >= 48 && key <= 57) || (key == 8)) {
    }
    else
    {
        okletrasnum('Ingresa solo numeros!!!');
    }
    return ((key >= 48 && key <= 57) || (key == 8))
}


function sinNumeros(e)
{

    var key = window.Event ? e.which : e.keyCode
    if (((key < 48 || key > 57) || (key === 8)) && (key != 32)) 
    {

    }
    else
    {
        okletrasnum('No se aceptan numeros ni espacios');
    }
    //alert(key);
    return (((key < 48 || key > 57) || (key === 8)) && (key != 32))
}

function sinNumerossiEspacio(e)
{

    var key = window.Event ? e.which : e.keyCode
    if ((key < 48 || key > 57) || (key === 8)) 
    {

    }
    else
    {
        okletrasnum('No se aceptan numeros');
    }
    //alert(key);
    return ((key < 48 || key > 57) || (key === 8))
}


function soloLetras(e)
{
    //    alert(e);
    var key = window.Event ? e.which : e.keyCode

    if ((key >= 65 && key <= 90) || (key == 8) || (key == 32) || (key == 44 || (key == 46) || (key == 209))) {
    }
    else
    {
        okletrasnum('Ingresa solo letras mayusculas!!!');
    }

    return ((key >= 65 && key <= 90) || (key == 8) || (key == 32) || (key == 44) || (key == 46) || (key == 209))
}

function okletrasnum(mensaje)
{
    new jBox('Notice', {
        content: mensaje,
        color: 'green',
        animation: {open: 'tada', close: 'flip'},
        position: {x: 'right', y: 'center'},
        autoClose: 2000
    });
}