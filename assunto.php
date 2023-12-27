<?php
    require_once 'conexao.php';
    $pdo = Database::conexao();
    $stmt = $pdo->prepare('SELECT * FROM public."assunto"');
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
     function alterarAssunto(cod){
        $(location).prop('href', 'alteraAssunto.php?cod='+cod);
     }
  </script>   
  <div class="container-fluid bg-dark text-light py-3"> 
          <header class="text-left">
            <h5>Assunto</h5>         
          </header>        
  </div> 
  <div class="w-50 p-3">
    <a class="inicio" href="index.php"> Início </a>
    <div id="alert"></div>
    <form action="incluirAssunto.php">
        <table class="table table-hover table-bordered table-sm align-middle caption-top">
            <thead class="table table-dark">
                <th>Código</th>
                <th>Descrição</th>
                <th colspan="2" style="text-align:center;">Ação</th>
               
            </thead>
            <tbody>    
            <?php
                foreach($resData as $rowData){
                    echo "<tr id=".$rowData['codas'].">";
                    echo "<td style=\"width:20px;\">".$rowData['codas']."</td>";
                    echo "<td style=\"width:500px;\">".$rowData['descricao']."</td>";
                    echo "<td align=\"center\"><button type=\"button\" class=\"btn btn-primary\" style=\"--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;\" title=\"Alterar informações do Assunto\" onclick=\"return alterarAssunto(".$rowData['codas'].")\";>Alterar</button></td>";
                    echo "<td align=\"center\"><button type=\"button\" class=\"btn btn-danger\" style=\"--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;\" title=\"Excluir Assunto\" onclick=\"return excluir(".$rowData['codas'].",null, 1)\";>Excluir</button></td>";
                    echo "<tr>";               
                }          
            ?>
            </tbody>
            <caption>Listagem de Assuntos</caption>
        </table>  
        <button type="submmit" class="btn btn-secondary">Incluir Assunto</button>
    </form>  
  <div>
</body>
</html>