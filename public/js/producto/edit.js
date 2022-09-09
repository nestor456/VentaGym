$(function(){
    $('#idcategoria').on('change', onselectProjectChange);
});

function onselectProjectChange(){
  var projec_id =  $(this).val();
  
  // AJAX
  $.get('/api/producto/'+projec_id+'/subCategory', function(data){
    var html_select = '<option value="" disabled selected>sub Categoria</option>';
        for (var i=0; i<data.length; ++i)
            html_select += '<option value="'+data[i].id+'">'+data[i].name+'</option>'
            $('#idsubcategoria').html(html_select);

  });
}