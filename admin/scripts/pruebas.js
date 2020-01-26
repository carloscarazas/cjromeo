jQuery(document).on('submit','#frmlicencia2', function(event){
    event.preventDefault();
    jQuery.ajax({
       url: 'ajax/pruebas.php',
        type:'POST',
        dataType: 'json',
        data: $(this).serialize(),
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
            alert('los datos se registraron');
            
        }else{
              alert('los datos NO  se registraron');
        }
        
    })
    .fail(function(resp){
        console.log(resp)
    })
    .always(function(){
        console.log("complete");
    })
    
});


