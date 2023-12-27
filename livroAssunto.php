<?php
    require_once 'conexao.php';
   
    $codLivro = $_GET['codLivro'];
    $titulo   = $_GET['titulo'];
    $editora  = $_GET['editora'];
    $pdo      = Database::conexao();
    $stmt     = $pdo->prepare('SELECT * FROM "Livro_Assunto" as la
    INNER JOIN "assunto" as Ass ON Ass."codas" = la."Assunto_codAs"
	WHERE la."Livro_Codl" = :cod  ');
    $stmt->bindValue(':cod', $codLivro, PDO::PARAM_INT);
    $stmt->execute();
    $resData=$stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('include_html/cabecalho.php');?>
</head>
<body>
  <div class="container-fluid bg-dark text-light py-3"> 
        <header class="text-left">
           <h5>Livro>>Assunto</h5>         
        </header>        
  </div> 

  <div class="w-50 p-3">     
    <a class="inicio" href="index.php"> Início </a><a class="inicio" href="livro.php"> Voltar </a><br><br> 
    <div id="alert"></div>
    <form action="incluirAssuntoLivro.php?codLivro=<?php echo $codLivro; ?>" method="post">
        <table class="table table-secondary">
            <tr>
                <td style="width:50px;">LIVRO:</td>
                <td class="text-uppercase"><?php echo $titulo; ?></td>
            </tr>
            <tr>
                <td>EDITORA:</td>
                <td class="text-uppercase"><?php echo $editora; ?></td> 
            </tr>        
        </table> 

        <table class="table table-hover table-bordered table-sm align-middle caption-top">
            <thead class="table table-secondary">
                <th style="width:550px;">Nome</th>
                <th colspan="2" style="text-align:center;">Ação</th>
               
            </thead>
            <tbody>    
            <?php
                foreach($resData as $rowData){
                    echo "<tr id=".$codLivro.">";
                    echo "<td style=\"width:700px;\">".$rowData['descricao']."</td>";
                    echo "<td align=\"center\"><button type=\"button\" class=\"btn btn-primary\" style=\"--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;\" title=\"Alterar o Autor\" onclick=\"return excluir(".$rowData['codas'].")\";>Alterar</button></td>";
                    echo "<td align=\"center\"><button type=\"button\" class=\"btn btn-danger\" style=\"--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;\" title=\"Excluir o Autor\" onclick=\"return excluir(".$codLivro.",".$rowData['codas'].",3)\";>Excluir</button></td>";
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