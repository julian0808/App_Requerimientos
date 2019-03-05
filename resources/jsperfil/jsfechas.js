/*----------Funcion para obtener la edad------------*/
function calcular_edad(fecha) 
{//alert(fecha);
var fechaActual = new Date();
var diaActual = fechaActual.getDate();
var mmActual = fechaActual.getMonth() + 1;
var yyyyActual = fechaActual.getFullYear();
//alert(diaActual);
//alert(mmActual);
//alert(yyyyActual);
FechaNac = fecha.split("-");
var yyyyCumple = FechaNac[0]; 
var mmCumple = FechaNac[1];
var diaCumple = FechaNac[2];
//alert(diaCumple);
//alert(mmCumple);
//alert(yyyyCumple);
//retiramos el primer cero de la izquierda
if (mmCumple.substr(0,1) == 0) 
{
mmCumple= mmCumple.substring(1, 2);
}
//retiramos el primer cero de la izquierda
if (diaCumple.substr(0, 1) == 0) 
{
diaCumple = diaCumple.substring(1, 2);
}
var edad = yyyyActual - yyyyCumple;
//alert(edad + " 2");
//validamos si el mes de cumpleaños es menor al actual
//o si el mes de cumpleaños es igual al actual
//y el dia actual es menor al del nacimiento
//De ser asi, se resta un año
var diamm = mmActual - mmCumple;
if(diamm < 0)
{
   diamm = diamm + 12; 
}

var diadd = diaActual - diaCumple;
if(diadd < 0)
{
   diadd = diadd + 30; 
}


if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) 
{

edad--;
}
//alert('A: ' + edad + 'M: ' + diamm + 'D: ' + diadd);

var yearmesdia = [edad , diamm, diadd];

//alert(yearmesdia[0]);
return yearmesdia;
}