 <?php
    include("conexao.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('include_html/cabecalho.php');?>
</head>
<body>
  <nav class="navbar bg-dark navbar-dark">
     <div class="container-fluid">    
       <div>
         <img class="imgTitulo" src="img/livro.jpg" style="width:50px;">    
         <header class="titulo"><h4>CADASTRO DE LIVRO</h4></header>
       </div>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" style="cursor:pointer" aria-expanded="true">
          <span class="navbar-toggler-icon"></span>
       </button>
          <div class="navbar-collapse collapse" id="menuPrincipal">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="autor.php">Autor</a></li>
                <li class="nav-item"><a class="nav-link" href="assunto.php">Assunto</a></li>
                <li class="nav-item"><a class="nav-link" href="livro.php">Livros</a></li> 
                <li class="nav-item"><a class="nav-link" href="relatorio.php">Relatório</a></li>
            </ul>
       </div>
    </div>  
  </nav>
</body>
</html>