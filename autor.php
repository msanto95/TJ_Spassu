<?php
    require_once 'conexao.php';
    $pdo = Database::conexao();
    $stmt = $pdo->prepare('SELECT * FROM public."autor"');
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
     function alterarAutor(cod){
        $(location).prop('href', 'alterarAutor.php?cod='+cod);
     }
  </script> 
  <div class="container-fluid bg-dark text-light py-3"> 
        <header class="text-left">
           <h5>Autor</h5>         
        </header>        
  </div> 
  <div class="w-50 p-3">
    <a class="inicio" href="index.php"> Início </a>
    <div id="alert"></div>
    <form action="incluiAutor.php">
        <table class="table table-hover table-bordered table-sm align-middle caption-top">
            <thead class="table table-dark">
                <th>Código</th>
                <th>Descrição</th>
                <th colspan="2" style="text-align:center;">Ação</th>
               
            </thead>
            <tbody>    
            <?php
                foreach($resData as $rowData){
                    echo "<tr id=".$rowData['coau'].">";
                    echo "<td style=\"width:20px;\">".$rowData['coau']."</td>";
                    echo "<td style=\"width:500px;\">".$rowData['nome']."</td>";
                    echo "<td align=\"center\"><button type=\"button\" class=\"btn btn-primary\" style=\"--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;\" title=\"Alterar informações do Autor\" onclick=\"return alterarAutor(".$rowData['coau'].")\";>Alterar</button></td>";
                    echo "<td align=\"center\"><button type=\"button\" class=\"btn btn-danger\" style=\"--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;\" title=\"Excluir Autor\" onclick=\"return excluir(".$rowData['coau'].",null,0)\";>Excluir</button></td>";
                    echo "<tr>";               
                }          
            ?>
            </tbody>
            <caption>Listagem de Autores</caption>
        </table>  
        <button type="submit" class="btn btn-secondary">Incluir Autor</button>
    </form>  
  <div>
</body>
</html>