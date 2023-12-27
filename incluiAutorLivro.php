<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
      include('include_html/cabecalho.php');
      $codLivro =$_GET['codLivro'];
  ?>
</head>
<body>
    <script>
       $(document).ready(function(){
        let codLivro = <?php echo $codLivro; ?>;
        $('#selAutor').load('loadElement.php?orig=0&cod='+codLivro);  
             
           $('button#gravar').click(function(){

            var valorSelecionado = $('#selAutor').val();

              
              $.post('gravaInfo.php', {orig:2, codigo: codLivro, val: valorSelecionado}, function(data){

                $('#alert').html('<div class=\"alert alert-success alert-dismissible\"><strong>Gravado com sucesso!</strong></div>');

                setTimeout(function(){
                    $(".alert").fadeOut("slow", function(){
                        $(this).alert('close');
                    })
                    $(".alert").alert('close');
                 }, 10000); 

                 $(location).prop('href', 'livro.php');

              })
           })
       }) 
    </script>
    <div class="container-fluid bg-dark text-light py-3"> 
        <header class="text-left">
           <h5>Livro>>Autor>>Incluir Autor</h5>
        </header>
    </div>
  <div class="w-50 p-3">
    <a class="inicio" href="index.php"> Início </a><a class="inicio" href="livro.php"> Voltar </a><br><br> 
    <div id="alert"></div>
        <div class="container mt-4">
            <form class="row g-3">
                <div class="col-12">
                    <fieldset>
                    <legend>Autores</legend>
                        <select class="form-select" id="selAutor">
                            <option value="-1" selected>Selecione o autor</option>
                        </select>
                    </fieldset>    
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-primary" id="gravar">Gravar</button>
                </div>
                </div>
            </form>
        </div>    
  <div>
</body>
</html>