<?php
    require_once 'conexao.php';

    $orig  = $_POST['orig'];
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];    

    if($orig==0){
        $script = 'UPDATE public.autor SET nome=:nome WHERE coau=:cod';
    }else{
        $script = 'UPDATE public.assunto SET descricao=:nome WHERE codas=:cod';
    }

    $pdo = Database::conexao();
    $stmt = $pdo->prepare($script);
    $stmt->bindValue(':cod', $codigo, PDO::PARAM_INT);
    $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
    $stmt->execute();
    $resData=$stmt->fetchAll();

?>