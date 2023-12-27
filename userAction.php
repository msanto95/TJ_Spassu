<?php
require_once 'conexao.php';

$codigo    = $_POST['id'];
$page      = $_POST['page'];

if($page==3 || $page==2){
   $codigoRel = $_POST['idRel'];
}

switch($page){
    case 0:
        $script = 'delete FROM public."autor" where "coau" ='.$codigo;
    break;
    case 1:
        $script = 'delete FROM public."assunto" where "codas" ='.$codigo;
    break;
    case 2:
        $script = 'delete FROM public."Livro_Autor" where "Autor_CodAu" = '.$codigoRel.' and "Livro_Codl" ='.$codigo;
    break;       
    case 3:
        $script = 'delete FROM public."Livro_Assunto" where "Assunto_codAs" = '.$codigoRel.' and "Livro_Codl" ='.$codigo;
    break;
    case 4:
        $script = 'delete FROM public."livro" where "codl" ='.$codigo;
    break;               
}
try {
    $pdo = Database::conexao();
    $stmt = $pdo->prepare($script);
    $stmt->execute(); 
    echo '0';
} catch (PDOException $e) {
    echo $e;
}
 

?>