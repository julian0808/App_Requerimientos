function administrativomail(idadmin, tipoadmin){

    $.ajax({
      url: "../../enviomail/c_enviomail/fc_enviogmial",
      type: "GET",
      data: {vidamin :  idadmin,
             vrespuestaadmin : $('#respuestaadmin' + idadmin).val(),
             vobservacionad : $('#observacionad' + idadmin).val(),
             vtipo : tipoadmin
             },    
      dataType: "html",
      success : function(obj){   
      }
    });  

}

function sistemasmail(idreq, respuesta,fecha,tiposis){
//alert(idreq);
//alert(respuesta);
//alert(fecha);
//alert(tiposis);

    $.ajax({
      url: "../../metodologia2servidor/index.php/enviomail/c_enviomail/fc_enviogmialsistemas",
      type: "GET",
      data: {vidreq :  idreq,
             vrespuesta : respuesta,
             vfecha : fecha,
             vtiposis : tiposis
             },    
      dataType: "html",
      success : function(obj){   
      }
    }); 
}

