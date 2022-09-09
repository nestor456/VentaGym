$(function(){
    $('#iddepartamento').on('change', onselectProjectChange);
    $('#idprovincia').on('change', onselectProjectChange2);
});

function onselectProjectChange(){
    var projec_id =  $(this).val();
    
    // AJAX
    $.get('/api/cliente/'+projec_id+'/provincia', function(data){
      var html_select = '<option value="" disabled selected>Provincia</option>';
          for (var i=0; i<data.length; ++i)
              html_select += '<option value="'+data[i].id+'">'+data[i].name+'</option>'
              $('#idprovincia').html(html_select);
  
    });
  }

  function onselectProjectChange2(){
    var projec_id =  $(this).val();
    
    // AJAX
    $.get('/api/cliente/'+projec_id+'/distrito', function(data){
      var html_select = '<option value="" disabled selected>Distrito</option>';
          for (var i=0; i<data.length; ++i)
              html_select += '<option value="'+data[i].id+'">'+data[i].name+'</option>'
              $('#iddistrito').html(html_select);
  
    });
  }