<?php
    require_once 'conexao.php';
    $pdo = Database::conexao();
    $stmt = $pdo->prepare('SELECT * FROM "livro"');
    $stmt->execute();
    $resData=$stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('include_html/cabecalho.php');?>
</head>
<body>
  <script>
     function alterarLivro(cod){
        $(location).prop('href', 'alterarLivro.php?cod='+cod);
     }
     function relatorio(){
        alert('adssaddasd');
     }     
  </script>
  <div class="container-fluid bg-dark text-light py-3"> 
        <header class="text-left">
           <h5>Livro</h5>         
        </header>        
  </div> 

  <div class="w-75 p-3">
    <a class="inicio" href="index.php"> Início </a>
    <div id="alert"></div>
    <form action="incluirLivro.php">
        <table class="table table-hover table-bordered table-sm align-middle caption-top">
            <thead class="table table-dark">
                <th>Código</th>
                <th>Título</th>
                <th>Editora</th>
                <th>Edição</th>
                <th>Ano Publicação</th>
                <th>Assunto</th>
                <th>Autor</th>
                <th colspan="2" style="text-align:center;">Ação</th>
               
            </thead>
            <tbody>    
            <?php
                foreach($resData as $rowData){
                    echo "<tr id=".$rowData['codl'].">";
                    echo "<td>".$rowData['codl']."</td>";
                    echo "<td>".$rowData['titulo']."</td>";
                    echo "<td>".$rowData['editora']."</td>";
                    echo "<td>".$rowData['edicao']."</td>";
                    echo "<td>".$rowData['anopublicacao']."</td>";
                    echo "<td><a href=\"livroAssunto.php?codLivro=".$rowData['codl']."&editora=".$rowData['editora']."&titulo=".$rowData['titulo']."\" title=\"Consultar assunto\"><img src=\"img/lupa.png\" style=\"width:25px;\">  ...</a></td>";
                    echo "<td><a href=\"livroAutor.php?codLivro=".$rowData['codl']."&editora=".$rowData['editora']."&titulo=".$rowData['titulo']."\" title=\"Consultar autor\"><img src=\"img/lupa.png\" style=\"width:25px;\">  ...</a></td>";
                    echo "<td align=\"center\"><button type=\"button\" class=\"btn btn-primary\" style=\"--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;\" title=\"Alterar informações do livro\" onclick=\"return alterarLivro(".$rowData['codl'].")\";>Alterar</button></td>";
                    echo "<td align=\"center\"><button type=\"button\" class=\"btn btn-danger\" style=\"--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;\" title=\"Excluir o livro\" onclick=\"return excluir(".$rowData['codl'].",null,4)\";>Excluir</button></td>";
                    echo "<tr>";               
                }          
            ?>
            </tbody>
            <caption>Listagem de Livros</caption>
        </table>  
        <button type="submmit" class="btn btn-secondary">Incluir Livro</button>
    </form>  
  <div>
</body>
</html>