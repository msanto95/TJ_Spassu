<?php
    $cod = $_GET['cod'];
    require_once 'conexao.php';
    $pdo = Database::conexao();
    $stmt = $pdo->prepare('SELECT * FROM "autor" WHERE coau ='.$cod);
    $stmt->execute();
    $resData=$stmt->fetchAll();

    foreach($resData as $rowData){
        $nome = $rowData['nome'];
    }        
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('include_html/cabecalho.php');?>
</head>
<body>
    <script>
        $(document).ready(function(){
            $('#gravar').click(function() {
                var codigo = <?php echo $cod;?>;
                var nome = $('#nome').val();
     
                if (nome == "") {
                    alert("Por favor, preencha o campo Nome.");
                    return false;
                }  
                                                                       
                $.post('gravaAutorAssunto.php', {orig: 0, codigo: codigo, nome: nome}, function(data) {
                    $(location).prop('href', 'autor.php');
                });
            });
        }) 

    </script>    
    <div class="container-fluid bg-dark text-light py-3"> 
        <header class="text-left">
           <h5>Autor>> Alterar Autor</h5>         
        </header>        
    </div> 
    <div class="w-75 p-3">
        <a class="inicio" href="index.php"> Início </a><a class="inicio" href="autor.php"> Voltar </a><br><br> 
        <div id="alert"></div>
        <form>
            <head>Alterar Autor</head>
            <div class="border border-dark w-400 mt-2 bg-light">
                <div class="p-3">
                    <div class="form-group">
                        <label for="titulo">Nome</label>
                        <input type="text" class="form-control w-75 border-dark" id="nome" value="<?php echo $nome; ?>">
                    </div>
                </div>  
                <div class="col-12 p-3">
                        <button type="button" class="btn btn-primary" id="gravar">Gravar</button>
                </div>  
            </div>
        </form>
    <div>
</body>
</html>