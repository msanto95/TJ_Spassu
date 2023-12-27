<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('include_html/cabecalho.php');?>
</head>
<body>
    <script>
       $(document).ready(function(){
           $('button#gravar').click(function(){
              $.post('gravaInfo.php', {orig:1, descricao:$('input#inputNome').val()}, function(data){

                $('#alert').html('<div class=\"alert alert-success alert-dismissible\"><strong>Gravado com sucesso!</strong></div>');

                setTimeout(function(){
                    $(".alert").fadeOut("slow", function(){
                        $(this).alert('close');
                    })
                    $(".alert").alert('close');
                 }, 10000); 

                 $(location).prop('href', 'assunto.php');

              })
           })
       }) 
    </script>
    <div class="container-fluid bg-dark text-light py-3"> 
        <header class="text-left">
           <h5>Assunto>>Incluir Assunto</h5>
        </header>
    </div>
  <div class="w-50 p-3">
    <a class="inicio" href="index.php"> Início </a><a class="inicio" href="assunto.php"> Voltar </a><br><br> 
    <div id="alert"></div>
        <div class="container mt-4">
            <form class="row g-3">
                <div class="col-12">
                    <label for="inputNome" class="form-label">Assunto</label>
                    <input type="text" class="form-control" id="inputNome" placeholder="Digite o Assunto">
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