
function excluir(val, valRel, page){

   let dataVar; 
   
   if(valRel==null){
     dataVar = 'id='+val+'&page='+page;
   }else{
     dataVar = 'id='+val+'&idRel='+valRel+'&page='+page;
   }
   $.ajax({
       type: 'POST',
       url: 'userAction.php',
       data: dataVar,
       success:function(html){
        
            if(html==0){     
                     
                $('#alert').html('<div class=\"alert alert-success alert-dismissible\"><strong>Excluído com sucesso!</strong></div>');

                $('tr#'+val).fadeOut(500, function(){
                    $(this).remove()
                 });
      
           }else{
              $('#alert').html('<div class=\"alert alert-danger alert-dismissible\"><strong>Não é possível excluir o registro!</strong></div>');
           } 
 
           setTimeout(function(){
                $(".alert").fadeOut("slow", function(){
                    $(this).alert('close');
                })
                $(".alert").alert('close');
            }, 2000);        
       } 
   });
   
}
