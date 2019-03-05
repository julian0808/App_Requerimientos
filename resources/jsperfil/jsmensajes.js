/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function mensajito(titulo, mensaje)
{
new jBox('Notice', {
    title: titulo,
    content: mensaje,
    color: 'black',
    animation: {open: 'flip', close: 'flip'},
    position: {x: 'center', y: 'center'},
    autoClose: 2000
});
}


